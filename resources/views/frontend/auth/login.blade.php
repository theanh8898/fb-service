<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- displays site properly based on user's device -->

    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/style.css') }}">

    <title>Facebook Seo</title>

    <script src="https://kit.fontawesome.com/c78d876d94.js" crossorigin="anonymous"></script>

    <style>
        .attribution {
            font-size: 11px;
            text-align: center;
        }

        .attribution a {
            color: hsl(228, 45%, 44%);
        }
    </style>
</head>

<body>
<div class="login-page">
    <img class="wave" src="./images/wave.png">
    <div class="container">
        <div class="img">
            <img src="./images/bg.svg">
        </div>

        <div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="avatar" src="./images/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Mật khẩu</h5>
                        <input id="password" class="input" type="password" name="password" required autocomplete="current-password" >
                    </div>
                </div>

                @if(count($errors->all()) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="text-danger font-size-12" style="color: red;">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif

                <input type="submit" class="btn" value="Đăng nhập">

                <div class="actions">
                    <a href="#">Quên mật khẩu ?</a>
                    <span>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></span>
                </div>
            </form>
        </div>

    </div>
</div>


<!-- javascript -->

<script src="./app/js/jquery-3.5.1.min.js"></script>


<script>
    const inputs = document.querySelectorAll(".input");
    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }

    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
</script>
</body>

</html>
