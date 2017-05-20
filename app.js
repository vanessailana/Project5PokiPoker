var http = require('http');
var fs = require('fs');
var Hand = require('pokersolver').Hand;
var PokerEvaluator = require("poker-evaluator");



var person=["As", "Ac", "Ad", "Ah","2s","2c","2d","2h","3s","3c","3d","3h",
"4s","4c","4d","4h","5s","5c","5d","5h","6s","6c","6d","6h","7s","7c","7d","7h"
,"8s","8c","8d","8h","9s","9c","9d","9h","Ts","Tc","Td","Th",
"Js","Jc","Jd","Jh","Ks","Kc","Kd","Kh","Qs","Qc","Qd","Qh"];
person.sort();
// Loading the index file . html displayed to the client
var server = http.createServer(function(req, res) {
    fs.readFile('./index.php', 'utf-8', function(error, content) {
        res.writeHead(200, {"Content-Type": "text/html"});
        res.end(content);
    });
});

// Loading socket.io
var io = require('socket.io').listen(server);


// When a client connects, we note it in the console
io.sockets.on('connection', function (socket) {
    console.log('A client is connected!');
   


    socket.join('some room');

});

io.sockets.on('connection', function (socket) {
        socket.emit('message', 'You are connected!');
});



server.listen(8080);

io.on('connection', function(socket) {
   console.log('Socket connected');
   socket.emit('fromServer', {id: 'foo'}); // send message fromServer to client
   
  

   socket.on('fromClient', function(data) { // listen for fromClient message
      console.log('Received ' + data.id + ' from client');
   });


});



var roomno = 1;

io.on('connection', function(socket){
  //Increase roomno 2 clients are present in a room.
  if(io.nsps['/'].adapter.rooms["room-"+roomno] && io.nsps['/'].adapter.rooms["room-"+roomno].length > 4)
    roomno++;
  socket.join("room-"+roomno);

    

  //Send this event to everyone in the room.
  io.sockets.in("room-"+roomno).emit('connectToRoom', "You are in room no."+roomno);





})


var clients = 0;

io.on('connection', function(socket){
   clients++;
 io.sockets.emit('broadcast',{ 
  description: clients + ' clients connected!'}
  );

 socket.on('disconnect', function () {
         clients--;
           io.sockets.emit('broadcast',{ description: clients + ' clients connected!'});
    });
});


io.on('connection', function (socket) {
  socket.on('message',function(message){
    console.log(message); 
  });
  socket.emit('message','Hello, my name is Server');

});


//server sending cards to each user 
//


io.on('connection', function (socket) {
  
 
  

  person.sort(function(a,b) {
    return 0.5- Math.random() });

 //sorting the array in a random order so each time 
 ////a person will get a different amount of cards
socket.emit('person', person);




  
});

io.on('connection', function (socket) {
  

var winner=PokerEvaluator.evalHand([person[0],person[1],person[2],person[3],person[4]]);
socket.emit('winner',winner);

  
});

io.on('connection', function (socket) {
  

var winner1=PokerEvaluator.evalHand([person[5],person[6],person[7],person[8],person[9]]);

socket.emit('winner1',winner1);

  
});

io.on('connection', function (socket) {
  

var winner3=PokerEvaluator.evalHand([person[10],person[11],person[12],person[13],person[14]]);

socket.emit('winner3',winner3);

  
});
