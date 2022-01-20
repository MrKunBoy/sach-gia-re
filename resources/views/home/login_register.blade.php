<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{$title}}</title>
        <link rel="stylesheet" href="/login/style.css">

        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
    @include('home.alert')

        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

                <div class="login">
                    <form action="{{route('login-home')}}" method="post">
                        @csrf

                        <label for="chk" aria-hidden="true">Đăng nhập</label>

                        <input type="email" name="email" placeholder="Email" required="">
                        <input type="password" name="password" placeholder="Mật khẩu" required="">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
                <div class="signup">
                    <form action="{{route('register-home')}}" method="POST">

                        <label for="chk" aria-hidden="true">Đăng ký</label>
                        <input type="email" name="email" placeholder="Email" required="">
                        <input type="password" name="password" placeholder="Mật khẩu" required="">
                        <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required="">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                        @csrf
                    </form>
                </div>

        </div>
    </body>
</html>
<!-- partial -->

</body>
</html>
