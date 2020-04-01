var server = require('http').Server();
var io = require('socket.io')(server);
var ioredis = require('ioredis');
var redis = new ioredis();


redis.subscribe('my-channel');
redis.on('message', function (channel, message) {
    console.log('message received');
    console.log(message);
    console.log(channel);
});

server.listen(3000, function () {
    console.log('server is listening to http://localhost:30000');

});
