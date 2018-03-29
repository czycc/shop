var express = require('express');
var app = express();
var server = require('http').createServer(app);
var SkyRTC = require('./libs/skyrtc/SkyRTC').listen(server);
var path = require("path");

var port = process.env.PORT || 3000;
server.listen(port);

app.use(express.static(path.join(__dirname, 'static')));

//医生在线状态
let doc_online = {
	doc1: false,
	doc2: false
}

//返回医生在线状态
app.use('/docState', function(req,res){
	res.end(JSON.stringify(doc_online))
})

SkyRTC.rtc.on('new_connect', function(socket) {
	//console.log('创建新连接');
});

SkyRTC.rtc.on('remove_peer', function(socketId) {
	console.log(socketId + "用户离开");
	if(socketId === 'doc1'){
		doc_online.doc1 = false
	}else if(socketId === 'doc2'){
		doc_online.doc2 = false
	}
});

SkyRTC.rtc.on('new_peer', function(socket, room) {
	console.log("新用户" + socket.id + "加入房间" + room);
	if(socket.id === 'doc1'){
		doc_online.doc1 = true
	}else if(socket.id === 'doc2'){
		doc_online.doc2 = true
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


