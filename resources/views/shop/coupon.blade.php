<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/coupon.css')}}">

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
<div class="coupon">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{asset('vip/images/coupon/btn.png')}}"></a>
    <a href="{{ url('shop/index') }}" class="home"><img src="{{asset('vip/images/coupon/home.png')}}"></a>
    <ul class="cjText">
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo1.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo2.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
    </ul>
    <img src="{{asset('vip/images/coupon/rule.png')}}" alt="" class="ruleBtn">
    <div class="popup">
        <ul class="ruleText">
            <li>1、此券仅限酷迪珠江店使用，店铺地址：北京市朝阳区珠江帝景商业南街b1酷迪宠物;</li>
            <li>2、可使用项目为：基础水疗SPA、特效SPA、果蔬SPA、泥疗SPA、体膜SPA使用；</li>
            <li>3、可使用日期为2018年4月1日至2018年5月31日，周六日及节假日可用；</li>
            <li>4、不可叠加使用，每次仅限使用一张，不可折现，不可找零，不与其他优惠同时使用。</li>
        </ul>
    </div>
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

        $('.ruleBtn').click(function () {
            $('.popup').show();
        })

        $('.popup').click(function () {
            $(this).hide();
        })
    }
</script>



</html>