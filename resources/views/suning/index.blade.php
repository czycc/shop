<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>苏宁智慧零售大开发战略暨合作伙伴签约大会</title>
    <link rel="stylesheet" href="../../res/suning/res/css/normalize.css">
    <link rel="stylesheet" href="../../res/suning/res/css/swiper.min.css">
    <link rel="stylesheet" href="../../res/suning/res/css/animate.min.css">
    <link rel="stylesheet" href="../../res/suning/res/css/style.css">
    <link rel="stylesheet" href="../../res/suning/res/css/index.css">
    <script src="../../res/suning/res/js/swiper.min.js"></script>
    <script src="../../res/suning/res/js/swiper.animate.min.js"></script>
</head>
<body>
<audio src="../../res/suning/res/2.mp3" id="audio" preload="auto" loop="loop" autoplay="autoplay"></audio>
<!-- loading -->
<section class="loader">
    <div class="loader-inner">
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
        <div class="loader-line-wrap">
            <div class="loader-line"></div>
        </div>
    </div>
</section>

<!-- swiper page -->
<div class="swiper-container hidden">
    <div class="swiper-wrapper">
        <!-- page1 -->
        <section class="swiper-slide swiper-slide1 page1">
            <canvas id="canvas"></canvas>
            <img src="../../res/suning/res/images/next_tips.png" class="next_tips hidden">
        </section>

        <!-- page2 -->
        <section class="swiper-slide swiper-slide2 page2">
            <img src="../../res/suning/res/images/next_tips.png" class="next_tips">
        </section>

        <!-- page3 -->
        <section class="swiper-slide swiper-slide3 page3">
            <h2 class="page3_title">
                <img src="../../res/suning/res/images/page3_title.png">
            </h2>
            <img src="../../res/suning/res/images/page3_line.png" class="page3_line">
            <div class="plan">
                <p class="text1 left ani" swiper-animate-effect="zoomInLeft" swiper-animate-duration="1.5s">嘉宾签到<br/>14:30-15:00
                </p>
                <p class="text2 right ani" swiper-animate-effect="zoomInRight" swiper-animate-duration="1.5s"
                   swiper-animate-delay="0.2s">主持开场<br/>15:00-15:05</p>
                <p class="text3 left ani" swiper-animate-effect="zoomInLeft" swiper-animate-duration="1.5s"
                   swiper-animate-delay="0.4s">主办方致辞<br/>15:05-15:20</p>
                <p class="text4 right ani" swiper-animate-effect="zoomInRight" swiper-animate-duration="1.5s"
                   swiper-animate-delay="0.6s">嘉宾演讲<br/>15:20-15:50</p>
                <p class="text5 left ani" swiper-animate-effect="zoomInLeft" swiper-animate-duration="1.5s"
                   swiper-animate-delay="0.8s">智慧零售大开发<br/>战略发布<br/>15:50-16:20</p>
                <p class="text6 right ani" swiper-animate-effect="zoomInRight" swiper-animate-duration="1.5s"
                   swiper-animate-delay="1.0s">合作签约仪式<br/>16:20-16:35</p>
                <p class="text7 left ani" swiper-animate-effect="zoomInLeft" swiper-animate-duration="1.5s"
                   swiper-animate-delay="1.2s" style="left: 110px">启动仪式及合影<br/>16:35-16:45</p>

            </div>
            <img src="../../res/suning/res/images/next_tips.png" class="next_tips2">
        </section>

        <!-- page4 -->
        <section class="swiper-slide swiper-slide4 page4">
            <canvas id="frame3"></canvas>
            <img src="../../res/suning/res/images/next_tips.png" class="next_tips">
        </section>

        <section class="swiper-slide swiper-slide5 page4_5">
            <canvas id="frame2"></canvas>
            <img src="../../res/suning/res/images/next_tips.png" class="next_tips hidden">
        </section>

        <!-- page5 -->
        <section class="swiper-slide swiper-slide6 page5">
            <from id="from">
                <h3>请您领取通向未来的护照</h3>
                <p><span>姓名</span><input type="text" name="username" id="username"></p>
                <p><span>公司</span><input type="text" name="company" id="company"></p>
                <p><span>职位</span><input type="text" name="job" id="job"></p>
                <p style="margin-top: 80px">
                    <input type="file" name="image" id="file" accept="image/*" class="hidden">
                    <label for="file"><img src="../../res/suning/res/images/updata_btn.png"></label>
                </p>
                <p><img src="../../res/suning/res/images/go_8page.png" class="go_8page"></p>
            </from>
        </section>
    </div>
</div>

<!-- page6 -->
<section class="page page6 hidden">
    <img src="../../res/suning/res/images/page6_bg.png" class="bg">
    <p>请上传一张你的正面照片<br/>用于后期安全验证</p>
    <span>请将脸部置于提示框内</span>
    <div class="btn_group">
        <label for="file"><img src="../../res/suning/res/images/re_updata.png "></label>
        <img src="../../res/suning/res/images/confirm.png" class="confirm" id="clipBtn">
    </div>
    <img src="../../res/suning/res/images/mask.png" class="mask">
    <div id="clipArea"></div>
</section>

<!-- page7 -->
<section class="page page7 hidden">
    <img src="../../res/suning/res/images/page6_bg.png" class="bg">
    <div class="picture" id="view"></div>
    <div class="page7_container">
        <p>请上传一张你的正面照片<br/>用于后期安全验证</p>
        <span>请将脸部置于提示框内</span>
        <div class="success" id="success">
            <img src="../../res/suning/res/images/success.png" class="success_btn">
            <img src="../../res/suning/res/images/hook.png" class="hook">
        </div>
    </div>
</section>

<!-- page8 -->
<section class="page page8 hidden">
    <a href="https://weixin.touchworld-sh.com/res/suning/index2.html" class="go_index2"><img
            src="../../res/suning/res/images/go_index2.png"></a>
</section>

<script src="../../res/suning/res/js/jquery.js"></script>
<script src="../../res/suning/res/js/pxloader-all.min.js"></script>
<script src="../../res/suning/res/js/sequenceFrame.js"></script>
<script src="../../res/suning/res/js/layer.js"></script>
<script src="../../res/suning/res/js/hammer.min.js"></script>
<script src="../../res/suning/res/js/iscroll-zoom-min.js"></script>
<script src="../../res/suning/res/js/lrz.all.bundle.js"></script>
<script src="../../res/suning/res/js/PhotoClip.js"></script>
<script src="../../res/suning/res/js/index.js"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '苏宁智慧零售大开发战略暨合作伙伴签约大会邀请函及大会指南', // 分享标题
            link: "https://weixin.touchworld-sh.com/suning/index",
            imgUrl: "https://weixin.touchworld-sh.com/res/suning/res/images/share.jpeg", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '苏宁智慧零售大开发战略暨合作伙伴签约大会邀请函及大会指南', // 分享标题
            desc: "苏宁智慧零售大开发战略暨合作伙伴签约大会邀请函及大会指南", // 分享描述
            link: "https://weixin.touchworld-sh.com/suning/index",
            imgUrl: "https://weixin.touchworld-sh.com/res/suning/res/images/share.jpeg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });
</script>
</body>
</html>
