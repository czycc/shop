/**
 * Created by yqh1 on 2017/12/14.
 */
window.onload = function () {
    //nav

    // .................begin..........................



// .................end..........................


    //    判断图片的大小
    imgSise(0)
    function imgSise(active){
        //懒加载
        layui.use('flow', function(){
            var flow = layui.flow;
            //按屏加载图片
            flow.lazyimg({
                elem: $('.main').eq(active).find('img'),
                scrollElem:$('.main').eq(active)
            });

        });
        $('.main').eq(active).find('img').each(function(){
            if($(this).attr('src')){
                var wid = this.width;
                var hei = this.height;
                if(wid > hei){
                    $(this).css('height','213px');
                }
                if(wid < hei){
                    $(this).css('width','213px');
                }
            }
        });
    }
    //创建swiper数组
    var swiperArr = [];
    function swiArr(index) {
        swiperArr = [];
        $('.main').eq(index).find('img').each(function () {
            if($(this).attr('lay-src')){
                swiperArr.push($(this).attr('lay-src'));
            }else{
                swiperArr.push($(this).attr('src'));
            }

        })
    }
    //    导航栏
    var liIndex = 0;

    swiArr(liIndex);
    $('nav li').eq(0).addClass('liClick');
    $('nav li').click(function(){
        // $('.main').css('top','0px');
        liIndex = $(this).index();
        imgSise(liIndex);
        swiArr(liIndex);
        $(this).addClass('liClick').siblings().removeClass('liClick');
        $('.main').eq(liIndex).show().siblings().hide();
    })

    // 拼图
    var swiper,scrollTop;
    var puzzleArr = [];
    //初始化拼图的状态
    var puzzleMode = false;
    $('.puzzle').click(function(){
        puzzleMode = true;

        $('.main').addClass('activity-puzzle-select');
        $('.puzzle').hide();
        $('.puzzle_cancel_confirm').show();
    });
    // 取消
    $('.puzzle_cancel').click(function(){
        puzzleMode = false;
        puzzleArr = [];
        $('.main').removeClass('activity-puzzle-select');
        $('.box').removeClass('active');
        $('.puzzle').show();
        $('.puzzle_cancel_confirm').hide();
        console.log(puzzleArr);

    });
    //下一步
    $('.puzzle_confirm').click(function(){
        $('.compound_end').html('');
        $('.compound').html('');
        if (puzzleArr.length < 2) {
            layer.open({
                type: 0,
                content: '图片数量不能少于2张',
                area: ['400px', '240px'],
                skin: 'demo-class'//这里content是一个普通的String
            });
            return;
        }
        if (puzzleArr.length > 6) {
            layer.open({
                type: 0,
                content: '图片数量不能大于6张',
                area: ['400px', '240px'],
                skin: 'demo-class'//这里content是一个普通的String
            });
            return;
        }
        var puzzleImage;
        for(var i = 0 ;i < puzzleArr.length;i++){
                puzzleImage = puzzleArr[i].replace('/img/cache/foo/', '/upload/');
                $('.compound').append('<img src="'+puzzleImage+'" alt="">')
        }
        $('.home_page').hide()
        $('.compound_picture').show();
        var compound = document.getElementById('compound');
        setTimeout(function () {
            $('.popup').hide();
            $('#compound').show();
            $('.compound_end').show();
            setTimeout(function () {
                html2canvas(compound, {
                    allowTaint: true,
                    taintTest: false,
                    onrendered: function(canvas) {
                        canvas.id = "mycanvas";
                        //document.body.appendChild(canvas);
                        //生成base64图片数据
                        var dataUrl = canvas.toDataURL();
                        var newImg = document.createElement("img");
                        newImg.className = 'canvas_picture';
                        newImg.src =  dataUrl;
                        $('.compound_end').append(newImg);
                    }
                });
            },500)
        },2000)


    })
    // 拼图取消
    $('.compound_cancel').click(function () {
        puzzleArr = [];
        $('.compound_picture').hide();
        $('.home_page').show();
        $('.main').removeClass('activity-puzzle-select');
        $('.box').removeClass('active');
        $('.puzzle').show();
        $('.puzzle_cancel_confirm').hide();
        $('.popup').show();
        $('#compound').hide();
        $('.compound_end').hide();
    })
    // 选择拼图图片
    var myactive;
    $('.main').on('click', ".box", function (){
        if(puzzleMode){
            // console.log(this)
            if(!$(this).hasClass('active') && puzzleArr.length >= 6){
                // layer.msg('图片数量不能大于6张');
                layer.open({
                    type: 0,
                    content: '图片数量不能大于6张',
                    area: ['400px', '240px'],
                    skin: 'demo-class'//这里content是一个普通的String
                });
                return;
            }
            $(this).toggleClass('active');
            if($(this).hasClass('active')){
                var src = $(this).find('img').attr('src');
                puzzleArr.push(src);
            }else{
                var img = $(this).find('img').attr('src');
                for (var i = puzzleArr.length - 1; i >= 0; i--) {
                    if (puzzleArr[i] == img) {
                        puzzleArr.splice(i, 1);
                        break;
                    }
                }
            }

        }else{
            $('.bigImage_look').html('查看大图');
            click_status = true;
            myactive = $(this).index();
            $('.bigImage').show();
            $('.home_page').hide();

            bigImage();

            swiper.slideTo(myactive,0,false);

        }
    })
    // 大图

    var activeIndex;//当前滑动的索引
    function bigImage(){
        $('.swiper-wrapper').html('');
        for(var i = 0;i <swiperArr.length;i++){
            $('.swiper-wrapper').append('<div class="swiper-slide">'+
                '<img src="'+swiperArr[i]+'">'+
                '</div>');
        };
        swiper = new Swiper('.swiper-container', {
            // Enable lazy loading
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                slideChangeTransitionEnd: function () {
                    activeIndex = this.activeIndex;//切换结束时，告诉我现在是第几个slide
                },
            }

        });
    }
    // 大图取消
    var layerIndex;//定义弹出层
    $('.bigImage_cancel').click(function(){

        $('.bigImage').hide();
        $('.home_page').show();
        layer.close(layerIndex);
        $('.swiper-container').show();
        $('.bigImage_active').hide();

    });
    //点击下载
    $('.bigImage_download').click(function () {
      layerIndex = layer.msg('长按图片保存到手机', {
            icon: 6,
            time: 2000 //2秒关闭（如果不配置，默认是3秒）
        });
    })
    //查看大图
    var click_status = true;
    $('.bigImage_look').click(function(){
        if(click_status){
            var src
            if(activeIndex){
                src = swiperArr[activeIndex];
            }else{
                src = swiperArr[myactive];
            }
            $('.bigImage_active img').attr('src',src);
            $('.bigImage_active').show();
            $('.swiper-container').hide();
            $('.bigImage_look').html('加载中....');
        }
        setTimeout(function () {
            var bigImage_src = src.replace('/img/cache/foo/', '/upload/');
            $('.bigImage_look').html('加载完成');
            $('.bigImage_active img').attr('src',bigImage_src);
            click_status = false;
        },2000)

    })
    // 滑动
    var startX, startY, moveEndX, moveEndY, X, Y,status;
    var h = document.documentElement.clientHeight,

    mybody = document.getElementsByTagName('body')[0];
    // console.log(h);
    mybody.style.height = h + 'px';

    $('#picAll').on("touchstart", function(e) {
        // e.preventDefault();
        startX = e.originalEvent.changedTouches[0].pageX,
        startY = e.originalEvent.changedTouches[0].pageY;
    });
    $('#picAll').on("touchmove", function(e) {
        // e.preventDefault();
        scrollTop = $(document).scrollTop()
        moveEndX = e.originalEvent.changedTouches[0].pageX,
        moveEndY = e.originalEvent.changedTouches[0].pageY,
        X = moveEndX - startX,
        Y = moveEndY - startY;
        // console.log(startX,startY);
        if (Math.abs(X) > Math.abs(Y) && X > 0) {
        } else if (Math.abs(X) > Math.abs(Y) && X < 0) {
        } else if (Math.abs(Y) > Math.abs(X) && Y > 0) {
            status = 0;
            $('.main').animate({
                'bottom':'0px'
            },1);


        } else if (Math.abs(Y) > Math.abs(X) && Y < 0) {
            status = 1;
            if(scrollTop >= scrollTop - 852 -60){
                $('.main').animate({
                    'bottom':'70px'
                },1);
            }


        } else {
        }
    });
    $('#picAll').on("touchend", function(e) {
        switch(status){
            case 0:
                $('nav').animate({
                    'bottom':'-1px',
                },700);
                break;
            case 1:
                $('nav').animate({
                    'bottom':'-40px',
                },700);
                // console.log($(".picAll").css('scrollTop'))
                break;
        }
    });
    // $(document).on('touchmove',function (e) {
    //     e.preventDefault();
    // })




};







