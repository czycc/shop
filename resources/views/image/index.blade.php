<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <title>照片墙</title>
    <script src="../../res/image/js/iconfont.js"></script>
    <link rel="stylesheet" href="../../res/image/css/normalize.css">
    <link rel="stylesheet" href="../../res/image/css/layui.css">
    <link rel="stylesheet" href="../../res/image/css/swiper.min.css">
    <link rel="stylesheet" href="../../res/image/css/index.css">
</head>

<body>
<section class="home_page">
    <header>
        <img src="../../res/image/img/banner/14956.jpg" alt="">
        <nav>
            <div class="bar">
                <ul>
                    @foreach($categories as $category)
                        <li>{{ $category->category }}</li>
                    @endforeach
                </ul>
            </div>
            <!--赞-->
            <div class="praise">
                <svg style="color:white;" class="icon" aria-hidden="true">
                    <use xlink:href="#icon-eye"></use>
                </svg>
                <span class="praiseText">2000</span>
            </div>
        </nav>
    </header>
    <!--放展示图片-->
    <div class="picAll" id="picAll">
        <div class="phoWall">
        @foreach($categories as $category)
            @if($loop->first)
                <!--放图片-->
                    <div class="main">
                    </div>
                @else
                    <div class="main hidden">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <footer>
        <div class="puzzleAll">
            <div class="puzzle">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-pintu"></use>
                </svg>
                <span>拼图</span>
            </div>
        </div>
        <div class="puzzle_cancel_confirm hidden">
            <span class="puzzle_cancel">取消</span>
            <span class="puzzle_confirm">下一步</span>
        </div>

    </footer>
</section>
<section class="bigImage hidden">
    <div class="bigImage_cancel">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-iconfontshequyijujue"></use>
        </svg>
    </div>
    <div class="swiper-container" id="swiper">
        <!--放大图-->
        <div class="swiper-wrapper">
        </div>
    </div>
    <!--点击大图，存放大图-->
    <div class="bigImage_active hidden">
        <img src="" alt="">
    </div>
    <div class="bigImage_info">
        <div class="bigImage_look">
            查看大图
        </div>
        <div class="bigImage_download">
            <svg class="icon" aria-hidden="true">
                <use xlink:href="#icon-xiazai"></use>
            </svg>
            <span>下载</span>
        </div>
    </div>
</section>
<div class="compound_picture hidden">
    <div class="compound_cancel">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-iconfontshequyijujue"></use>
        </svg>
    </div>
    <div class="compound hidden" id="compound"></div>
    <div class="compound_end hidden"></div>
    <div class="popup ">
        图片生成中...
    </div>
</div>


</body>
<script src="../../res/image/js/jquery.js"></script>

<script type="application/javascript">
    @foreach($categories as $category)
    @foreach($category->Images as $image)
    $('.main').eq({{ $loop->parent->index }})
        .append('<div class="box"><img lay-src="{{ env('APP_URL').'/img/cache/foo/'.$image->image_url }}" alt=""></div>');
    @endforeach
    @endforeach
</script>
<script src="../../res/image/js/layer.js"></script>
<script src="../../res/image/js/layui.js"></script>
<script src="../../res/image/js/html2canvas.js"></script>
<script src="../../res/image/js/jquery.lazyload.js"></script>
<!--<script src="js/jquery.waterfall.js"></script>-->
<script src="../../res/image/js/swiper.min.js"></script>

<script src="../../res/image/js/index.js"></script>

</html>
