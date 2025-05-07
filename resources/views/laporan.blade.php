<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan </title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/navbar.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Jost', sans-serif;
        }

        body,
        html {
            height: 100%;
            overflow-x: hidden;
        }

        #container {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            min-height: 100vh;
        }

        .containerTitle {
            width: 100%;
            height: 400px;
            background-color: red;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .opsiButton {
            width: 100%;
            height: 150px;
            display: flex;
            align-items: center;
            padding-left: 200px;
        }

        .opsiLaporan a {
            font-size: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 30px;
            text-decoration: none;
            background-color: red;
            color: white;
            position: relative;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div id="container">
        @include('partials.navbar')
        <div class="containerTitle">
            <h1 style="font-size:60px; color:white; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); ">Lihat Laporan Kinerja
                Program</h1>
        </div>
        <div class="opsiButton">
            <div class="opsiLaporan">
                <a id="button1">Laporan Umum</a>
            </div>
        </div>
    </div>
    <script>

    </script>
</body>

</html>