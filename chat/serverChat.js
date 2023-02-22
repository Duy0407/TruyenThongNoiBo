var http = require('http');

var server = http.createServer();

const hostname = '43.239.223.84';
const port = 3000;

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});

const socketio = require('socket.io');

const {
    userJoin,
    getCurrentUser,
    userLeave,
    checkTimeOutRoom,
    getCountElementsInRoom,
    getAnother,
    getPartner
} = require('./utils/users');

const {
    userOnline,
    ComOnline,
    getAllUser,
    getAllCom,
    userOffline,
    comOffline,
    getUserById,
    getComById,
    getUserByUid,
    getComByUid
} = require('./utils/user');


const io = socketio(server);

io.on('connection', socket => {

    socket.on('joinRoom', ({ room, username }) => {
        const moment = require('moment');
        const time = moment();
        checkTimeOutRoom(time);
        socket.emit('messageBot', 'Welcome!', moment().format('MM/DD/YYYY h:mm a'));

        const user = userJoin(socket.id, time, room, username);

        socket.broadcast.to(user.room).emit('messageBot', `${user.username} has joined the chat`, moment().format('MM/DD/YYYY h:mm a'));

        socket.join(user.room);
    });

    socket.on('checkonlineUser', ({ uid, uid_type }) => {
        if (uid != '') {
            if (uid_type == 1) {
                ComOnline(uid, socket.id);
            } else {
                userOnline(uid, socket.id);
            }
            var company = getAllCom();
            var candidate = getAllUser();
            io.sockets.emit('onlineCom', company);
            io.sockets.emit('onlineUser', candidate);
        } else {
            var company = getAllCom();
            var candidate = getAllUser();
            socket.emit('onlineCom', company);
            socket.emit('onlineUser', candidate);
        }
    });

    socket.on('chatMessage', msg => {
        const user = getCurrentUser(socket.id);
        const moment = require('moment');
        const another = getAnother(user.room, user.username)
        io.to(user.room).emit('message', msg, another);

        if (another == 0) {
            var partner = getPartner(user.room, msg.uid);
            if (msg.uid_type == 1) {
                var socketId = getUserByUid(partner);
                if (socketId != undefined) {
                    io.to(socketId.id).emit('send_notifice', msg);
                }
            } else {
                var socketId = getComByUid(partner);
                if (socketId != undefined) {
                    io.to(socketId.id).emit('send_notifice', msg);
                }
            }
        }
    });

    socket.on('callVideoFrom', (name) => {
        const user = getCurrentUser(socket.id);
        const moment = require('moment');
        const countUser = getCountElementsInRoom(user.room);
        if (countUser > 1) {
            socket.to(user.room).emit('callVideoTo', name);
            socket.emit('joinCall', );
        } else {
            socket.emit('messageBot', "Don't have anyone in your room, can't call.", moment().format('MM/DD/YYYY h:mm a'));
        }
    });

    socket.on('declineCall', (name) => {
        const user = getCurrentUser(socket.id);
        const moment = require('moment');
        socket.emit("clearTimeOutEndCall", );
        socket.broadcast.to(user.room).emit("clearTimeOutEndCall", );
        socket.emit('messageBot', ('You was miss call from  ' + name), moment().format('MM/DD/YYYY h:mm a'));
        socket.broadcast.to(user.room).emit('messageBot', (user.username + '  was miss call from you'), moment().format('MM/DD/YYYY h:mm a'));
    });

    socket.on('cancelCall', (name) => {
        const user = getCurrentUser(socket.id);
        const moment = require('moment');
        socket.emit("clearTimeOutEndCall", );
        socket.broadcast.to(user.room).emit("clearTimeOutEndCall", );
        socket.broadcast.to(user.room).emit("wasCancelCall", );
        socket.emit('messageBot', (user.username + ' was miss call from you'), moment().format('MM/DD/YYYY h:mm a'));
        socket.broadcast.to(user.room).emit('messageBot', ('You was miss call from ' + name), moment().format('MM/DD/YYYY h:mm a'));
    });

    var seconds = 0;
    var minutes = 0;
    var hours = 0;

    var Timer;

    socket.on('startCall', () => {
        seconds = -1;
        minutes = 0;
        hours = 0;
        const user = getCurrentUser(socket.id);
        socket.emit("setTimeOut", seconds, minutes, hours);
        socket.broadcast.to(user.room).emit("setTimeOut", seconds, minutes, hours);
        socket.broadcast.to(user.room).emit("AcceptCall", );
    });

    socket.on("startTimeOut", (seconds, minutes, hours) => {
        minutes = minutes < 10 ? "0" + minutes : minutes;
        hours = hours < 10 ? "0" + hours : hours;
        Timer = setInterval(() => {
            seconds++;
            if (seconds == 59) {
                seconds = 0;
                minutes++;
                minutes = minutes < 10 ? "0" + minutes : minutes;
            }
            if (minutes == 59) {
                minutes = 0;
                hours++;
                hours = hours < 10 ? "0" + hours : hours;
            }
            seconds = seconds < 10 ? "0" + seconds : seconds;
            var timer = `${hours} : ${minutes} : ${seconds}`;
            socket.emit("setTimer", timer);
        }, 1000);
    });

    socket.on('endCallBefore', (name) => {
        const user = getCurrentUser(socket.id);
        socket.broadcast.to(user.room).emit("endCallBeforeAcceptDecline", name);
    });

    socket.on('endCall', (name, timer) => {
        const user = getCurrentUser(socket.id);
        const moment = require('moment');
        socket.emit("clearTimeOutEndCall", );
        socket.broadcast.to(user.room).emit("clearTimeOutEndCall", );
        socket.emit('messageBot', (name + " was call for you, Call duration: (" + timer + ")"), moment().format('MM/DD/YYYY h:mm a'));
        socket.broadcast.to(user.room).emit('messageBot', ("You was call for " + user.username + ", Call duration: (" + timer + ")"), moment().format('MM/DD/YYYY h:mm a'));
        socket.emit("stopTimer", );
        socket.broadcast.to(user.room).emit("stopTimer", );
    });

    socket.on("clearTimeout", () => {
        clearInterval(Timer);
    });


    socket.on('disconnect', () => {
        const user = getCurrentUser(socket.id);

        const uv = getUserById(socket.id);
        const cpn = getComById(socket.id);

        const moment = require('moment');
        if (user) {
            userLeave(user);
            socket.leave(user.room);
            io.to(user.room).emit('messageBot', `${user.username} has left the chat`, moment().format('MM/DD/YYYY h:mm a'));
        }



        if (uv) {
            userOffline(socket.id);
            // var candidate = getAllUser();
            // io.sockets.emit('onlineUser',candidate);
        }
        if (cpn) {
            comOffline(socket.id);
            // var company = getAllCom();   
            // io.sockets.emit('onlineCom',company);
        }
    });
});