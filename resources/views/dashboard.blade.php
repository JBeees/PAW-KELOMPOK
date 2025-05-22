<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .firstPart {
            width: 100%;
            height: 1100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: red;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
        }

        .statement {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 100px;
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
            justify-content: space-around;
            align-items: center;
            color: white;
            font-size: 20px;
        }

        .carousel-wrapper {
            max-width: 700px;
            text-align: center;
            margin-top: 100px;
        }

        .titleTentang {
            font-size: 60px;
            color: red;
            margin-bottom: 20px;
        }

        .swiper {
            width: 100%;
            padding-bottom: 40px;
        }

        .swiper-slide {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            text-align: center;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            display: block;
        }

        .swiper-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }

        .swiper-buttons button {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #ff4b4b;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .swiper-buttons button:hover {
            background-color: #d73737;
        }

        .secondPart {
            width: 100%;
            height: 1000px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .textTwo {
            text-align: center;
            color: red;
            padding-top: 150px;
            font-size: 25px;
        }

        .thirdPart {
            background-color: red;
            width: 100%;
            height: 1300px;
            border-top-left-radius: 100px;
            border-top-right-radius: 100px;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            display: flex;
            padding-top: 10px;
        }

        .thirdLeft {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .thirdRight {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
        }

        .indo-map {
            width: 70%;
            border: 4px solid white;
            border-radius: 70px;
            margin-bottom: 40px;
        }

        .graph {
            width: 70%;
            border: 4px solid white;
            border-radius: 70px;
        }

        .thirdTextLeft {
            font-size: 30px;
            color: white;
            padding-bottom: 40px;
        }

        .thirdTextRight {
            font-size: 110px;
        }

        .righth2 {
            font-size: 60px;
            padding-top: 80px;
        }

        .righth3 {
            font-weight: 400;
            font-size: 30px;
        }

        .button {
            width: 180px;
            height: 50px;
            background: none;
            background-color: white;
            color: red;
            border: none;
            font-size: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            margin-top:10px ;
            transition:
                background-color 0.3s ease,
                transform 0.2s ease,
                box-shadow 0.3s ease;
        }

        .button:hover {
            background-color: red;
            color:white;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        .opsi {
            padding-bottom: 90px;
        }

        .lastPart {
            width: 100%;
            height: 800px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .bantuan {
            width: 1500px;
            height: 400px;
            background-color: red;
            border-radius: 40px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .titleBantuan {
            font-size: 50px;
            font-weight: 600;
        }

        .helpimg {
            border: 4px solid white;
            border-radius: 20px;
        }

        .textBantuan {
            font-size: 25px;
        }

        .helpButton {
            background: none;
            border: none;
            font-size: 25px;
            color: white;
        }

        .helpButton:hover {
            color: black;
        }

        .footer {
            width: 100%;
            height: 250px;
            background-color: red;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<body>
    <div class="container">
        <div class="firstPart">
            @include('partials.navbar')
            <div class="statement">
                <div class="statement1">
                    <h1>10 Juta<br>siswa di Indonesia penerima<br>Program Makanan Bergizi </h1>
                </div>
                <div class="statement2">
                    <h1>Pantau Kinerja<br>Program Makan Bergizi<br>secara real-time<br>dengan NusaFood</h1>
                    <img src="{{ asset('Image/student.png') }}">
                </div>
            </div>
        </div>
        <div class="secondPart">
            <div class="carousel-wrapper">
                <h2 class="titleTentang">Tentang NusaFood</h2>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('Image/images1.jpeg') }}" /></div>
                        <div class="swiper-slide"><img src="{{ asset('Image/images2.jpeg') }}" /></div>
                        <div class="swiper-slide"><img src="{{ asset('Image/image3.jpg') }}" /></div>
                        <div class="swiper-slide"><img src="{{ asset('Image/image4.jpeg') }}" /></div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-buttons">
                        <button class="swiper-button-prev"></button>
                        <button class="swiper-button-next"></button>
                    </div>
                </div>
            </div>
            <p class="textTwo">NusaFood adalah platform pemantauan kinerja Program Makanan Bergizi Nasional.<br>
                Menggunakan teknologi terkini, kami memastikan bahwa setiap porsi makanan bergizi sampai ke
                tangan<br>siswa Indonesia yang membutuhkan. Bersama-sama, kita wujudkan program yang transparan, efektif
                dan<br>berdampak tanya bagi masa depan generasi Indonesia</p>
        </div>
        <div class="thirdPart">
            <div class="thirdLeft">
                <p class="thirdTextLeft">JELAJAHI FITUR KAMI UNTUK MELIHAT DAMPAK<br>NYATA DI SETIAP PORSI</p>
                <img class="indo-map" src="{{ asset('Image/indo_map.jpg') }}">
                <img class="graph" src="{{ asset('Image/graph.jpg') }}">
            </div>
            <div class="thirdRight">
                <p class="thirdTextRight">Peran NusaFood</p>
                <div class="opsi">
                    <h2 class="righth2">PETA PERSEBARAN</h2>
                    <h3 class="righth3">Jelajahi peta interaktif kami dan lihat<br>persebaran dan data distribusi
                        makanan di<br> setiap
                        daerah</h3>
                    <button class="button" onclick="window.location.href='{{ route('peta.penyebaran') }}'">Selengkapnya</button>
                </div>
                <div class="opsi">
                    <h2 class="righth2">LAPORAN PROGRAM</h2>
                    <h3 class="righth3">Akses data hasil kinerja program. Data<br> berasal dari hasil verifikasi
                        lapangan</h3>
                    <button class="button" onclick="window.location.href='{{ route('laporan') }}'">Selengkapnya</button>
                </div>
            </div>
        </div>
        <div class="lastPart">
            <div class="bantuan">
                <div>
                    <p class="titleBantuan">Butuh Bantuan 🤔 </p>
                    <p class="textBantuan ">Tenang suara kami kami dengar<br> Akses fitur hotline kami yang bisa
                        menampung aspirasi laporan,<br> maupun keluh kesah kamu tentang Progam Makan Bergizi</p>
                    <button class="helpButton" onclick="window.location.href='{{ route('kontak') }}'">Kontak Kami</button>
                </div>
                <img class="helpimg" src="{{ asset('Image/help.jpg') }}">
            </div>
        </div>
        <div class="footer">
            <h1 style="font-size: 60px;">NusaFood</h1>
            <h2 style="font-weight: 100;">&copy; 2025 All Right Reserved</h2>
        </div>
    </div>
</body>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1.5,
        centeredSlides: true,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

</html>