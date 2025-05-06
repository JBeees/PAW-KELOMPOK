<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETA</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
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

        #map {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .infoFooter {
            margin-top: auto;
            width: 90%;
            display: flex;
            justify-content: flex-start;
            padding: 20px 0;
            z-index: 10;
        }

        .infoFooter>div {
            width: 300px;
            height: 100px;
            background-color: white;
            margin-inline: 50px;
            opacity: 90%;
            border-radius: 10px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);

        }

        #miniOverlay {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
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
            width: 100%;
            align-self: flex-start;
            cursor: pointer;
            font-size: 50px;
        }

        .configOverlay {
            display: flex;
            width: 100%;
            height: 100%;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .blur {
            filter: blur(5px);
            transition: filter 0.3s ease;
        }

        .navbarOverlay {
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 40px;
        }

        .navbarOverlay a {
            padding-left: 10px;
            padding-right: 10px;
        }

        .navbarOverlay a:hover {
            background-color: red;
            color: white;
            border-radius: 10px;
        }

        .navbarOverlay>a.active {
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #overlayContent {
            width: 100%;
            height: 100%;
            margin-top: 30px;
            gap: 30px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #overlayPart {
            width: 50%;
            height: 100%;
            gap: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .boxInfo {
            width: 100%;
            height: 35%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="map"></div>
        @include('partials.navbar')
        <div class="infoFooter">
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/graduation.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Sekolah Penerima</p>
                    <p>{{ $total_id['total_sekolah_id'] }}</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/hand-shake.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Persentase Penerimaan </p>
                    <p>Example</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/truck.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Porsi Terkirim </p>
                    <p>{{ $total_id['total_porsi_id'] }}</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/people.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Siswa Penerima</p>
                    <p>{{ $total_id['total_siswa_id'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div id="miniOverlay">
        <span class="close-btn"
            onclick="document.getElementById('miniOverlay').style.display='none', document.getElementById('container').classList.remove('blur');">×</span>
        <div class="configOverlay">
            <h1 style="font-size: 40px;padding:10px;" id="provinceName">Province</h1>
            <div class="navbarOverlay">
                <a id="overlay">Info Umum</a>
                <a id="overlay">Sekolah Penerima</a>
            </div>
            <img src="{{ asset('Image/student.png') }}" style="width:50%;" alt="">
            <div id="overlayContent">
                <div class="leftOverlay" id="overlayPart">
                    <div class="boxInfo">
                        <img src="{{ asset('Image/graduation.png') }}">
                        <div style="display: flex;flex-direction: column; padding-left:20px ;">
                            <p style="font-size: 20px;">Total Sekolah Penerima</p>
                            <p id="total_sekolah"></p>
                        </div>
                    </div>
                    <div class="boxInfo">
                        <img src="{{ asset('Image/hand-shake.png') }}">
                        <div style="display: flex;flex-direction: column; padding-left:20px ;">
                            <p style="font-size: 20px;">Persentase Penerimaan </p>
                            <p>Example</p>
                        </div>
                    </div>
                </div>
                <div class="rightOverlay" id="overlayPart">
                    <div class="boxInfo">
                        <img src="{{ asset('Image/truck.png') }}">
                        <div style="display: flex;flex-direction: column; padding-left:20px ;">
                            <p style="font-size: 20px;">Total Porsi Terkirim </p>
                            <p id="total_porsi"></p>

                        </div>
                    </div>
                    <div class="boxInfo">
                        <img src="{{ asset('Image/people.png') }}">
                        <div style="display: flex;flex-direction: column; padding-left:20px ;">
                            <p style="font-size: 20px;">Total Siswa Penerima</p>
                            <p id="total_siswa"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        async function getProvince(lat, lng) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=5&addressdetails=1&accept-language=id`;
            const res = await fetch(url, {
                headers: { 'User-Agent': 'YourAppName/1.0' }, 'Accept-Language': 'id'
            });
            if (!res.ok) throw new Error('Failed to fetch geocode');
            const data = await res.json();
            return data.address.state || data.address.region || 'Unknown Province';
        }

        function switchOverlay(provinceName) {
            document.getElementById('miniOverlay').style.display = 'flex';
            document.getElementById('container').classList.add('blur');
            document.getElementById('provinceName').innerText = provinceName;
        }
        window.addEventListener('load', () => {
            const indonesiaSW = [-11.0, 95.0];
            const indonesiaNE = [6.0, 141.0];
            const map = L.map('map', {
                center: [-2.5, 118.0],
                zoom: 5.5,
                minZoom: 4,
                maxZoom: 20,
                maxBounds: [indonesiaSW, indonesiaNE],
                maxBoundsViscosity: 1.0,
                zoomControl: true,
                worldCopyJump: false
            });
            map.zoomControl.setPosition('bottomright');
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 18,
                noWrap: true
            }).addTo(map);
            map.on('click', async e => {
                try {
                    const province = await getProvince(e.latlng.lat, e.latlng.lng);
                    const response = await fetch(`/api/province-data?name=${encodeURIComponent(province)}`);
                    const data = await response.json();

                    document.getElementById('total_sekolah').innerText = data.total_prov.total_sekolah_prov;
                    document.getElementById('total_porsi').innerText = data.total_prov.total_porsi_prov;
                    document.getElementById('total_siswa').innerText = data.total_prov.total_siswa_prov;

                    switchOverlay(province);
                } catch (err) {
                    console.error(err);
                    switchOverlay('Unknown Province');
                }
            });

            window.addEventListener('resize', () => map.invalidateSize());
            setTimeout(() => map.invalidateSize(), 200);
        });
    </script>

</body>

</html>