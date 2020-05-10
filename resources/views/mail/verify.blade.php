<!DOCTYPE html>
<html>

<head>
    <title>Xác thực người dùng</title>
</head>

<body>
    <h1>Commerce store thông báo</h1>
    <p>Chúc mừng bạn đã đăng kí thành công hãy click để xác thực email</p>
    {{ URL::to('verifyEmail?token=' . $token) }}.<br/>
    <p>Thank you</p>
</body>

</html>