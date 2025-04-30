<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Jost', sans-serif;
        }

        body,
        html {
            overflow: hidden;
        }

        .container {
            display: flex;
            width: 100vw;
            height: 100vh;
        }

        .login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .loginForm {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 25px;
        }

        .nusa {
            font-size: 90px;
            margin: 0;
            font-weight: 700;
            text-decoration: none;
            color: black;
        }

        input {
            width: 300px;
            height: 28px;
            border-radius: 20px;
            padding-left: 12px;
        }

        label {
            margin-left: 8px;
        }

        .regis {
            opacity: 50%;
            font-size: 30px;
            font-weight: 500;
            margin: 0;
            margin-top: -20px;
        }

        button {
            width: 340px;
            height: 40px;
            border-radius: 20px;
            margin-top: 10px;
            background-color: red;
            color: white;
            font-size: 25px;
        }

        button:hover {
            background-color: darkblue;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .right {
            width: 50%;
            position: relative;
        }

        .map {
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 1;
            pointer-events: none;
            opacity: 30%;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login">
            <a href="{{ route('dashboard') }}" class="nusa">NusaFood</a>
            <h2 class="regis">Login</h2>
            <form class="form">
                <div class="loginForm">
                    <label>Email</label>
                    <input style="width:350px;height:40px;font-size:25px" type="email" placeholder="Email">
                </div>
                <div class="loginForm">
                    <label>Kata Sandi</label>
                    <input style="width:350px;height:40px;font-size:25px" type="password" placeholder="Kata Sandi">
                </div>
                <div class="buttons">
                    <button type="button" onclick="window.location.href='{{ route('loggedIn') }}'"
                        class="masuk">Masuk</button>
                    <label style="font-size:18px;margin-top:15px;margin-bottom:0;">Belum punya akun?</label>
                    <button type="button" onclick="window.location.href='{{ route('registrasi') }}'">Register</button>
                </div>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('Image/redbox.png') }}">
            <img class="map" src="{{ asset('Image/indo_bg.png') }}">
        </div>
    </div>
</body>

</html>