<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('vip/css/makeGood.css') }}">
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?54ebc5c876bf935bc6eb2cd0338247cd";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<body>
<!--兑换奖品-->
<div class="makeGood">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <p class="text">$<span>{{ $user->coin }}</span></p>
    <ul>
        @foreach( $logs as $log)
            <li>
                <span class="payText">{{ $log->event }}</span>
                <span class="number">{{ $log->type . $log->quantity }}</span>
            </li>
        @endforeach
    </ul>
    {{--前往抽奖页面--}}
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{ asset('vip/images/makeGood/btn1.png') }}"></a>
    {{--前往首页--}}
    <a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/makeGood/home.png') }}"></a>
</div>
</body>
{{--引入分享设置--}}
@include('shop.share')

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