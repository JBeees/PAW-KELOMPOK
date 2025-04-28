<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
        }
        .firstPart{
            width: 100%;
            height: 1100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: red;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
        }

        .navbar {
            width: 1500px;
            height: 75px;
            margin-top: 15px;
            background-color: white;
            border-radius: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .navbar-left {
            display: flex;
            align-items: center;
        }

        .navbar-right {
            width: 500px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .profile {
            width: 9%;
            margin-right: 40px;
            margin-left: 40px;
        }

        .title {
            margin-left: 40px;
            margin-right: 40px;
        }

        h3 {
            margin-left: 40px;
            margin-right: 40px;
            font-weight: 400;
            font-size: 20px;
        }

        h3:hover {
            color: red;
            cursor: pointer;
        }

        .logout-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logout-button {
            background-color: black;
            border: none;
            border-radius: 8px;
            padding: 12px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logout-button:hover {
            background-color: red;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .logout-icon {
            position: relative;
            width: 24px;
            height: 24px;
        }

        .logout-icon .door {
            width: 20px;
            height: 18px;
            border: 2px solid white;
            border-left: none;
            border-radius: 0 3px 3px 0;
            position: absolute;
            right: 0;
            top: 2px;
        }

        .logout-icon .arrow {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .logout-icon .arrow::before {
            content: "";
            display: block;
            width: 12px;
            height: 2px;
            background-color: white;
        }

        .logout-icon .arrow::after {
            content: "";
            display: block;
            width: 0;
            height: 0;
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            border-right: 5px solid white;
            position: absolute;
            left: -5px;
            top: -3px;
        }

        .statement {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .statement1 {
            text-align: center;
            color: white;
            font-size: 30px;
            padding-top: 60px;
            letter-spacing: -2px;
            line-height: 70px;
            padding: 60px 0;
        }

        .statement2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="firstPart">
            <div class="navbar">
                <div class="navbar-left">
                    <h1 class="title">NusaFood</h1>
                    <h3>Peta Penyebaran</h3>
                    <h3>Laporan Program</h3>
                    <h3>Kontak Kami</h3>
                </div>
                <div class="navbar-right">
                    <button onclick="window.location.href='login.html'"" class=" logout-button">
                        <div class="logout-icon">
                            <div class="door"></div>
                            <div class="arrow"></div>
                        </div>
                    </button>
                    <img class="profile" src="profile.png">
                </div>
            </div>
            <div class="statement">
                <div class="statement1">
                    <h1>10 Juta<br>siswa di Indonesia penerima<br>Program Makanan Bergizi </h1>
                </div>
                <div class="statement2">
                    <h1>Pantau Kinerja<br>Program Makan Bergizi<br>secara real-time<br>dengan NusaFood</h1>
                    <img src="student.png">
                </div>
            </div>
        </div>
</body>

</html>