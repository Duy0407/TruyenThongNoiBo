const candidate = [];
const company = [];

function userOnline(uid,id) {

       var user = {uid, id};
       candidate.push(user);
}

function ComOnline(uid,id) {
       var com = {uid, id};
       company.push(com);
}

function getAllUser(){
       return candidate;
}

function getAllCom(){
       return company;
}

function comOffline(id) {
       const index = company.findIndex(user => user.id == id);
       company.splice(index, 1);
}

function userOffline(id) {
       const index = candidate.findIndex(com => com.id == id);
       candidate.splice(index, 1);
}

function getUserById(id) {
       return candidate.find(user => user.id == id);
}

function getComById(id) {
       return company.find(com => com.id == id);
}



function getUserByUid(uid) {
  return candidate.find(user => user.uid == uid);
}

function getComByUid(uid) {
  return company.find(com => com.uid == uid);
}


// function getUserBySocket(socket) {
//        return candidate.find(user => user.socket == socket);
// }

// function userOffline(socket) {
//        const index = candidate.findIndex(user => user.socket == socket);
//        candidate.splice(index, 1);
// }

// function getAllUser(){
//        return candidate;
// }

// function getCountUser(userId) {
//        var count = 0;
//        for(var i = 0; i < candidate.length; i++) {
//               if(candidate[i].userId == userId) {
//                      count++;
//               }
//        }
//        return count;
// }



// function getComById(userId) {
//        return company.find(user => user.userId == userId);
// }

// function getComBySocket(socket) {
//        return company.find(user => user.socket == socket);
// }



// function getAllCom(){
//        return company;
// }

// function getCountCom(userId) {
//        var count = 0;
//        for(var i = 0; i < company.length; i++) {
//               if(company[i].userId == userId) {
//                      count++;
//               }
//        }
//        return count;
// }



module.exports = {
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
}

