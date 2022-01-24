const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const port = process.env.PORT || 3000;

app.get('/', (req, res) => {
  res.send('<h1>Hello world</h1>');
});
/*app.get('/', (req, res) => {
  res.sendFile(__dirname + '/pages/index.php');
});*/
console.log('listening on *:3000');
server.listen(port, () => {
  console.log('listening on *:3000');
});
