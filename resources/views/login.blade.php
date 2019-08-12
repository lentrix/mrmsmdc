<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Mr. & Ms. MDC 2019</title>
</head>
<body>

<div class="login-wrapper">

    <div class="login-form">
        <div class="title">
            Mr. & Ms. MDC 2019
        </div>
        <img src="{{asset('images/logo_large.png')}}" class="logo" alt="">
        <form action="{{url('login')}}" method="post">
            <?= csrf_field(); ?>
            <div class="w3-padding">
                <label for="username">User Name</label>
                <input type="text" class="w3-input" id="username" name="username">
            </div>
            <div class="w3-padding">
                <label for="password">Password</label>
                <input type="password" class="w3-input" id="password" name="password">
            </div>
            <div class="w3-padding">
                <button class="w3-button w3-teal w3-right" type="submit">
                    User Login
                </button>
                <br>
            </div>
            <div class="w3-padding" style="width: 90%; float:left">
                @include('err')
            </div>

        </form>
    </div>

</div>

</body>
</html>
