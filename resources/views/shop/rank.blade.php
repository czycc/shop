<!DOCTYPE html>
<html>
<head>
	<title>会员商城</title>
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
	<a href="javascript:void(0)" class="getGoldBtn"><img src="{{ asset('vip/images/rank/getGold.png') }}"></a>
	<a href="javascript:void(0)" class="btnDown hidden"><img src="{{ asset('vip/images/rank/btnDown.png') }}"></a>

	<div class="mask mask_gold" hidden>
		<p>恭喜今日获得<span>5</span>金币</p>
	</div>


	<!-- script -->
    <script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
    	// $('.getGoldBtn').click(function(e){
	    // 	$('.mask_gold').show();
    	// })

    	//点击弹窗消失
    	$('.mask').click(function(e){
    		$(this).hide();
    	});
    </script>
</body>
</html>