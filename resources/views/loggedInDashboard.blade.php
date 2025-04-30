<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/loggedInNavbar.css') }}">
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
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100vh;
            width: 100%;
            background-color: red;
            overflow-y: auto;
        }

        .page {
            position: relative;
            width: 93%;
            margin-top: 40px;
            height: 100vh;
            border-top-left-radius: 50px;
            background-color: white;
            align-self: flex-end;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 80px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .info {
            width: 100%;
            height: auto;
            padding-top: 30px;
            gap: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .schoolProfile {
            width: 25%;
            height: 500px;
            border: 0.5px solid black;
            border-radius: 20px;
        }
        .detailSchool{
            width: 65%;
            height: 700px;
            border: 0.5px solid black;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('partials.loggedInNavbar')
        <div class="page">
            <h1 style="font-size: 50px;">Overview</h1>
            <div class="info">
                <div class="schoolProfile">

                </div>
                <div class="detailSchool">

                </div>
            </div>
        </div>
    </div>
    <script>
        const assetBaseUrl = "{{ asset('') }}";
        window.onload = () => {
            document.getElementById('icon1').src = assetBaseUrl + 'Image/house-active.png'
            document.getElementById('iconTitle1').classList.add('active');
        }
    </script>
</body>

</html>