<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/gift.css') }}">
</head>
<body>
<div class="rta">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <div class="turntable-bg">
        <div class="pointer"><img src="{{ asset('vip/images/gift/btn.png') }}" alt="pointer"/></div>
        <div class="rotate"><img id="rotate" src="{{ asset('vip/images/gift/rta.png') }}" alt="turntable"/></div>
    </div>
    <img src="{{ asset('vip/images/gift/sprite.png') }}" alt="" class="sprite">
    <a href="{{ url('shop/index') }}" class="home">
        <img src="{{ asset('vip/images/gift/home.png') }}" alt="">
    </a>
    <a href="{{ url('shop/reward') }}" class="myGiftBtn">
        <img src="{{ asset('vip/images/gift/gifyBtn.png') }}" alt="">
    </a>
</div>
<img src="{{ asset('vip/images/gift/illusPopup.png') }}" alt="" class="myGift">
<!--抽奖回调的弹窗-->
<div class="popup hidden">
    <img src="{{ asset('vip/images/gift/0.png') }}" alt="" class="popupBg">
    <div class="btn">
        <img src="{{ asset('vip/images/gift/confirm.png') }}" alt="" class="confirmBtn" id="confirmBtn">
        <img src="{{ asset('vip/images/gift/abandon.png') }}" alt="" class="abandonBtn">
        <img src="{{ asset('vip/images/gift/goldText2.png') }}" alt="" class="goldText">
    </div>
    <div class="gold">
        <p>$<span class="goldNum"></span></p>
    </div>
</div>
<!--抽奖抽到实物的弹窗-->
<div class="popup2 hidden"></div>

<script type="application/javascript">

    //用户的信息，在外部声名
     var openid = "{{ $user->openid }}";
    //金币总数，在外部声名
     var goldNum = '{{ $user->coin }}';
</script>
<script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vip/js/awardRotate.js') }}"></script>
<script type="text/javascript" src="{{ asset('vip/js/gift.js') }}"></script>
{{--引入分享设置--}}
@include('shop.share')

<script>
    //说明页点击关闭
    $('.myGift').click(function(){
        $(this).hide();s
    })

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

</body>
</html>