<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/dog_step.css') }}">
</head>
<body>
<img src="{{ asset('vip/images/dog_step/step_bg.jpg') }}">
<a href="javascript:void(0)" class="storeList"><img src="{{ asset('vip/images/dog_step/storeList.png') }}"></a>
<a href="javascript:void(0)" class="showList"><img src="{{ asset('vip/images/dog_step/showList.png') }}"></a>
<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/dog_step/home.png') }}"></a>
<a href="javascript:void(0)" class="btn"><img src="{{ asset('vip/images/dog_step/btn.png') }}"></a>

<!-- mask start -->
<div class="mask mask_store hidden" id="mask">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
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
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
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
                // 用户确认分享后执行的回调函数
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
                // 用户确认分享后执行的回调函数

            }
        });
    });
</script>
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
                alert('请填写正确的MAC地址(冒号必须在英文状态下输入)')
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
        window.addEventListener('touchstart', function firstTouch(){
            audio.play();
            this.removeEventListener('touchstart', firstTouch);
        });
    }
</script>
</body>
</html>