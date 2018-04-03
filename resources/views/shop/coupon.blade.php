<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/coupon.css')}}">

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?54ebc5c876bf935bc6eb2cd0338247cd";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<body>
<div class="coupon">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{asset('vip/images/coupon/btn.png')}}"></a>
    <a href="{{ url('shop/index') }}" class="home"><img src="{{asset('vip/images/coupon/home.png')}}"></a>
    <ul class="cjText">
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo1.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
        <li>
            <div class="img">
                <img src="{{asset('vip/images/coupon/logo2.png')}}" alt="">
            </div>
            <div>
                <p class="textNum">NO:<span>773221</span></p>
                <p class="dataText">有效期:<span>2017.08.20</span></p>
            </div>
        </li>
    </ul>
    <img src="{{asset('vip/images/coupon/rule.png')}}" alt="" class="ruleBtn">
    <div class="popup">
        <ul class="ruleText">
            <h3>暇步士:</h3>
            <h4>18SS新品传播战役H5优惠券</h4>
            <li>1.适用于中国内地所有暇步士门店；</li>
            <li>2.暇步士2018年春鞋7.5折（含7.5折）以上、2018年凉鞋8折（含8折）以上可使用优惠券；以下新品不参与活动：CZPHAV57FU1AM8，CZPHAV58FU1AM8，CZPHND20FK1AQ8，CZPHND20FM1AQ8，CZPHND20FU1AQ8，CZPHND20FU2AQ8；</li>
            <li>3.每双鞋只能使用一张优惠券，且不能同时参与其他促销活动；</li>
            <li>4.派券时间：2018年4月2日~5月6日</li>
            <li>5.优惠券有效期：2018年4月2日~5月6日</li>
            <li>6.新百丽鞋业（深圳）有限公司有权在法律允许范围内对本活动解释。</li>
            <li></li>
            <h3>酷迪:</h3>
            <h4>宠物SPA100元抵用券</h4>
            <li>1、此券仅限酷迪珠江店使用，店铺地址：北京市朝阳区珠江帝景商业南街b1酷迪宠物;</li>
            <li>2、可使用项目为：基础水疗SPA、特效SPA、果蔬SPA、泥疗SPA、体膜SPA使用；</li>
            <li>3、可使用日期为2018年4月1日至2018年5月31日，周六日及节假日可用；</li>
            <li>4、不可叠加使用，每次仅限使用一张，不可折现，不可找零，不与其他优惠同时使用。</li>
            <li></li>
            <h3>宠颐生:</h3>
            <h4>310元体检套餐优惠兑换</h4>
            <li>1、医院正常营业时间内可使用，医院正常营业时间以医院公示为准。</li>
            <li>2、宠主可凭该优惠券以29元优惠价格兑换原价310元体检套餐一份。该体检套餐包含血液检查、皮肤检测、体内寄生虫检查、常规体格检查。其它产品不适用。</li>
            <li>3、该优惠券仅限一只宠物使用一次。</li>
            <li>4、为保证服务质量，该优惠券使用前请提前一天预约。</li>
            <li>5、仅限于中国大陆地区指定宠颐生动物医院使用，未开业医院和装修期间医院无法使用本券，具体使用详情以医院内公示为准，医院信息可以到宠颐生官网或者当地大众点评搜索“宠颐生”各医院进行电话查询或致电400-6213-520热线进行咨询。</li>
            <li>6、该优惠券不可与院内其他优惠活动同享。</li>
            <li>7、该优惠券不可兑换现金。</li>
            <li>8、宠颐生保留在法律范围内对此优惠活动的解释权。</li>
            <li>9、券有效期为2018-04-02~2018-06-30。</li>
        </ul>
    </div>
</div>

</body>

{{--引入分享设置--}}
@include('shop.share')

<script>
    //解决ios上不能自动播放声音
    bgm_init();
    function bgm_init(){
        var audio = document.getElementById('audio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
//        window.addEventListener('touchstart', function firstTouch(){
//            audio.play();
//            this.removeEventListener('touchstart', firstTouch);
//        });

        var audioMusic = document.getElementsByClassName('audioMusic')[0];

        audioMusic.addEventListener('touchstart', function (){
            if(audio.paused){
                audio.play();
                audioMusic.src = '{{asset('vip/images/audio/audio2.png')}}'
            }else{
                audio.pause();
                audioMusic.src = '{{asset('vip/images/audio/audio1.png')}}'

            }


        });

        $('.ruleBtn').click(function () {
            $('.popup').show();
        })

        $('.popup').click(function () {
            $(this).hide();
        })
    }
</script>



</html>