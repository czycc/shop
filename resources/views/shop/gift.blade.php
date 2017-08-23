<!DOCTYPE html>
<html>
<head>
    <title>会员商城</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/gift.css') }}">
</head>
<body>
<div class="rta">
    <div class="turntable-bg">
        <div class="pointer"><img src="{{ asset('vip/images/gift/btn.png') }}" alt="pointer"/></div>
        <div class="rotate"><img id="rotate" src="{{ asset('vip/images/gift/rta.png') }}" alt="turntable"/></div>
    </div>
    <img src="{{ asset('vip/images/gift/sprite.png') }}" alt="" class="sprite">
    <a href="{{ url('shop/index') }}" class="home">
        <img src="{{ asset('vip/images/gift/home.png') }}" alt="">
    </a>
</div>
<!--抽奖回调的弹窗-->
<div class="popup hidden">
    <img src="{{ asset('vip/images/gift/0.png') }}" alt="" class="popupBg">
    <div class="btn">
        <img src="{{ asset('vip/images/gift/confirm.png') }}" alt="" class="confirmBtn" id="confirmBtn">
        <img src="{{ asset('vip/images/gift/abandon.png') }}" alt="" class="abandonBtn">
    </div>
    <div class="gold">
        <p>$<span class="goldNum"></span></p>
    </div>
</div>
<!--抽奖抽到实物的弹窗-->
<div class="popup2 hidden"></div>

<script type="application/javascript">
    //用户的信息，在外部声名
     var openid = "{{ $user->openid }}";
    //金币总数，在外部声名
     var goldNum = '{{ $user->coin }}';
</script>
<script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vip/js/awardRotate.js') }}"></script>
<script type="text/javascript" src="{{ asset('vip/js/gift.js') }}"></script>
</body>
</html>