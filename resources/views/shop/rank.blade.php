<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vip/css/rank.css') }}">
</head>
<body>
<img src="{{ asset('vip/images/rank/rank_bg.jpg') }}">
<div class="myStep">{{ $relate->machine->num }}</div>
<div class="getGold">今日得到<span>{{ floor(($relate->machine->num)/1000) }}</span>金币</div>

<ul class="ranking">
    @foreach($machines as $machine)
        <li>
            <div class="no">1</div>
            <img class="user_avatar" src="{{ $machine->relate->avatar }}">
            <div class="user_name">{{ $machine->relate->nickname }}</div>
            <div class="user_step"><span>{{ $machine->num }}</span>步</div>
        </li>
    @endforeach
</ul>

<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/rank/home.png') }}"></a>
@if( $relate->day>= \Carbon\Carbon::today())
    <a href="javascript:void(0)" class="btnDown"><img src="{{ asset('vip/images/rank/btnDown.png') }}"></a>
@else
    <a href="{{ url('shop/coin/dog') }}" class="getGoldBtn"><img src="{{ asset('vip/images/rank/getGold.png') }}"></a>
@endif

@if(!is_null(session('day')))
    <div class="mask mask_gold">
        <p>恭喜今日获得<span>{{ floor(($relate->machine->num)/1000) }}</span>金币</p>
    </div>
@endif


<!-- script -->
<script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>


<script type="text/javascript">


    //点击弹窗消失
    $('.mask').click(function (e) {
        $(this).hide();
    });
</script>
</body>
</html>