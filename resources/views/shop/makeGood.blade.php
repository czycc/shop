<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('vip/css/makeGood.css') }}">
</head>
<body>
<!--兑换奖品-->
<div class="makeGood">
    <p class="text">$<span>{{ $user->coin }}</span></p>
    <ul>
        @foreach( $logs as $log)
            <li>
                <span class="payText">{{ $log->event }}</span>
                <span class="number">{{ $log->type . $log->quantity }}</span>
            </li>
        @endforeach
    </ul>
    {{--前往抽奖页面--}}
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{ asset('vip/images/makeGood/btn.png') }}"></a>
    {{--前往首页--}}
    <a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/makeGood/home.png') }}"></a>
</div>
</body>
</html>