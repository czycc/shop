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
    {{--<p class="loadText"><span class="number">0</span><span>%</span></p>--}}
    {{--<div class="load">--}}
        {{--<p class="grey"></p>--}}
        {{--<p class="orange"></p>--}}
    {{--</div>--}}
    <canvas id='canvas'></canvas>
</div>
</body>
<script src="{{asset('vip/js/jquery.min.js')}}"></script>
<script src="{{asset('vip/js/sequenceFrame.js')}}"></script>


<script>
    var imgarr = [];
    for(var i = 1 ;i < 5;i ++){
        imgarr.push('../vip/images/loading/ladingpage/loding page_0000'+2*i+'.png')
    }
    for(var i = 10 ;i < 87;i ++){
        imgarr.push('../vip/images/loading/ladingpage/loding page_000'+i+'.png')
    }

    var frame2 = new SequenceFrame({
        id: $('#canvas')[0],
        width: 640,
        height: 1038,
        speed: 50,
        loop: false,
        callback: function() {

            window.location.href = '{{ url('shop/index') }}'

        },
        imgArr: imgarr
    });

    {{--var num = 0;--}}
    {{--var wid = 0;--}}
    {{--var timer = setInterval(function () {--}}
        {{--num++;--}}
        {{--wid = num / 100;--}}
        {{--$('.loading .loadText .number').html(num);--}}
        {{--$('.loading .load .orange').css('width',500*wid + "px")--}}
        {{--if(num >= 100){--}}
            {{--clearInterval(timer);--}}
            {{--//当数据为100的时候，调转的连接--}}
          {{--window.location.href = '{{ url('shop/index') }}'--}}
        {{--}--}}
    {{--},30)--}}

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