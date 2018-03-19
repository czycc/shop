var express = require('express');
var app = express();
var server = require('http').createServer(app);
var SkyRTC = require('./libs/skyrtc/SkyRTC').listen(server);
var path = require("path");

var port = process.env.PORT || 3000;
server.listen(port);

//医生在线状态
let doctors = {
	doc1: false,
	doc2: false,
}

app.use(express.static(path.join(__dirname, 'static')));

let uid = '';

//一号医生页面
app.use('/doc1', function(req, res) {
	uid = req.query.uid
	if(uid === "1" || uid === "0"){
		res.sendfile(__dirname + '/static/doc1.html');
	}else{
		res.sendfile(__dirname + '/static/404.html');
	}
});

//二号医生页面
app.use('/doc2', function(req, res) {
	uid = req.query.uid
	if(uid === "2" || uid === "0"){
		res.sendfile(__dirname + '/static/doctor2.html');
	}else{
		res.sendfile(__dirname + '/static/404.html');
	}
	
});

//返回医生在线状态
app.use('/docState', function(req,res){
	res.end(JSON.stringify(doctors))
})

SkyRTC.rtc.on('new_connect', function(socket) {
	socket.id = uid;
	console.log('创建新连接');
});

SkyRTC.rtc.on('remove_peer', function(socketId) {
	if(socketId === '1'){
		doctors.doc1 = false
	}else if(socketId === '2'){
		doctors.doc2 = false
	}
	console.log(socketId + "用户离开");
});

SkyRTC.rtc.on('new_peer', function(socket, room) {
	console.log("新用户" + socket.id + "加入房间" + room);
	if(socket.id === '1'){
		doctors.doc1 = true
	}else if(socket.id === '2'){
		doctors.doc2 = true
	}
});

SkyRTC.rtc.on('socket_message', function(socket, msg) {
	console.log("接收到来自" + socket.id + "的新消息：" + msg);
});

// SkyRTC.rtc.on('ice_candidate', function(socket, ice_candidate) {
// 	// console.log("接收到来自" + socket.id + "的ICE Candidate");
// });

// SkyRTC.rtc.on('offer', function(socket, offer) {
// 	// console.log("接收到来自" + socket.id + "的Offer");
// });

// SkyRTC.rtc.on('answer', function(socket, answer) {
// 	// console.log("接收到来自" + socket.id + "的Answer");
// });

// SkyRTC.rtc.on('error', function(error) {
// 	console.log("发生错误：" + error.message);
// });


