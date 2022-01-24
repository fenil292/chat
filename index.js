const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 3000;

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/pages/messanger.html');
});

io.on('connection', (socket) => {
  socket.on('chat message', data => {
    io.emit('message', { name: data.name, message: data.message,time: data.time });
  });
});
/*io.sockets.on( 'connection', function( client ) {
 	console.log( "New client !" );
	
 	client.on( 'message', function( data ) {
 		console.log( 'Message received ' + data.name + ":" + data.message + ":" + data.time);
 		//client.broadcast.emit( 'message', { name: data.name, message: data.message } );
 		io.sockets.emit( 'message', { name: data.name, message: data.message,time: data.time } );
 	});
 });*/
http.listen(port, () => {
  console.log(`Socket.IO server running at http://localhost:${port}/`);
});
