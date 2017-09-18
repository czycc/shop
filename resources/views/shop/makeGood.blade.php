<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('vip/css/makeGood.css') }}">

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>
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
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{ asset('vip/images/makeGood/btn.png') }}"></a>
    {{--前往首页--}}
    <a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/makeGood/home.png') }}"></a>
</div>
</body>
{{--引入分享设置--}}
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('vip/js/jquery.min.js')}}"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), true) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '暇步士拍党俱乐部', // 分享标题
            link: "https://weixin.touchworld-sh.com/shop",
            imgUrl: "{{asset('vip/images/share.jpg')}}", // 分享图标
            success: function () {
                $.post({{ url('api/shop/share') }})
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '暇步士拍党俱乐部', // 分享标题
            desc: "加入拍拍与小巴，赚金币，赢惊喜！", // 分享描述
            link: "https://weixin.touchworld-sh.com/shop",
            imgUrl: "{{asset('vip/images/share.jpg')}}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                $.post({{ url('api/shop/share') }})
            }
        });
    });
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