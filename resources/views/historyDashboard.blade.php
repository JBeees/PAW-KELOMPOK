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
            height: auto;
            width: 100%;
            background-color: red;
            overflow-y: auto;
        }

        .information {
            width: 100%;
            height: 80vh;
            border-radius: 20px;
            margin-top: 50px;
            gap: 30px;
            padding: 50px;
        }

        .infoUmum {
            width: 60%;
            height: 70vh;
            border: 0.01px solid rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 30px;
        }

        .groupOfInfo {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
            border-radius: 20px;
        }

        .bagianAtas {
            margin-top: 30px;
            width: 100%;
            height: 80%;
            display: flex;
            flex-direction: row;
            gap: 30px;
        }

        .note {
            width: 100%;
            height: 30%;
        }

        #bagianInfo {
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .groupOfBox {
            width: 40%;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .infoAtas {
            width: 100%;
            height: 40%;
            display: flex;
            border-radius: 20px;
            gap: 30px;
        }

        .infoItem {
            width: 50%;
            height: 100%;
            gap: 30px;
            display: flex;
            flex-direction: column;
        }

        .infoSP {
            width: 100%;
            height: 50%;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            border-radius: 20px;
            border: 0.01px solid rgba(0, 0, 0, 0.2);
            padding-left: 20px;
        }

        .persen {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            border: 0.01px solid rgba(0, 0, 0, 0.2);
        }

        .box {
            width: 30%;
            height: 110px;
            border: 0.01px solid rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 20px;
        }

        .bukti {
            width: 100%;
            height: 60%;
            border: 0.01px solid rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .page {
            position: relative;
            width: 91%;
            margin-top: 40px;
            min-height: 100vh;
            border-top-left-radius: 50px;
            background-color: white;
            align-self: flex-end;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 80px;
        }

        .searchBar {
            width: 100%;
            height: 15%;
            border: 0.1px solid black;
            border-radius: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 20px;
            gap: 20px;
            margin: 20px;
        }

        .bar {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 10px;
        }

        .info {
            display: flex;
            justify-content: flex-start;
            width: 100%;
            gap: 20px
        }



        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        .data-table thead tr:first-child th:first-child {
            border-top-left-radius: 15px;
        }

        .data-table thead tr:first-child th:last-child {
            border-top-right-radius: 15px;
        }

        .data-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: 15px;
        }

        .data-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: 15px;
        }

        .data-table th,
        .data-table td {
            padding: 18px 70px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .data-table th {
            background-color: red;
            color: white;
            font-weight: bold;
        }

        .data-table tr:hover {
            background-color: rgba(128, 128, 128, 0.3);
        }

        .table-container {
            min-width: 100%;
            font-size: 25px;
            border-radius: 10px;
        }

        .button {
            width: 100px;
            height: 30px;
            background: none;
            background-color: red;
            color: white;
            border: none;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            transition:
                background-color 0.3s ease,
                transform 0.2s ease,
                box-shadow 0.3s ease;
        }

        .button:hover {
            background-color: black;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        .red {
            color: red;
        }

        #deletePopUp {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #popupContent {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        #miniOverlay {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 700px;
            height: 800px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: none;
            flex-direction: column;
            z-index: 9999;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .close-btn {
            align-self: flex-start;
            cursor: pointer;
            font-size: 60px;
            margin-left: 15px;
        }

        #form {
            width: 100%;
            max-height: 800px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        .formUbah {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            font-size: 20px;
        }

        .formUbah input,
        .formUbah textarea {
            padding: 5px;
            font-size: 20px;
            border-radius: 10px;
        }

        #successPopUp {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
            z-index: 9999;
            pointer-events: auto;
        }

        #popupContent {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        #successButton {
            width: 100px;
            align-self: center;
        }
    </style>
</head>

<body>
    <div id="container" class="container">
        @include('partials.loggedInNavbar')
        @yield('content')
    </div>
    @stack('scripts')
</body>

</html>