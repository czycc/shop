<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/loading.css')}}">
</head>
<body>
<div class="loading">
    <p class="loadText"><span class="number">0</span><span>%</span></p>
    <div class="load">
        <p class="grey"></p>
        <p class="orange"></p>
    </div>
    <canvas id='canvas'></canvas>
</div>
</body>
<script src="../vip/js/jquery.min.js"></script>
<script src="{{asset('vip/js/sequenceFrame.js')}}"></script>

<script>
    var num = 0;
    var wid = 0;
    var timer = setInterval(function () {
        num++;
        wid = num / 100;
        $('.loading .loadText .number').html(num);
        $('.loading .load .orange').css('width',500*wid + "px")
        if(num >= 100){
            clearInterval(timer);
            //当数据为100的时候，调转的连接
          window.location.href = '{{ url('shop/index') }}'
        }
    },30)
    var imgarr = [];
    for(var i = 1 ;i < 10;i ++){
        imgarr.push('../vip/images/loading/ladingpage/loding page_0000'+i+'.png')
    }
    for(var i = 10 ;i < 69;i ++){
        imgarr.push('../vip/images/loading/ladingpage/loding page_000'+i+'.png')
    }

    var frame2 = new SequenceFrame({
        id: $('#canvas')[0],
        width: 640,
        height: 1038,
        speed: 50,
        loop: false,
        callback: function() {

            $('.essence1').show();

        },
        imgArr: imgarr
    });
</script>
</html>