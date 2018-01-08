var express = require('express');
var app = express();
var server = require('http').createServer(app);
var SkyRTC = require('skyrtc').listen(server,app);
var path = require("path");

var port = process.env.PORT || 3000;
server.listen(port);

app.use(express.static(path.join(__dirname, 'static')));

let uid = '';
app.use('/', function(req, res) {
	if(req.query.scene === "0"){
        uid = 0
        res.sendfile(__dirname + '/static/pc.html');
    }else if(req.query.scene === "1"){
		uid = req.query.uid
        res.sendfile(__dirname + '/static/phone.html');
	}
});

SkyRTC.rtc.on('new_connect', function(socket) {
	socket.id = uid
	console.log('创建新连接');
});

SkyRTC.rtc.on('remove_peer', function(socketId) {
	console.log(socketId + "用户离开");
});

SkyRTC.rtc.on('new_peer', function(socket, room) {
	console.log("新用户" + socket.id + "加入房间" + room);
});

SkyRTC.rtc.on('socket_message', function(socket, msg) {
	console.log("接收到来自" + socket.id + "的新消息：" + msg);
});

SkyRTC.rtc.on('ice_candidate', function(socket, ice_candidate) {
	console.log("接收到来自" + socket.id + "的ICE Candidate");
});

SkyRTC.rtc.on('offer', function(socket, offer) {
	console.log("接收到来自" + socket.id + "的Offer");
});

SkyRTC.rtc.on('answer', function(socket, answer) {
	console.log("接收到来自" + socket.id + "的Answer");
});

SkyRTC.rtc.on('error', function(error) {
	console.log("发生错误：" + error.message);
});