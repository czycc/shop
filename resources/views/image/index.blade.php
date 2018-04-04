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
            <label class="file_input">
                <span>点击选择图片上传</span>
                <!--<input style="display: none" id="file" type="file" accept="image/*" multiple/>-->
            </label>
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
<div class="popup_select hidden">
    <div class="popup_cancel">
        <svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-iconfontshequyijujue"></use>
        </svg>

    </div>
    <div class="select_list ">
        <p>请选择上传的类型</p>
        <ul class="list_ul">
            @foreach($categories as $category)
                <li index="{{ $category->id }}">{{ $category->category }}</li>
            @endforeach
        </ul>
        <div class="confirm_list">确 定</div>
    </div>
    <div class="upload_list hidden">
        <label for="file_input">
            <span>点击上传图片</span>
            <input style="display: none" id="file_input" type="file" accept="image/*"/>
        </label>
        <p class="upload_comfirm">确定</p>
        <p class="reselect">重新选择</p>
        <div class="image_list">
        </div>
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
<script>
    var selectIndex;
    var formData;

    var input = document.getElementById("file_input");
    //用来判断用户有没有选择图片
    var result = null;
    var picture_type;
    if (typeof FileReader === 'undefined') {
        alert = "抱歉，你的浏览器不支持 FileReader";
        input.setAttribute('disabled', 'disabled');
    } else {
        input.addEventListener('change', readFile, false);
    }

    function readFile() {
        $('.image_list').html('');
        if (!input['value'].match(/.jpg|.gif|.png|.bmp/i)) {　　//判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择")
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function (e) {
            result = e.currentTarget.result;
            $('.image_list').append('<img src="' + this.result + '" alt="">')
        };
        var reader2 = new FileReader();
        reader2.readAsBinaryString(this.files[0]);
        reader2.onload = function () {
            picture_type = this.result;
        }

    }

    $('.file_input').click(function () {
        $('.popup_select').show();

    });
    $('.select_list ul li').click(function () {
        selectIndex = $(this).index();
        $(this).addClass('select').siblings().removeClass('select');
        console.log(selectIndex);
    });
    $('.popup_cancel').click(function () {
        result = null;
        $('.popup_select').hide();
        $('.select_list ul li').removeClass('select');
        $('.upload_list').hide();
        $('.select_list').show();
        $('.image_list').html('');

    })
    $('.confirm_list').click(function () {

        if ($('.select_list ul li').hasClass('select')) {
            $('.upload_list').show();
            $('.select_list').hide();
        } else {
            alert('请选择上传图片的类型');
        }
    });
    $('.reselect').click(function () {
        result = null;
        $('.select_list ul li').removeClass('select');
        $('.image_list').html('');
        $('.upload_list').hide();
        $('.select_list').show();
    })
    $('.upload_comfirm').click(function () {
        if (result == null) {
            alert('请上传图片');

        } else {
            $('.image_list').html('');
            $('.popup_select').hide();
            $('.select_list ul li').removeClass('select');
            $('.upload_list').hide();
            $('.select_list').show();
            var index = $('.select_list ul li').eq(selectIndex).attr('index');

            formData = {
                index: index,
                result: picture_type
            }

            doUpload();
            result = null;

        }
    })

    function doUpload() {
        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
            },
            error: function (returndata) {
            }
        });
    }

</script>

</html>
