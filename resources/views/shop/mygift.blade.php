<!DOCTYPE html>
<html lang="en">
<head>
    <title>会员商城</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('vip/css/mygift.css') }}">
</head>
<body>
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <div class="mygift">
        <ul>
            @foreach( $rewards as $reward)
                @if($reward->type == 'gift1')
                    <li>压缩T</li>
                @elseif($reward->type == 'gift2')
                    <li>狗项圈</li>
                @elseif($reward->type == 'gift3')
                    <li>手机壳</li>
                @elseif($reward->type == 'gift4')
                    <li>钥匙扣</li>
                @else
                    <li>徽章</li>
                @endif
            @endforeach
        </ul>
        <a href="{{ url('shop/index') }}" class="homeBtn"><img src="{{ asset('vip/images/myGift/home2.png') }}" alt=""></a>
        <a href="{{ url('shop/user') }}" class="btn"><img src="{{ asset('vip/images/myGift/btn.png') }}" alt=""></a>
    </div>

</body>
<script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>

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
        window.addEventListener('touchstart', function firstTouch(){
            audio.play();
            this.removeEventListener('touchstart', firstTouch);
        });
    }
</script>



</html>