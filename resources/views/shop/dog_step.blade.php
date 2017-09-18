<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/dog_step.css') }}">

    //腾讯分析
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>

</head>
<body>
<img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
<audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
<img src="{{ asset('vip/images/dog_step/step_bg.jpg') }}">
<a href="javascript:void(0)" class="storeList"><img src="{{ asset('vip/images/dog_step/storeList.png') }}"></a>
<a href="javascript:void(0)" class="showList"><img src="{{ asset('vip/images/dog_step/showList.png') }}"></a>
<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/dog_step/home.png') }}"></a>
<a href="javascript:void(0)" class="btn"><img src="{{ asset('vip/images/dog_step/btn.png') }}"></a>

<!-- mask start -->
<div class="mask mask_store hidden" id="mask">
    <div class="show_store">
        <h1>门店信息</h1>
        <ul>
            <li>成都:双楠伊藤HP</li>
            <li>成都:成仁伊藤HP</li>
            <li>成都:春熙伊藤HP</li>
            <li>成都:建设路伊藤HP</li>
            <li>成都:高新伊藤HP</li>
            <li>温江:伊藤HP</li>
            <li>重庆:江北世纪新都综合HP</li>
            <li>重庆:沙坪凯瑞商都综合HP</li>
            <li>重庆:杨家坪新世纪HP</li>
            <li>重庆:大坪时代天街A馆店HP</li>
            <li>成都:新南凯德广场店HP</li>
            <li>上海:龙之梦店HP</li>
            <li>上海:虹口龙之梦店HP</li>
            <li>上海:港汇广场店HP</li>
            <li>上海:闵行七宝万科城市广场店HP</li>
            <li>上海:月星环球港店HP</li>
            <li>上海:长泰广场店HP</li>
            <li>上海:紫荆国际广场店HP</li>
            <li>杭州:申花银泰置地店HP</li>
            <li>杭州:西溪印象城店HP</li>
            <li>北京:汉光HP</li>
            <li>北京:龙德翠微HP</li>
            <li>北京:世纪金源HP</li>
            <li>北京:新世界一期HP</li>
            <li>北京:恒泰广场店HP</li>
            <li>北京:龙湖天街大兴HP</li>
            <li>石家庄:人民HP</li>
            <li>石家庄:北国商城HP</li>
            <li>天津:金元宝滨海国际HP</li>
            <li>天津:友谊新天地HP</li>
            <li>呼市维多利HP</li>
            <li>太原茂业天地HP</li>
            <li>秦皇岛:现代购物广场HP</li>
            <li>秦皇岛:茂业HP</li>
            <li>唐山:万达百货HP</li>
        </ul>
        <img src="{{ asset('vip/images/dog_step/dog.png') }}" class="dog">
    </div>
</div>

<div class="mask mask_relation hidden" id="mask2">
    <form class="show_relation" action="{{ url('shop/relate') }}" method="post">
        {!! csrf_field() !!}
        <p class="relation_title">请将狗狗项圈屏幕上的代码输入下面框框</p>
        <p class="relation_input"><input type="text" name="mac" placeholder="请写代码"></p>
        <label class="relation_btn">
            <img src="{{ asset('vip/images/dog_step/confirm.png') }}">
            <input type="submit" style="display: none">
        </label>

    </form>
</div>
<!-- mask end -->

<!-- script -->
<script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>

<!-- script -->
<script type="text/javascript" src="{{asset('vip/js/jquery.min.js')}}"></script>
{{--引入分享设置--}}
@include('shop.share')

<script type="text/javascript">
    //提示错误信息
    @if(!is_null(session('error')))
    alert('{{ session('error') }}');
    @endif

    $(function () {
        //点击显示门店信息弹窗
        $('.showList').click(function (e) {
            $('.mask_store').show();
        })

        $('.btn').click(function (e) {
            $('.mask_relation').show();
        })

        //点击弹窗消失
        $('.mask').click(function (e) {
            if (e.target.id === "mask" || e.target.id === "mask2") {
                $(this).hide();
            }
        });

        //表单验证
        $("form").submit(function(){
            var text = $(".relation_input input").val();
            text = text.toUpperCase();
            var reg = /^[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]$/;
            if(!reg.test(text)){
                alert('格式输入错误(例A1:B2:3C:D4:FF:D5)')
                return false;
            }else{
                return true;
            }
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