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
	<div class="myStep">5000</div>
	<div class="getGold">今日得到<span>5</span>金币</div>

	<ul class="ranking">
		<li>
			<div class="no">1</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">拍拍</div>
			<div class="user_step"><span>5000</span>步</div>
		</li>
		<li>
			<div class="no">2</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">拍拍</div>
			<div class="user_step"><span>3000</span>步</div>
		</li>
		<li>
			<div class="no">3</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">拍拍</div>
			<div class="user_step"><span>2000</span>步</div>
		</li>
		<li>
			<div class="no">4</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">小巴</div>
			<div class="user_step"><span>1500</span>步</div>
		</li>
		<li>
			<div class="no">5</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">巴巴</div>
			<div class="user_step"><span>1000</span>步</div>
		</li>
		<li>
			<div class="no">6</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">巴啦</div>
			<div class="user_step"><span>700</span>步</div>
		</li>
		<li>
			<div class="no">7</div>
			<img class="user_avatar" src="{{ asset('vip/images/rank/avatar.png') }}">
			<div class="user_name">巴巴巴</div>
			<div class="user_step"><span>100</span>步</div>
		</li>
	</ul>

	<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/rank/home.png') }}"></a>
	<a href="javascript:void(0)" class="getGoldBtn"><img src="{{ asset('vip/images/rank/getGold.png') }}"></a>
	<a href="javascript:void(0)" class="btnDown hidden"><img src="{{ asset('vip/images/rank/btnDown.png') }}"></a>

	<div class="mask mask_gold">
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