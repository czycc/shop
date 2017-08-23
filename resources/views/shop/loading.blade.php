<!DOCTYPE html>
<html lang="en">
<head>
    <title>会员商城</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/loading.css')}}">
</head>
<body>
<div class="loading">
    <p class="loadText"><span class="number">0</span><span>%</span></p>
    <img src="{{asset('vip/images/loading/dog.png')}}" alt="" class="dog1">
    <img src="{{asset('vip/images/loading/dog2.png')}}" alt="" class="dog2">
    <div class="load">
        <p class="grey"></p>
        <p class="orange"></p>
    </div>
</div>
</body>
<script src="{{asset('vip/js/jquery.min.js')}}"></script>
<script>
    var num = 0;
    var wid = 0;

    var timer = setInterval(function () {
        num++;
        wid = num / 100;
        $('.loading .loadText .number').html(num);
        $('.loading .load .orange').css('width', 500 * wid + "px")
        if (num >= 100) {
            clearInterval(timer);
            //当数据为100的时候，调转的连接
            window.location.href = '{{ url('shop/index') }}'
        }
    }, 50)
</script>
</html>