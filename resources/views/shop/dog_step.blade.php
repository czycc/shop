<!DOCTYPE html>
<html>
<head>
	<title>会员商城</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=640,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="{{ asset('vip/css/reset.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vip/css/dog_step.css') }}">
</head>
<body>
	<img src="{{ asset('vip/images/dog_step/step_bg.jpg') }}">
	<a href="javascript:void(0)" class="storeList"><img src="{{ asset('vip/images/dog_step/storeList.png') }}"></a>
	<a href="{{ url('shop/index') }}" class="home"><img src="{{ asset('vip/images/dog_step/home.png') }}"></a>
	<a href="javascript:void(0)" class="btn"><img src="{{ asset('vip/images/dog_step/btn.png') }}"></a>

	<!-- mask start -->
	<div class="mask mask_store hidden" id="mask">
		<div class="show_store">
			<h1>门店信息</h1>
			<ul>
				<li>成都:双楠伊藤HP</li>
				<li>成都:成仁伊藤HP</li>
				<li>成都:春熙伊藤HP</li>
				<li>成都:建设路伊藤HP</li>
				<li>成都:高新伊藤HP</li>
				<li>温江:伊藤HP</li>
				<li>重庆:江北世纪新都综合HP</li>
				<li>重庆:沙坪凯瑞商都综合HP</li>
				<li>重庆:杨家坪新世纪HP</li>
				<li>重庆:大坪时代天街A馆店HP</li>
				<li>成都:新南凯德广场店HP</li>
				<li>上海:龙之梦店HP</li>
				<li>上海:虹口龙之梦店HP</li>
				<li>上海:港汇广场店HP</li>
				<li>上海:闵行七宝万科城市广场店HP</li>
				<li>上海:月星环球港店HP</li>
				<li>上海:长泰广场店HP</li>
				<li>上海:紫荆国际广场店HP</li>
				<li>杭州:申花银泰置地店HP</li>
				<li>杭州:西溪印象城店HP</li>
				<li>北京:汉光HP</li>
				<li>北京:龙德翠微HP</li>
				<li>北京:世纪金源HP</li>
				<li>北京:新世界一期HP</li>
				<li>北京:恒泰广场店HP</li>
				<li>北京:龙湖天街大兴HP</li>
				<li>石家庄:人民HP</li>
				<li>石家庄:北国商城HP</li>
				<li>天津:金元宝滨海国际HP</li>
				<li>天津:友谊新天地HP</li>
				<li>呼市维多利HP</li>
				<li>太原茂业天地HP</li>
				<li>秦皇岛:现代购物广场HP</li>
				<li>秦皇岛:茂业HP</li>
				<li>唐山:万达百货HP</li>
			</ul>
            <img src="{{ asset('vip/images/dog_step/dog.png') }}" class="dog">
		</div>
	</div>

	<div class="mask mask_relation hidden" id="mask2">
		<form class="show_relation" action="{{ url('shop/rank') }}" method="post">
			<p class="relation_title">请将狗狗项圈屏幕上的代码输入下面框框</p>
			<p class="relation_input"><input type="text" name="" placeholder="请写代码"></p>
			<label class="relation_btn" >
				<img src="{{ asset('vip/images/dog_step/confirm.png') }}">
				<input type="submit" style="display: none">
			</label>
			
		</form>
	</div>
	<!-- mask end -->

	<!-- script -->
    <script type="text/javascript" src="{{ asset('vip/js/jquery.min.js') }}"></script>
    <script type="text/javascript">
    	$(function(){
    		//点击显示门店信息弹窗
	    	$('.storeList').click(function(e){
	    		$('.mask_store').show();
	    	})

	    	$('.btn').click(function(e){
	    		$('.mask_relation').show();
	    	})

	    	//点击弹窗消失
	    	$('.mask').click(function(e){
	    		if(e.target.id === "mask" || e.target.id === "mask2"){
	    			$(this).hide();
	    		}
	    	});

            //表单验证
            $('.relation_input input').blur(function(){
                var text = $(this).val();
                var reg = /^[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]:[0-9A-F][0-9A-F]$/;
                if(!reg.test(text)){
                    alert('请填写正确的MAC地址(冒号必须在英文状态下输入)')
                }
            })

    	})

    	
    </script>
</body>
</html>