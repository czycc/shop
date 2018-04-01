<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/loading.css')}}">
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>
</head>
<body>
<div class="loading">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <p class="loadText"><span class="number">0</span><span>%</span></p>
    <div class="load">
        <p class="grey"></p>
        <p class="orange"></p>
    </div>
    <img src="{{asset('vip/images/loading/dog_s.png')}}" alt="" class="dog">
</div>
</body>
<script src="{{asset('vip/js/jquery.min.js')}}"></script>
<script src="{{asset('vip/js/sequenceFrame.js')}}"></script>
<script src="{{asset('vip/js/pxloader-all.min.js')}}"></script>
<script>
   //图片预加载
    var loader = new PxLoader();
    var URL = window.location.href;
    var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
    var realLoadingNum = 0;
    var fakeLoadingNum = 0;
    var myLoadingInterval = null;
    var fileList = [
       "../vip/images/loading/bg2.png",
    ];
    for (var i = 0; i < 10; i++) {
        fileList.push("../vip/images/loading/ladingpage/loding page_0000"+i+".png");
    }
    for (var i = 10; i < 69; i++) {
        fileList.push("../vip/images/loading/ladingpage/loding page_000"+i+".png");
    }
    for(var i = 0; i < fileList.length; i++){
        var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
        pxImage.imageNumber = i + 1;
        loader.add(pxImage);
    }
    loader.addCompletionListener(function(){
        console.log("预加载图片："+fileList.length+"张");
    });
    loader.addProgressListener(function(e){
        var percent = Math.round( (e.completedCount / e.totalCount) * 100); //正序, 1-100
        realLoadingNum = percent;
    });
    var myLoadingInterval=setInterval(function(){
        fakeLoadingNum++;
        if(realLoadingNum > fakeLoadingNum){
            $(".number").html(fakeLoadingNum);
            $('.loading .load .orange').css('width',500*fakeLoadingNum/100 + "px")
        }else{
            $(".number").html(realLoadingNum);
            $('.loading .load .orange').css('width',500*realLoadingNum/100 + "px")
        }
        if(fakeLoadingNum>=100 && realLoadingNum==100){
            clearInterval(myLoadingInterval);
           //绘制序列帧动态背景
            window.location.href = '{{ url('shop/index') }}'
        }
    },30);
    loader.start();
</script>
<script>
    //解决ios上不能自动播放声音
    bgm_init();
    function bgm_init(){
        var audio = document.getElementById('audio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
//        window.addEventListener('touchstart', function firstTouch(){
//            audio.play();
//            this.removeEventListener('touchstart', firstTouch);
//        });

        var audioMusic = document.getElementsByClassName('audioMusic')[0];

        audioMusic.addEventListener('touchstart', function (){
            if(audio.paused){
                audio.play();
                audioMusic.src = '{{asset('vip/images/audio/audio2.png')}}'
            }else{
                audio.pause();
                audioMusic.src = '{{asset('vip/images/audio/audio1.png')}}'

            }


        });
    }
</script>
</html>
