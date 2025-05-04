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
            width: 91%;
            margin-top: 40px;
            height: 100vh;
            border-top-left-radius: 50px;
            background-color: white;
            align-self: flex-end;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 80px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
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

        .box {
            width: 400px;
            height: 100px;
            border: 0.1px solid black;
            border-radius: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-family: 'Arial', sans-serif;
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
            padding: 18px 74px;
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
            overflow-x: auto;
            font-size: 25px;
            border-radius: 10px;
        }

        .detailButton {
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

        .detailButton:hover {
            background-color: black;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>
    <div class="container">
        @include('partials.loggedInNavbar')
        <div class="page">
            <h1>Daftar Laporan</h1>
            <div class="searchBar">
                <div class="bar">
                    <label>Pencarian</label>
                    <input style="width:300px;height:40px;font-size:20px;border-radius:10px;" type="search"
                        placeholder="Masukkan Kata Kunci">
                </div>
                <div class="bar">
                    <label>Tanggal</label>
                    <input style="width: 200px;height:40px;font-size:20px;border-radius:10px;x" type="date"
                        placeholder="Provinsi">
                </div>
            </div>
            <div class="info">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengirim</th>
                            <th>Waktu</th>
                            <th>Tanggal</th>
                            <th>Jumlah Porsi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($food as $f)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $f->nama_pengirim }}</td>
                                <td>{{ $f->waktu }}</td>
                                <td>{{ $f->tanggal }}</td>
                                <td>{{ $f->jumlah_porsi }}</td>
                                <td><button class="detailButton">Detail</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const assetBaseUrl = "{{ asset('') }}";
        window.onload = () => {
            document.getElementById('icon2').src = assetBaseUrl + 'Image/history-active.png'
            document.getElementById('iconTitle2').classList.add('active');
        }
    </script>
</body>

</html>