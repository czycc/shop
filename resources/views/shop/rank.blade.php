<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/rank.css') }}">
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>
</head>
<body>
<img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
<audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
<img src="{{ asset('vip/images/rank/rank_bg.jpg') }}">
<div class="myStep">{{ $relate->machine->total }}</div>
<div class="getGold">今日得到<span>{{ floor($sub/1000) }}</span>金币</div>
<div class="tips">( 还有<span>{{ $sub }}</span>步数可兑换 )</div>

{{--展示排行榜--}}
<ul class="ranking">
    @foreach($machines as $machine)
        <li>
            <div class="no">1</div>
            <img class="user_avatar" src="{{ $machine->relate->avatar }}">
            <div class="user_name">{{ $machine->relate->nickname }}</div>
            <div class="user_step"><span>{{ $machine->total }}</span>步</div>
        </li>
    @endforeach
</ul>

<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/rank/home.png') }}"></a>
@if( $sub < 1000)
    <a href="javascript:void(0)" class="btnDown"><img src="{{ asset('vip/images/rank/btnDown.png') }}"></a>
@else
    <a href="{{ url('shop/coin/dog') }}" class="getGoldBtn"><img src="{{ asset('vip/images/rank/getGold.png') }}"></a>
@endif

@if(!is_null(session('coin')))
    <div class="mask mask_gold">
        <p>恭喜今日获得<span>{{ session('coin') }}</span>金币</p>
    </div>
@endif

{{--引入分享设置--}}
@include('shop.share')

<script type="text/javascript">


    //点击弹窗消失
    $('.mask').click(function (e) {
        $(this).hide();
    });
</script>
</body>


<script>
    //解决ios上不能自动播放声音
    bgm_init();

    function bgm_init() {
        var audio = document.getElementById('audio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
//        window.addEventListener('touchstart', function firstTouch(){
//            audio.play();
//            this.removeEventListener('touchstart', firstTouch);
//        });

        var audioMusic = document.getElementsByClassName('audioMusic')[0];

        audioMusic.addEventListener('touchstart', function () {
            if (audio.paused) {
                audio.play();
                audioMusic.src = '{{asset('vip/images/audio/audio2.png')}}'
            } else {
                audio.pause();
                audioMusic.src = '{{asset('vip/images/audio/audio1.png')}}'

            }


        });
    }
</script>
</html>