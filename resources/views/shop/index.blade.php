<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/index.css') }}">
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
<!-- nav start -->
<img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
<audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
<nav>
    <ul>
        <li><a href="{{ url('shop/user') }}"><img src="{{ asset('vip/images/index/my_info.png') }}"></a></li>
        <li><a href="{{ url('shop/ticket') }}"><img src="{{ asset('vip/images/index/my_coupon.png') }}"></a></li>
        <li><a href="{{ url('shop/coin') }}"><img src="{{ asset('vip/images/index/my_gold.png') }}"></a></li>
    </ul>
</nav>
<!-- nav end -->

<!-- index start -->
<section class="index">
    <img src="{{asset('vip/images/index/index_bg.jpg')}}">

    {{--爱犬大步走--}}
    <a href="{{ url('shop/dog') }}"><img src="{{asset('vip/images/index/dog1.png')}}" class="dog1"></a>
    {{--闪耀星派对--}}
    <a href="http://mp.weixin.qq.com/s/NW2uzugGtIFIP5bq3am-9w"><img src="{{asset('vip/images/index/dog22.png')}}" class="dog2"></a>
    {{--礼品店--}}
    <a href="{{ url('shop/draw') }}"><img src="{{asset('vip/images/index/gift.png')}}" class="gift"></a>
    {{--秋冬新鞋--}}
    <a href="https://file4b6b1a65f5d8.iamh5.cn/v3/idea/SzguxT2h?suid=C422F165-6908-4B25-9131-CE37B3412FA0&sl=1&from=singlemessage&isappinstalled=0&unid=ohAJ7weegbmwvVN3VG3jnC07G19c&wxid=oZwt-wNZxbVHlkilY-knJo9oQ0Dg&latestUser=1"><img src="{{asset('vip/images/index/shoes2.png')}}" class="shoes"></a>
    {{--每日签到--}}
    <a href="{{ url('shop/coin/day') }}" class="sign"><img src="{{asset('vip/images/index/sign2.png')}}"></a>
</section>
<!-- index end -->

@if(session('sign'))
<!-- mask start -->
<div class="mask mask_sign"></div>
<!-- mask end -->
@endif

{{--引入分享设置--}}
@include('shop.share')

<script type="text/javascript">
    @if (session('sign_error'))
        alert('已经签到过啦！');
    @endif
    $(function () {
        //点击签到
        //https://weixin.touchworld-sh.com/shop/coin/day
        // $('.sign').click(function(){
        // 	$('.mask_sign').show();
        // })

        //点击弹窗消失
        $('.mask').click(function () {
            $(this).hide();
        });
    })
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
</body>
</html>
