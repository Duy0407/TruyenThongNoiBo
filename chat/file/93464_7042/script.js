const socket = io.connect('ws://43.239.223.11:3030', {
  secure: true,
  enabledTransports: ["ws"],
  transports: ['websocket', 'polling']
});

const chatInputBox = document.getElementById("chat_message");
const all_messages = document.getElementById("all_messages");
const main__chat__window = document.getElementById("main__chat__window");
const videoGrid = document.getElementById("video-grid");
const myVideo = document.createElement("video");
const time = document.getElementById("timeCall");
time.innerText = "00:00:00";
myVideo.muted = true;


const peer = new Peer(undefined, {
  host: '43.239.223.11',
  port: 9000,
  path: '/peerjs'
});

var getUserMedia =
  navigator.getUserMedia;

var infoCall = document.getElementById("infoCall");
var Waiting = "";
setInterval(() => {
  if (Waiting == "...") {
    Waiting = "";
  }
  Waiting = Waiting + ".";
  infoCall.innerHTML = "Đang chờ người tham gia vào cuộc trò chuyện" + Waiting;
}, 1000);


navigator.mediaDevices.enumerateDevices().then(function (devices) {
  var cam = devices.find(function (device) {
    return device.kind === "videoinput";
  });
  var mic = devices.find(function (device) {
    return device.kind === "audioinput";
  });
  var constraints = { video: cam && true, audio: mic && true };
  return navigator.mediaDevices.getUserMedia(constraints)
    .then(function (stream) {
      myVideo.id = peer.id.replaceAll("-", "");
      addVideoStream(myVideo, stream);
      peer.on("call", (call) => {
        call.answer(stream);
        const video = document.createElement("video");
        video.id = call.peer.replaceAll("-", "");
        call.on("stream", (userVideoStream) => {
          addVideoStream(video, userVideoStream);
        });
      });

      socket.on("user-connected", (userId, username) => {
        connectToNewUser(userId, stream);
        alert(`user ${username} has join`);
      });

      socket.on("onOffVideo", (streamid) => {
        const streamChange = document.getElementById(streamid);
        let enabled = streamChange.srcObject.getVideoTracks()[0].enabled;
        if (enabled) {
          streamChange.srcObject.getVideoTracks()[0].enabled = false;
        } else {
          streamChange.srcObject.getVideoTracks()[0].enabled = true;
          videoEl = document.getElementById(streamid);
          videoEl.addEventListener("loadedmetadata", () => {
            videoEl.play();

          });
        }
      });

      socket.on("getTimer", (timer) => {
        time.innerHTML = timer;
      });

      socket.on("onOffMicro", (streamid) => {
        const streamChange = document.getElementById(streamid);
        let enabled = streamChange.srcObject.getAudioTracks()[0].enabled;
        if (enabled) {
          streamChange.srcObject.getAudioTracks()[0].enabled = false;
        } else {
          streamChange.srcObject.getAudioTracks()[0].enabled = true;
        }
      });

      socket.on("user-disconnected", (userId, username) => {
        video = document.getElementById(userId.replaceAll("-", ""));
        video.remove();
        alert(`user ${username} leaved`);
        socket.emit("leave-room", ROOM_ID, userId);
        let totalUsers = document.getElementsByTagName("video").length;
        if (totalUsers <= 1) {
          videoGrid.removeChild(videoGrid.firstChild);
          var h3 = document.createElement("h3");
          var timer = document.getElementById("timeCall").textContent;
          h3.innerHTML = "Cuộc trò chuyện đã kết thúc. <br> Thời lượng cuộc gọi (" + timer + ").";
          h3.style.color = "white";
          videoGrid.append(h3);
          peer.destroy();
          clearInterval(pingTimeOut);
          clearInterval(setCheckDevice);
          document.getElementById("ping-github").style.display = 'none';
        }
      });
    }).catch(function (err) {
      console.log(err.name);
    });
});





peer.on("call", function (call) {
  getUserMedia(
    { video: true, audio: true },
    function (stream) {

      call.answer(stream);
      const video = document.createElement("video");
      video.id = call.peer.replaceAll("-", "");
      call.on("stream", function (remoteStream) {
        addVideoStream(video, remoteStream);
      });
    },
    function (err) {
      console.log("Failed to get local stream", err);
    }
  );
});

peer.on("open", (id) => {
  socket.emit("join-room", ROOM_ID, id, username);
  var div = document.getElementById("peerId");
  div.value = id;
});



// CHAT

const connectToNewUser = (userId, streams) => {
  var call = peer.call(userId, streams);
  var video = document.createElement("video");
  video.id = userId.replaceAll("-", "");
  call.on("stream", (userVideoStream) => {
    addVideoStream(video, userVideoStream);
  });
  call.on("close", () => {
    video.remove();
  });
};

InfoJoinRoom = setTimeout(() => {
  videoGrid.removeChild(videoGrid.firstChild);
  var h3 = document.createElement("h3");
  h3.innerHTML = "Không trả lời!";
  h3.style.color = "white";
  videoGrid.append(h3);
  clearInterval(pingTimeOut);
  clearInterval(setCheckDevice);
  document.getElementById("ping-github").style.display = 'none';
  document.getElementById("timeCall").style.display = "none";
  peer.destroy();
  infoCall.style.display = "none";
}, 15000);

const addVideoStream = (videoEl, stream) => {
  videoEl.srcObject = stream;

  console.log(stream);
  videoEl.addEventListener("loadedmetadata", () => {
    videoEl.play();

  });

  videoGrid.append(videoEl);
  let totalUsers = document.getElementsByTagName("video").length;
  if (totalUsers > 1) {
    for (let index = 0; index < totalUsers; index++) {
      document.getElementsByTagName("video")[index].style.width =
        100 / totalUsers + "%";
    }
    infoCall.style.display = "none";
    clearTimeout(InfoJoinRoom);
  }
};


const playStop = () => {
  const video = document.getElementsByTagName("video")[0].id;
  const type = 'camera'
  socket.emit("getStream", video, type);
  let enabled = document.getElementById(video).srcObject.getVideoTracks()[0].enabled;
  if (enabled) {
    setPlayVideo();
  } else {
    setStopVideo();
  }
};

const leaveMeet = () => {
  var vid1 = document.getElementById("peerId");
  let totalUsers = document.getElementsByTagName("video").length;
  if (totalUsers != 0) {
    socket.emit("leaveRoom", (vid1.value));
    while (videoGrid.firstChild) {
      videoGrid.removeChild(videoGrid.firstChild);
    }
    var h3 = document.createElement("h3");
    var timer = document.getElementById("timeCall").textContent;
    h3.innerHTML = "Bạn đã rời khỏi cuộc trò chuyện. <br> Thời lượng cuộc gọi (" + timer + ").";
    h3.style.color = "white";
    window.close("http://localhost:8080/VideoCall/VieoCall-chat/Html/VideoCall/views/chat.php?" + ROOM_ID + "&" + username);

    videoGrid.append(h3);
    peer.destroy();
    clearInterval(pingTimeOut);
    clearInterval(setCheckDevice);
    document.getElementById("ping-github").style.display = 'none';
  }

}

const muteUnmute = () => {
  const video = document.getElementsByTagName("video")[0].id;
  const type = 'micro'
  socket.emit("getStream", video, type);
  let enabled = document.getElementById(video).srcObject.getAudioTracks()[0].enabled;
  if (enabled) {
    setUnmuteButton();
  } else {
    setMuteButton();
  }
};

const setPlayVideo = () => {
  const html = `<i class="unmute fa fa-pause-circle"></i>
  <span class="unmute">Resume Video</span>`;
  document.getElementById("playPauseVideo").innerHTML = html;
};

const setStopVideo = () => {
  const html = `<i class=" fa fa-video-camera"></i>
  <span class="">Pause Video</span>`;
  document.getElementById("playPauseVideo").innerHTML = html;
};

const setUnmuteButton = () => {
  const html = `<i class="unmute fa fa-microphone-slash"></i>
  <span class="unmute">Unmute</span>`;
  document.getElementById("muteButton").innerHTML = html;
};
const setMuteButton = () => {
  const html = `<i class="fa fa-microphone"></i>
  <span>Mute</span>`;
  document.getElementById("muteButton").innerHTML = html;
};


//ping
var p = new Ping();

var pingTimeOut = setInterval(() => {
  var p = new Ping();



  var testConnectionSpeed = {
    imageAddr: "https://upload.wikimedia.org/wikipedia/commons/a/a6/Brandenburger_Tor_abends.jpg", // this is just an example, you rather want an image hosted on your server
    downloadSize: 2707459,
    run: function (mbps_max, cb_gt, cb_lt) {
      testConnectionSpeed.mbps_max = parseFloat(mbps_max) ? parseFloat(mbps_max) : 0;
      testConnectionSpeed.cb_gt = cb_gt;
      testConnectionSpeed.cb_lt = cb_lt;
      testConnectionSpeed.InitiateSpeedDetection();
    },
    InitiateSpeedDetection: function () {
      window.setTimeout(testConnectionSpeed.MeasureConnectionSpeed, 1);
    },
    result: function () {
      var duration = (endTime - startTime) / 1000;
      var bitsLoaded = testConnectionSpeed.downloadSize * 8;
      var speedBps = (bitsLoaded / duration).toFixed(2);
      var speedKbps = (speedBps / 1024).toFixed(2);
      var speedMbps = (speedKbps / 1024).toFixed(2);
      if (speedMbps >= (testConnectionSpeed.max_mbps ? testConnectionSpeed.max_mbps : 1)) {
        testConnectionSpeed.cb_gt ? testConnectionSpeed.cb_gt(speedMbps) : false;
      } else {
        testConnectionSpeed.cb_lt ? testConnectionSpeed.cb_lt(speedMbps) : false;
      }
    },
    MeasureConnectionSpeed: function () {
      var download = new Image();
      download.onload = function () {
        endTime = (new Date()).getTime();
        testConnectionSpeed.result();
      }
      startTime = (new Date()).getTime();
      var cacheBuster = "?nnn=" + startTime;
      download.src = testConnectionSpeed.imageAddr + cacheBuster;
    }
  }

  testConnectionSpeed.run(1, function () {
    p.ping("https://www.youtube.com/", function (err, data) {
      data = parseInt(data);
      if (data < 100) {
        document.getElementById("ping-github").innerHTML = data + ('ms (chất lượng mạng tốt)');
      } else if (data >= 100 && data < 200) {
        document.getElementById("ping-github").innerHTML = data + ('ms (chất lượng mạng hơi kém)');
      } else if (data >= 200 && data < 400) {
        document.getElementById("ping-github").innerHTML = data + ('ms (chất lượng mạng kém)');
      } else if (data >= 400 && data < 600) {
        document.getElementById("ping-github").innerHTML = data + ('ms (chất lượng mạng rất kém)');
      } else if (err) {
        var vid1 = document.getElementById("peerId");
        socket.emit("leaveRoom", (vid1.value));
        while (videoGrid.firstChild) {
          videoGrid.removeChild(videoGrid.firstChild);
        }
        var h3 = document.createElement("h3");
        var timer = document.getElementById("timeCall").textContent;
        h3.innerHTML = "Mất kết nối với cuộc gọi do mạng có sự cố xin  kiểm tra lại. <br> Thời lượng cuộc gọi (" + timer + ").";
        h3.style.color = "white";
        videoGrid.append(h3);
        peer.destroy();
        clearInterval(pingTimeOut);
        clearInterval(setCheckDevice);
        document.getElementById("ping-github").style.display = 'none';
      }

    });
  }, function () {
    var vid1 = document.getElementById("peerId");
    socket.emit("leaveRoom", (vid1.value));
    while (videoGrid.firstChild) {
      videoGrid.removeChild(videoGrid.firstChild);
    }
    var h3 = document.createElement("h3");
    var timer = document.getElementById("timeCall").textContent;
    h3.innerHTML = "Mất kết nối với cuộc gọi do mạng có sự cố xin  kiểm tra lại. <br> Thời lượng cuộc gọi (" + timer + ").";

    h3.style.color = "white";
    videoGrid.append(h3);
    peer.destroy();
    clearInterval(pingTimeOut);
    clearInterval(setCheckDevice);
    document.getElementById("ping-github").style.display = 'none';
  })
}, 1000);