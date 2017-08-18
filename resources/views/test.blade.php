<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<form action="{{ url('/sms') }}" method="post">
  {!! csrf_field() !!}
  <input type="text" name="mobile">
  <button id="sendVerifySmsButton">发送验证码</button>
  <input type="text" name="verifyCode">
  <button type="submit">提交</button>
</form>
</body>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script src="{{ asset('js/laravel-sms.js') }}"></script>
<script>
    $('#sendVerifySmsButton').sms({
        //laravel csrf token
        token       : "{{csrf_token()}}",
        //请求间隔时间
        interval    : 60,
        //请求参数
        requestData : {
            //手机号
            mobile : function () {
                return $('input[name=mobile]').val();
            },
            //手机号的检测规则
            mobile_rule : 'mobile_required'
        }
    });
</script>
</html>