<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <title>Mr. & Mrs. MDC 2019</title>
</head>
<body>

    <div class="navbar">
        <div class="user-name">User: {{auth()->user()->name}} - <span class="role">{{auth()->user()->role}}</span></div>
        <img src="{{asset('images/logo_small.png')}}" class="logo" alt="logo">
        <span class="brand">Mr. & Mrs. MDC 2019</span>

        <span class="nav">
            @auth
            <a href="{{url('/')}}">Home</a>
                @if(auth()->user()->role=="admin")
                    <a href="{{url('/users')}}">User Management</a>
                    <a href="{{url('/tabulator')}}">Other Scores</a>
                @endif
                <a href="{{url('/summary')}}">Summary</a>
                <a href="{{url('/logout')}}" class="logout">Logout</a>
            @endauth
        </span>
    </div>

    <div class="main-wrapper">
        @include('err')
        @yield('content')
    </div>

    <div class="contai">&nbsp;</div>

    <script>
    $(document).ready(function(){
        $(".temporary").delay(2500).fadeOut();
    })
    </script>
    @yield('scripts')

    <div class="w3-container w3-dark-gray">
        <p style="text-align: center; color: #d8d8d8">
            Copyright &copy; Benjie B. Lenteria. All rights reserved. <br>
            For inquiries please contact  <br>
            Email: benjielenteria@yahoo.com <br>
            Facebook: http://www.facebook.com/airetnel
        </p>
    </div>
</body>
</html>
