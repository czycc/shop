<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/coupon.css')}}">
</head>
<body>
<div class="coupon">
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{asset('vip/images/coupon/btn.png')}}"></a>
    <a href="{{ url('shop/index') }}" class="home"><img src="{{asset('vip/images/coupon/home.png')}}"></a>
    <ul>
        {{--循环输出优惠券信息，NO.最多6位数--}}
        @foreach($tickets as $ticket)
            <li>
                <img src="{{asset('vip/images/coupon/bone.png')}}" alt="">
                <div>
                    <p class="textNum">NO:<span>{{ $ticket->ticket }}</span></p>
                    <p class="dataText">有效期:<span>{{ $ticket->end }}</span></p>
                </div>
            </li>
        @endforeach
    </ul>

</div>

</body>



</html>