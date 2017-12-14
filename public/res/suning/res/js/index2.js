$(function(){
    var frame, frame_arr = [];
    init_loading();
    bgm_init();

    function init_loading(){
        var loader = new PxLoader();
        var URL = window.location.href;
        var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
        var realLoadingNum = 0;
        var fakeLoadingNum = 0;
        var myLoadingInterval = null;
        var tempArr = [];
        //加入数组
        for(var i = 0; i < 170; i++){
            if(i < 10){
                frame_arr.push('res/images/frame2/1_0000'+ i + '.jpg');
            }else if(i < 100){
                frame_arr.push('res/images/frame2/1_000'+ i + '.jpg');
            }else if(i < 1000){
                frame_arr.push('res/images/frame2/1_00'+ i + '.jpg');
            }
        }
        var fileList= [];
        fileList = tempArr.concat(frame_arr);

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
            console.log(fakeLoadingNum)
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
            },
            onSlideChangeEnd: function(swiper){
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
                $('.next_tips').show();
            }
        })
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
})


