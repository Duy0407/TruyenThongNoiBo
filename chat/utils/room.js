const rooms = [];

function JoinRoom(roomname, quantity, timer) {
       const room = { roomname, quantity, timer };

       const index = rooms.findIndex(room => (room.roomname == roomname));
       if (index == -1) {
              rooms.push(room);
       } else {
              if (rooms[index].quantity < 1) {
                     rooms[index].quantity = quantity;
              } else {
                     rooms[index].quantity++;
              }
              return rooms[index];
       }

       return room;
}

function getCurrentRoom(roomname) {
       return rooms.find(room => (room.roomname == roomname));
}

function leaveRoom(roomname) {
       for (var i in rooms) {
              if (rooms[i].roomname == roomname) {
                     if (rooms[i].quatity <= 1) { rooms.splice(i, 1); }
                     else { rooms[i].quantity--; }
              }
       }
       console.log(rooms);
}

module.exports = {
       JoinRoom,
       getCurrentRoom,
       leaveRoom
};
