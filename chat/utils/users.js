const users = [];

function userJoin(id, time, room, username) {
  const user = { id, time, room , username};
  const index = users.findIndex(user => (user.room === room && user.id === id));
  if (index == -1) {
    users.push(user);
  }

  return user;
}

function getCurrentUser(id) {
  return users.find(user => user.id === id);
}

function getAnother(room, username) {
  const another = users.findIndex(user => user.room === room && user.username != username);
  var x;
  if (another == -1) {
    x = 0;
  }else{
    x = 1;
  }
  return x;
}

function getPartner(room, username) {
  var partner = room.replace(username, "");
  partner = partner.replace('_', "");
  return partner;
}

function userLeave(user) {
  for (var i in users) {
    if (users[i].id == user.id) {
      users.splice(i, 1);
    }
  }
}

function checkTimeOutRoom(timeNow) {
  for (var i in users) {
    if ((timeNow - users[i].time) / (1000 * 60 * 60 * 24) >= 1) {
      for (var j in users) {
        if (users[j].room == users[i].room) {
          users.splice(j, 1);
        }
      }
    }
  }
}

function getCountElementsInRoom(room) {
  var count = 0;
  for(var i in users) {
    if(users[i].room == room) {
      count++;
    }
  }
  return count;
}

module.exports = {
  userJoin,
  getCurrentUser,
  userLeave,
  checkTimeOutRoom,
  getCountElementsInRoom,
  getAnother,
  getPartner
};


