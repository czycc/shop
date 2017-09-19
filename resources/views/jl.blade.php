<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>聚力共赢</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="../jl/css/swiper.min.css">
    <link rel="stylesheet" href="../jl/css/animate.css">
    <link rel="stylesheet" href="../jl/css/reset.css">
    <link rel="stylesheet" href="../jl/css/style.css">
    <script src="../jl/js/swiper.min.js"></script>
    <script src="../jl/js/swiper.animate.min.js"></script>
</head>
<body>
<audio id="audio" src="../jl/1.mp3" preload="auto" loop="loop" autoplay="autoplay"></audio>
<img src="../jl/images/on.png" class="music">
<div class="load-container">
    <img class='loading' src="../jl/images/loading.png">
    <span class='loadNum'>0%</span>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-------------slide1----------------->
        <section class="swiper-slide swiper-slide1">
            <canvas id="canvas1"></canvas>
            <img class="arrow arr" src="../jl/images/arr1.png" alt="">
        </section>
        <!-------------slide2----------------->
        <section class="swiper-slide swiper-slide2">
            <canvas id="canvas2"></canvas>
            <img class="arrow arr1" src="../jl/images/arr2.png" alt="">
        </section>
        <!-------------slide3----------------->
        <section class="swiper-slide swiper-slide3">
            <img  class="ani timeText" swiper-animate-effect="slideInLeft" swiper-animate-duration="0.6s" swiper-animate-delay="0s" src="../jl/images/P3/time.png" alt="">
            <img  class="ani text1" swiper-animate-effect="slideInRight" swiper-animate-duration="0.6s" swiper-animate-delay="0.5s" src="../jl/images/P3/t2.png" alt="">
            <img class="arrow" src="../jl/images/arr1.png" alt="">
        </section>
        <!-------------slide4----------------->
        <section class="swiper-slide swiper-slide4">
            <img  class="ani text text0" swiper-animate-effect="slideInLeft" swiper-animate-duration="0.6s" swiper-animate-delay="0s" src="../jl/images/P4/text6.png" alt="">
            <img  class="ani text text1 location" swiper-animate-effect="zoomIn" swiper-animate-duration="0.6s" swiper-animate-delay="0.5s" src="../jl/images/P4/text1.png" alt="">
            <img  class="ani text text2 location" swiper-animate-effect="zoomIn" swiper-animate-duration="0.6s" swiper-animate-delay="1.0s" src="../jl/images/P4/text2.png" alt="">
            <img  class="ani text text3 location" swiper-animate-effect="zoomIn" swiper-animate-duration="0.6s" swiper-animate-delay="1.5s" src="../jl/images/P4/text3.png" alt="">
            <img  class="ani text text4 location" swiper-animate-effect="zoomIn" swiper-animate-duration="0.6s" swiper-animate-delay="2s" src="../jl/images/P4/text4.png" alt="">
            <img  class="ani text text5" swiper-animate-effect="slideInLeft" swiper-animate-duration="0.6s" swiper-animate-delay="2.5s" src="../jl/images/P4/text5.png" alt="">
            <img class="arrow" src="../jl/images/arr1.png" alt="">
            <ul class="swiper-no-swiping">
                <li>
                    <img class="pos pos1 ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s" swiper-animate-delay="0s" src="../jl/images/P4_1/ti.png" alt="">
                    <img class="pos pos2 ani" swiper-animate-effect="fadeIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s" src="../jl/images/P4_1/te.png" alt="">
                </li>
                <li>
                    <img class="pos pos1 ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s" swiper-animate-delay="0s" src="../jl/images/P4_2/ti2.png" alt="">
                    <img class="pos pos2 ani" swiper-animate-effect=" fadeIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s" src="../jl/images/P4_2/te.png" alt="">

                </li>
                <li class="li3">
                    <img class="pos pos1 ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s" swiper-animate-delay="0s" src="../jl/images/P4_3/ti.png" alt="">
                    <img class="pos pos2 ani" swiper-animate-effect="fadeIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s" src="../jl/images/P4_3/te.png" alt="">

                </li>
                <li class="li4">
                    <img class="pos pos1 ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="1s" swiper-animate-delay="0s" src="../jl/images/P4_4/ti.png" alt="">
                    <img class="pos pos2 ani" swiper-animate-effect="fadeIn" swiper-animate-duration="1s" swiper-animate-delay="0.5s" src="../jl/images/P4_4/te.png" alt="">
                </li>

            </ul>
        </section>
        <!-------------slide5----------------->
        <section class="swiper-slide swiper-slide5">
            <img class="pos pos1 ani" swiper-animate-effect="slideInLeft" swiper-animate-duration="0.5s" swiper-animate-delay="0s" src="../jl/images/P5/hTitle.png" alt="">
            <div class="ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="0.4s" >
                <img class="pos2 "src="../jl/images/P5/text.png" alt="">
            </div>
            <img class="center pos8 ani" swiper-animate-effect="slideInUp" swiper-animate-duration="0.8s" swiper-animate-delay="0.8s" src="../jl/images/P5/ewm.png" alt="">
            <img class="center pos9 ani" swiper-animate-effect="zoomIn" swiper-animate-duration="0.5s" swiper-animate-delay="1.6s" src="../jl/images/P5/text4.png" alt="">
        </section>
    </div>
</div>

</body>
<script src="../jl/js/jquery-1.11.3.min.js"></script>
<script src="../jl/js/sequenceFrame.js"></script>
<script src="../jl/js/pxloader-all.min.js"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '聚力共赢', // 分享标题
            link: "https://weixin.touchworld-sh.com/juli",
            imgUrl: "{{asset('jl/images/juli.jpg')}}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '聚力共赢', // 分享标题
            desc: "互联网CEO分享会内容峰会", // 分享描述
            link: "https://weixin.touchworld-sh.com/juli",
            imgUrl: "{{asset('jl/images/juli.jpg')}}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    var audio = document.getElementById('audio');
    document.addEventListener("WeixinJSBridgeReady", function () {
        audio.play();
    }, false);
    window.addEventListener('touchstart', function firstTouch(){
        audio.play();
        this.removeEventListener('touchstart', firstTouch);
    });

    var musicState = true;
    $('.music').click(function(){
        if(musicState){
            $(this).attr('src','../jl/images/off.png')
            musicState = false;
            audio.pause();
        }else{
            $(this).attr('src','./jl/images/on.png')
            musicState = true;
            audio.play();
        }
    })


</script>
<script>
    var frame1;
    var frame2;
    //加载序列帧动画
    //第一页
    var imgarr = [];
    for(var i = 2 ;i < 52;i ++){
        imgarr.push('../jl/images/home/'+i+'.jpg');
    }
    frame1 = new SequenceFrame({
        id: $('#canvas1')[0],
        width: 640,
        height: 1038,
        speed: 50,
        loop: false,
        autoplay: false,
        imgArr: imgarr,
        callback:function(){
            $('.arr').show();
        }
    });
    //第二页
    var imgarr2 = [];
    for(var z = 1 ;z < 52;z++){
        imgarr2.push('../jl/images/intruText/'+z+'.jpg')
    }
    frame2 = new SequenceFrame({
        id: $('#canvas2')[0],
        width: 640,
        height: 1038,
        speed: 50,
        loop: false,
        autoplay: false,
        imgArr: imgarr2,
        callback:function(){
            $('.arr1').show();
        }
    });

    //loading
    var loader = new PxLoader();
    var URL = window.location.href;
    var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
    var realLoadingNum = 0;
    var fileList = [];
    for (var i = 2; i < 52; i++) {
        fileList.push('../jl/images/home/'+i+'.jpg');
    }
    for(var i = 1; i < 52; i++){
        fileList.push('../jl/images/intruText/'+ i +'.jpg');
    }
    for(var i = 0; i < fileList.length; i++){
        var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
        pxImage.imageNumber = i + 1;
        loader.add(pxImage);
    }
    loader.addCompletionListener(function(){
        console.log("预加载图片："+fileList.length+"张");
    });
    loader.addProgressListener(function(e){
        var percent = Math.round( (e.completedCount / e.totalCount) * 100); //正序, 1-100
        realLoadingNum = percent;
        $('.loadNum').text(realLoadingNum + '%');
        if(realLoadingNum >= 100){
            $('.load-container').hide();
            frame1.play();
        }
    });
    loader.start();

    //swiper
    var status = 0;
    var mySwiper = new Swiper ('.swiper-container', {
        speed:500,
        direction : 'vertical',
        pagination: '.swiper-pagination',
        mousewheelControl : true,
        allowSwipeToNext : true,
        onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
            swiperAnimateCache(swiper); //隐藏动画元素
            swiperAnimate(swiper); //初始化完成开始动画
        },
        onSlideChangeStart:function(swiper){
            var index =  mySwiper.activeIndex;
            if(status == 0 && index == 1){
                frame2.play();
                status = 1
            }
        },
        onSlideChangeEnd: function(swiper){
            swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
        }
    })

    $('.swiper-slide4 .location').click(function(){
        var index = $(this).index();
        $('ul').fadeIn(200);
        $('ul li').eq(index-1).show().siblings().hide();

    })

    $('li').click(function(){
        $('ul').fadeOut(1000);
        $(this).hide();
    })
</script>

</html>