// var app= require('express')();
// var server = require('http').Server(app);
// var io= require('socket.io')(server);
// // var redis= require('redis');
//
//
// server.listen(3000, function() {
//     console.log('Listening on Port: 6998');
// });
// io.on('connection', function (socket) {
//     console.log(socket);
//     var redisClient = redis.createClient();
//     redisClient.subscribe('message');
//
//     redisClient.on('message', function(channel, message) {
//         socket.emit(channel,message);
//         console.log('message');
//     });
//
//     socket.on('disconnect', function() {
//         redisClient.quit();
//         console.log('disconnect');
//     });
// });


var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('test-channel', function(err, count) {
});
redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});
http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
