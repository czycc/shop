<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>暇步士拍党俱乐部</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{asset('vip/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('vip/css/coupon.css')}}">

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=63691057" charset="UTF-8"></script>

</head>
<body>
<div class="coupon">
    <img src="{{asset('vip/images/audio/audio2.png')}}" alt="" class="audioMusic">
    <audio id="audio" src="{{asset('vip/m.mp3')}}" preload="auto" loop="loop" autoplay="autoplay"></audio>
    <a href="{{ url('shop/draw') }}" class="btn"><img src="{{asset('vip/images/coupon/btn.png')}}"></a>
    <a href="{{ url('shop/index') }}" class="home"><img src="{{asset('vip/images/coupon/home.png')}}"></a>
    <ul class="cjText">
        {{--循环输出优惠券信息，NO.最多6位数--}}
        @foreach($tickets as $ticket)
            <li>
                <div>
                    <p class="textNum">NO:<span>{{ $ticket->ticket }}</span></p>
                    <p class="dataText">有效期:<span>{{ $ticket->end }}</span></p>
                </div>
                <img src="{{asset('vip/images/coupon/hundred.png')}}" alt="">
            </li>
        @endforeach
    </ul>
    <img src="{{asset('vip/images/coupon/rule.png')}}" alt="" class="ruleBtn">
    <div class="popup">
        <ul class="ruleText">
            <li>1.适用于中国内地所有暇步士门店</li>
            <li>2.适用于暇步士2017秋冬电脑牌价7折</li>
            <li>（不含）以上新品，以下新品狗仔鞋不参与活动：</li>
            <li class="ma"> CZPHAV33FU1CM7、CZPHAV47FM8CM7、</li>
            <li class="ma"> CZPHAV47FR3CM7、CZPHAV47FU1CM7、</li>
            <li class="ma"> CZPHFB38FU1CM7、CZPHFB38FU4CM7、</li>
            <li class="ma"> CZPHLX31FD1CM7、CZPHLX31FU1CM7、</li>
            <li class="ma"> CZPHLX38FK1CM7、CZPHLX38FL5CM7、</li>
            <li class="ma"> CZPHLX38FU1CM7、CZPHMB20FM2CM7、</li>
            <li class="ma"> CZPHMB20FP1CM7、CZPHMB20FU1CM7。</li>
            <li>3.每双鞋只能使用一张优惠券</li>
            <li>4.派券时间:2017年9月15日~10月31日</li>
            <li>5.优惠券有效期：2017年9月15日~10月31日</li>
            <li>6.新百丽鞋业（深圳）有限公司有权在法律允许范围内对本活动解释</li>
            <li class="maText" style="text-align: center">使用优惠券还可参与抽奖</li>
            <li style="text-align: center">抽奖规则如下：</li>
            <li>1.开奖时间：2017年11月15日</li>
            <li>2.奖品包括：</li>
            <li class="ma">魔声耳机：价值3200元（共2名）</li>
            <li class="ma">暇步士鞋履：价值1000元（共4名））</li>
            <li class="ma">暇步士8寸狗公仔：价值400元（共20名）</li>
            <li>3.开奖平台：关注暇步士HushPuppies官方微博（http://weibo.com/1958hushpuppies）和暇步士官方微信（HushPuppiesChina）</li>
            <li style="margin-top: 68px">4.通知领奖时间和方式：开奖后15个工作日内以电话、短信方式通知，凭优惠券验证码和手机号领奖，请妥善保管</li>
            <li style="margin-top: 64px;">5.兑奖时间：开奖日起45个工作日内兑奖有效，超过兑奖时间未领奖视为放弃获奖资格</li>
            <li style="margin-top: 32px">6.获奖奖品不得转让、更换且不得换算为现金</li>
            <li>7.如预留的联系方式或提交的兑奖信息有误、不符合要求而造成无法兑奖等后果，需由获奖用户自行承担责任</li>
        </ul>
    </div>

</div>

</body>

{{--引入分享设置--}}
@include('shop.share')

<script src="{{asset('vip/js/jquery.min.js')}}"></script>
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