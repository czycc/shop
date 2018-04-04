<script src="https://weixin.touchworld-sh.com/vip/js/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '暇步士拍党俱乐部', // 分享标题
            link: "https://weixin.touchworld-sh.com/shop",
            imgUrl: "{{asset('vip/images/share.jpg')}}", // 分享图标
            success: function () {
                $.get('{{url('api/shop/share')}}')
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '暇步士拍党俱乐部', // 分享标题
            desc: "加入拍党俱乐部，赚金币，赢惊喜，优惠券拿不停！", // 分享描述
            link: "https://weixin.touchworld-sh.com/shop",
            imgUrl: "{{asset('vip/images/share.jpg')}}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                $.get('{{url('api/shop/share')}}')
            }
        });
    });
</script>
