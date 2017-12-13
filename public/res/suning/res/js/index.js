$(function(){
    var frame, frame_arr = [];
    var username = '';
    var company = '';
    var job = '';
    var image = '';
    bgm_init();
    init_loading();

    $('#file').on('change', function(){
        username = $('#username').val();
        company = $('#company').val();
        job = $('#job').val();
        if(username != '' && company !='' && job !=''){
            var file = this.files[0];
            if(file.size <= 51200){
                layer.msg('图片清晰度不够，请重新上传');
            }else if(file.size >= 10485760){
                layer.msg('图片太大，请重新上传');
            }else if(window.FileReader){
                var fr = new FileReader();  
                fr.onloadend = function(e) {
                    image = e.target.result;
                    $('.page4 .picture').attr('src', image); 
                    $('.swiper-container').hide();
                    $('.page4').show();
    
                };  
                fr.readAsDataURL(file);  
            }
        }else{
            layer.msg('请将资料填写完整');
        }
    })
    
    var page4_state = 0;
    $('.confirm').click(function(){
        var formdata = new FormData();
        formdata.append('username', username);
        formdata.append('company', company);
        formdata.append('job', job);
        formdata.append('image', image);
        layer.msg('资料上传中...',{time:false});

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
                    layer.msg('点击屏幕任意区域进入下一页');
                    $('.btn_group').hide();
                    $('.success').show();
                    setTimeout(function(){
                        page4_state = 1;
                    },500)
                }else{
                    layer.msg('上传失败，请重新上传');
                }
                
            },
            error: function(data){

            }
        })
    })

    $('.page4').click(function(){
        if(page4_state == 1){
            if($('#success').css('display') == 'block'){
                $('.page4').hide();
                $('.page5').show();
            }
        }
    })

    $('.page5').click(function(){
        window.location.href= 'http://oss.suning.com/fgo/static/1219fbh/index.html'; 
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
        for(var i = 0; i < 76; i++){
            if(i < 10){
                frame_arr.push('res/images/frame/1_0000'+ i + '.jpg');
            }else if(i < 100){
                frame_arr.push('res/images/frame/1_000'+ i + '.jpg');
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
            fakeLoadingNum++;
            if(realLoadingNum > fakeLoadingNum){
                $('.loading .num')[0].innerHTML = fakeLoadingNum + "%";
            }else{
                $('.loading .num')[0].innerHTML = realLoadingNum + "%";
            }
            if(fakeLoadingNum >= 100 && realLoadingNum >= 100){
                $('.loading').hide();
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
            // pagination: '.swiper-pagination',
            // mousewheelControl : true,
            // allowSwipeToNext : true,
            onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
                swiperAnimateCache(swiper); //隐藏动画元素
                // swiperAnimate(swiper); //初始化完成开始动画
            },
            // onSlideChangeStart:function(swiper){
            //     var index =  mySwiper.activeIndex;
            // },
            onSlideChangeEnd: function(swiper){
                swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
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
                $('.page1 .title').fadeIn();
                $('.page1 .sub_text').fadeIn();
                $('.page1 p').fadeIn();
                $('.page1 .next_tips').fadeIn();
                $('page1').css({
                    'background': 'url(../images/frame/1_00001.jpg)'
                })
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


