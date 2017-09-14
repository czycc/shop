$(function(){
    //用户的信息，在外部声名
    // var openid = 'odh7zsgI75iT8FRh0fGlSojc9PWM';
    //金币总数，在外部声名
    // var goldNum = 1000;
    var bRotate = false;
    //全局的0,1,2,3,4,5,6
    var globalAwards = null;
    // 全局的奖品名字
    var globalTxt = null;
    //点击中间按钮开始抽奖
    $('.pointer').click(function (){
        if(bRotate) return;
        var item = rnd(0,7);
        switch (item) {
            case 0:
                rotateFn(0, 292, '狗项圈');
                break;
            case 1:
                rotateFn(1, 247, '徽章');
                break;
            case 2:
                rotateFn(2, 202, '钥匙扣');
                break;
            case 3:
                rotateFn(3, 157, '5');
                break;
            case 4:
                rotateFn(4, 112, '手机壳');
                break;
            case 5:
                rotateFn(5, 67, '10');
                break;
            case 6:
                rotateFn(6, 22, '压缩T');
                break;
            case 7:
                rotateFn(7, 337, '100元券');
                break;
        }
    });
    //随机数
	function rnd(n, m){
        return Math.floor(Math.random()*(m-n+1)+n)
    }
    //抽奖函数
	function rotateFn(awards, angles, txt){
		bRotate = !bRotate;
        $('#rotate').stopRotate();
        $('#rotate').rotate({
            angle:0,
            animateTo:angles+1800,
            duration:8000,
            easing: $.easing.easeInOutExpo,
            //抽奖完成的回调
            callback:function (){
                globalAwards = awards;
                globalTxt = txt;
                bRotate = !bRotate;
                $('.popup .popupBg').show();
                $('.popup .popupBg').attr('src','../vip/images/gift/'+awards+'.png');
                //确认兑换 和 取消兑换按钮显示，在抽到金币，代金券的情况下影藏；
                $('.popup .btn').show();
                //当抽到的是5金币，10金币，100代金券时候的综合情况
                if(awards == 3 || awards == 5 || awards ==7 ){
                    //当抽到的为金币，代金券，按钮影藏
                    $('.popup .btn').hide();
                    //点击弹窗的任何位置。弹窗隐藏
                    $('.popup').click(function(){
                        $(this).hide();
                    })
                }
                // 抽到金币
                if(awards == 3 || awards == 5){
                    $.ajax({
                        type: "POST",
                        url: "https://weixin.touchworld-sh.com/api/draw/coin",
                        data: {
                            'openid': openid,
                            'count':txt
                        },
                        async:false,
                        dataType: "json",
                        success: function(data) {
                            goldNum = data.coin;
                            if(data.code == 0){
                                alert('每天只能抽取3次金币，请明天继续哟');
                                $('.popup .popupBg').hide();
                            }
                        },
                        error: function(res) {

                        }
                    });
                }
                //抽到代金券
                if(awards == 7){
                    $.ajax({
                        type: "POST",
                        url: "https://weixin.touchworld-sh.com/api/draw/ticket",
                        data: {
                            'openid': openid,
                        },
                        async:false,
                        dataType: "json",
                        success: function(data) {
                            goldNum = data.coin;
                        },
                        error: function(res) {

                        }
                    });
                }
                //金币总数
                $('.popup .goldNum').html(goldNum);
                //转盘停止的时候，显示该奖品的弹窗
                $('.popup').show();
            }
        })
	}

	//点击确认兑换
    $('.popup .confirmBtn').click(function(){
        if(globalAwards == 0 || globalAwards == 1 || globalAwards == 2 || globalAwards == 4 || globalAwards == 6){

            var data = award(openid,globalAwards,globalTxt);
            $.ajax({
                type: "POST",
                url: "https://weixin.touchworld-sh.com/api/draw/reward",
                data: data,
                dataType: "json",
                async:false,
                success: function(data) {
                    goldNum = data.coin;
                    if(data.code == 0){
                        alert('金币数不够，再攒多一点再来吧！');
                        $('.popup').hide();
                    }else if(data.code == 1){
                        $('.popup').hide();
                        $('.popup2').show();
                    }
                },
                error: function(res) {
                    console.log('res')
                }
            });
        }
    });

    // //点击放弃兑换
    $('.popup .abandonBtn').click(function(){
        $('.popup').hide();

    });
    //点击popup2 当前页面隐藏
    $('.popup2').click(function(){
        $(this).hide();
    })
    //判断传给后台gift 与 实物对应 gift1代表压缩T，gift2狗项圈，gift3手机壳，gift4钥匙扣,gift5代表名牌
	function award(openid,num,txt) {
        switch (num){
            case 0:
                return {
                    'openid': openid,
                    'type': 'gift2'
                };
            case 1:
                return {
                    'openid': openid,
                    'type': 'gift5'
                };
            case 2:
                return {
                    'openid': openid,
                    'type': 'gift4'
                };
            case 4:
                return {
                    'openid': openid,
                    'type': 'gift3'
                };
            case 6:
                return {
                    'openid': openid,
                    'type': 'gift1'
                };
        }
    }


})

