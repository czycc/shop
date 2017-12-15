$(function(){
    var frame, frame_arr = [];
    var frame2, frame_arr2 = [];
    var frame3, frame_arr3 = [];
    var username = '';
    var company = '';
    var job = '';
    var image = '';
    var file;
    bgm_init();
    init_loading();
    init_photoClip();

    $('#file').on('change', function(){
        file = this.files[0];
    })

    $('.page7').click(function(){
        $('.page8').show().siblings().hide();
    })
    $('.page8').click(function(){
        window.location.href= 'http://oss.suning.com/fgo/static/1219fbh/index.html';
    })

    $('.go_8page').click(function(){
        $('.page8').show().siblings().hide();
    })

    function init_loading(){
        var loader = new PxLoader();
        var URL = window.location.href;
        var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
        var realLoadingNum = 0;
        var fakeLoadingNum = 0;
        var myLoadingInterval = null;
        var tempArr = [];
        //加入数组
        for(var i = 0; i < 163; i++){
            if(i < 10){
                frame_arr.push('../res/suning/res/images/frame/1_0000'+ i + '.jpg');
            }else if(i < 100){
                frame_arr.push('../res/suning/res/images/frame/1_000'+ i + '.jpg');
            }else if(i < 1000){
                frame_arr.push('../res/suning/res/images/frame/1_00'+ i + '.jpg');
            }
        }
        for(var i = 0; i < 170; i++){
            if(i < 10){
                frame_arr2.push('../res/suning/res/images/frame2/1_0000'+ i + '.jpg');
            }else if(i < 100){
                frame_arr2.push('../res/suning/res/images/frame2/1_000'+ i + '.jpg');
            }else if(i < 1000){
                frame_arr2.push('../res/suning/res/images/frame2/1_00'+ i + '.jpg');
            }
        }
        for(var i = 0; i < 201; i++){
            if(i < 10){
                frame_arr3.push('../res/suning/res/images/frame3/1_0000'+ i + '.jpg');
            }else if(i < 100){
                frame_arr3.push('../res/suning/res/images/frame3/1_000'+ i + '.jpg');
            }else if(i < 1000){
                frame_arr3.push('../res/suning/res/images/frame3/1_00'+ i + '.jpg');
            }
        }
        var fileList= [];
        fileList = tempArr.concat(frame_arr,frame_arr2);
        for(var i = 0, len = fileList.length; i < len; i++){
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
        });
        var loading = document.getElementById('loading');
        var load_num = document.getElementById('load_num');
        myLoadingInterval = setInterval(function(){
            fakeLoadingNum++;
            if(realLoadingNum > fakeLoadingNum){
                $('.loading .progress span').width(fakeLoadingNum + "%");
            }else{
                $('.loading .progress span').width(realLoadingNum + "%");
            }
            if(fakeLoadingNum >= 100 && realLoadingNum >= 100){
                $('.loader').hide();
                $('.swiper-container').show();
                init_swiper();
                init_frame();
                frame.play();
                clearInterval(myLoadingInterval);
            }
        },30);
        loader.start();
    }

    function init_swiper(){
        //swiper
        var status = 0;
        var mySwiper = new Swiper ('.swiper-container', {
            speed: 500,
            direction : 'vertical',
            onInit: function(swiper){
                swiperAnimateCache(swiper);
            },
            onSlideChangeEnd: function(swiper){
                swiperAnimate(swiper);
            },
            onSlideChangeStart:function(swiper){
                var index =  mySwiper.activeIndex;
                if(status == 0 && index == 4){
                    frame2.play();
                    status = 1
                }
            }
        })
    }

    function init_frame(){
        frame = new SequenceFrame({
            id: $('#canvas')[0],
            width: 640,
            height: 1040,
            imgArr: frame_arr,
            speed: 50,
            loop: false,
            autoplay: false,
            callback: function(){
                frame.pause();
                $('.page1 .next_tips').fadeIn();
                $('page1').css({
                    'background': 'url(../images/frame/1_00001.jpg)'
                })
            }
        });

        frame2 = new SequenceFrame({
            id: $('#frame2')[0],
            width: 640,
            height: 1040,
            imgArr: frame_arr2,
            speed: 50,
            loop: false,
            autoplay: false,
            callback: function(){
                frame2.pause();
                $('.page4_5 .next_tips').fadeIn();
                $('page4_5').css({
                    'background': 'url(../images/frame2/1_00169.jpg)'
                })
            }
        });

        frame3 = new SequenceFrame({
            id: $('#frame3')[0],
            width: 640,
            height: 1040,
            imgArr: frame_arr3,
            speed: 50,
            loop: true,
            autoplay: true,
        });
    }

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

    function init_photoClip(){
        var pc = new PhotoClip('#clipArea', {
            size: 450,
            file: '#file',
            view: '#view',
            ok: '#clipBtn',
            maxZoom: 10,
            loadStart: function() {
                console.log('开始读取照片');
            },
            loadComplete: function() {
                console.log('照片读取完成');

                username = $('#username').val();
                company = $('#company').val();
                job = $('#job').val();
                if(username != '' && company !='' && job !=''){
                    if(file.size <= 51200){
                        pc.clear();
                        layer.msg('图片清晰度不够，请重新上传');
                    }else if(file.size >= 10485760){
                        pc.clear();
                        layer.msg('图片太大，请重新上传');
                    }else{
                        $('.swiper-container').hide();
                        $('.page6').show().siblings().hide();
                    }
                }else{
                    layer.msg('请将资料填写完整');
                }
            },
            done: function(dataURL) {
                updata_ajax(dataURL);
            },
            fail: function(msg) {
                alert(msg);
            }
        });
    }

    function updata_ajax(image){
        layer.msg('资料上传中...',{time:false});
        var formdata = new FormData();
        formdata.append('username', username);
        formdata.append('company', company);
        formdata.append('job', job);
        formdata.append('image', image);

        $.ajax({
            url: 'https://api.shanghaichujie.com/api/suning/userInfo',
            type: 'POST',
            data: formdata,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.result == true){
                    layer.closeAll();
                    $('#view').show();
                    $('#clipArea').hide();
                    $('.page7').show().siblings().hide();
                    layer.msg('点击任意区域进入下一页');
                }else{
                    layer.msg('上传失败，请重新上传');
                }

            },
            error: function(data){

            }
        })
    }
})


