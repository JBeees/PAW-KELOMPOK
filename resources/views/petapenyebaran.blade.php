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

        #configOverlay,
        #configOverlay2 {
            display: flex;
            width: 100%;
            height: 100%;
            flex-direction: column;
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

        .tombolNavbarOverlay {
            padding-left: 10px;
            padding-right: 10px;
        }

        .tombolNavbarOverlay:hover {
            background-color: red;
            color: white;
            border-radius: 10px;
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
            padding: 10px;
        }

        #overlayPart {
            width: 50%;
            height: 100%;
            gap: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        #overlay1 {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .boxInfo {
            width: 100%;
            height: 35%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
            padding: 25px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
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
            padding: 18px 20px;
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
            font-size: 20px;
            border-radius: 10px;
        }

        .red {
            color: red;
        }

        .black {
            color: black;
        }

        #overlay2 {
            width: 100%;
            height: 100%;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #overlay3 {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #overlay4 {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .info2 {
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: ce
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

        .tableSearch {
            width: 50%;
            height: 11%;
            padding: 10px;
        }

        .tableSearch input {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            font-size: 17px;
            padding-left: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="map"></div>
        @include('partials.navbar')
        <div class="infoFooter">
            <div>
                <img style="padding-left: 10px;width:15%;" src="{{ asset('Image/graduation.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Sekolah Penerima</p>
                    <p>{{ $total_id['total_sekolah_id'] }}</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/hand-shake.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Persentase Penerimaan </p>
                    <p>{{ $total_id['persen'] }}%</p>
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
                <img style="padding-left: 10px;width:15%;" src="{{ asset('Image/people.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Siswa Penerima</p>
                    <p>{{ $total_id['total_siswa_id'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div id="miniOverlay">
        <span class="close-btn" id="close-btn">×</span>
        <div id="configOverlay">
            <h1 style="font-size: 40px;padding:10px;" id="provinceName">Province</h1>
            <div class="navbarOverlay">
                <a id="tombolInfoUmum" class="tombolNavbarOverlay">Info Umum</a>
                <a id="tombolSekolah" class="tombolNavbarOverlay">Sekolah Penerima</a>
            </div>
            <div id="overlay1">
                <img src="{{ asset('Image/student.png') }}" style="width:50%;" alt="">
                <div id="overlayContent">
                    <div class="leftOverlay" id="overlayPart">
                        <div class="boxInfo">
                            <img style="width:15%;" src="{{ asset('Image/graduation.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Total Sekolah Penerima</p>
                                <p id="total_sekolah"></p>
                            </div>
                        </div>
                        <div class="boxInfo">
                            <img src="{{ asset('Image/hand-shake.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Persentase Penerimaan </p>
                                <p id="persenProv"></p>
                            </div>
                        </div>
                    </div>
                    <div class="rightOverlay" id="overlayPart">
                        <div class="boxInfo">
                            <img style="width:15%;" src="{{ asset('Image/people.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Total Porsi Terkirim </p>
                                <p id="total_porsi"></p>
                            </div>
                        </div>
                        <div class="boxInfo">
                            <img style="width:15%;" src="{{ asset('Image/people.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Total Siswa Penerima</p>
                                <p id="total_siswa"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="overlay2">
                <div class="info2">
                    <div class="tableSearch">
                        <input type="search" id="inputNamaSekolah" placeholder="Masukkan Nama Sekolah">
                    </div>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th style="padding:20px">No.</th>
                                    <th>Nama Sekolah</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody id="rows"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="configOverlay2" style="display:none;">
            <h1 style="font-size: 40px;padding:10px;" id="schoolName">Nama Sekolah</h1>
            <div class="navbarOverlay">
                <a id="tombolInfoUmumSekolah" class="tombolNavbarOverlay">Info Umum</a>
                <a id="tombolDokumSekolah" class="tombolNavbarOverlay">Dokumentasi</a>
            </div>
            <div id="overlay3">
                <div class="alamatSekolah" style="padding-left:20px;align-self:flex-start;">
                    <h1>Detail Sekolah</h1>
                    <p id="address">Alamat</p>
                </div>
                <div id="overlayContent">
                    <div class="leftOverlay" id="overlayPart">
                        <div class="boxInfo" style="height:calc(70% + 40px);">
                            <img src="{{ asset('Image/hand-shake.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px;">
                                <p style="font-size: 20px;">Persentase Penerimaan </p>
                                <p id="persenSekolah"></p>
                            </div>
                        </div>
                    </div>
                    <div class="rightOverlay" id="overlayPart">
                        <div class="boxInfo">
                            <img src="{{ asset('Image/truck.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Total Porsi Terkirim </p>
                                <p id="total_porsi_sekolah"></p>
                            </div>
                        </div>
                        <div class="boxInfo">
                            <img style="width:15%;" src="{{ asset('Image/people.png') }}">
                            <div style="display: flex;flex-direction: column; padding-left:20px ;">
                                <p style="font-size: 20px;">Total Siswa Penerima</p>
                                <p id="total_siswa_sekolah"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="overlay4">
                <img id="dokumSekolah" style="width: 50%;">
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        async function getProvince(lat, lng) {
            const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=5&addressdetails=1&accept-language=id`;
            const res = await fetch(url, {
                headers: { 'User-Agent': 'YourAppName/1.0' },
                'Accept-Language': 'id'
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
            let lastProvince = null;
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
                document.getElementById('tombolInfoUmum').classList.add('red');
                try {
                    lastProvince = await getProvince(e.latlng.lat, e.latlng.lng);
                    const response = await fetch(
                        `/api/province-data?name=${encodeURIComponent(lastProvince)}`
                    );
                    const data = await response.json();
                    document.getElementById('total_sekolah').innerText = data.total_prov.total_sekolah_prov;
                    document.getElementById('total_porsi').innerText = data.total_prov.total_porsi_prov;
                    document.getElementById('total_siswa').innerText = data.total_prov.total_siswa_prov;
                    document.getElementById('persenProv').innerText = data.total_prov.persen + "%";
                    switchOverlay(lastProvince);
                } catch (err) {
                    console.error(err);
                    switchOverlay('Unknown Province');
                }
            });
            const tombolSekolah = document.getElementById('tombolSekolah');
            tombolSekolah.addEventListener('click', async function (event) {
                event.preventDefault();
                try {
                    const response = await fetch(
                        `/api/province-data?name=${encodeURIComponent(lastProvince)}`
                    );
                    const data = await response.json();
                    document.getElementById('overlay1').style.display = 'none';
                    document.getElementById('overlay2').style.display = 'flex';
                    tombolSekolah.classList.remove('black');
                    tombolSekolah.classList.add('red');
                    document.getElementById('tombolInfoUmum').classList.remove('red');
                    document.getElementById('tombolInfoUmum').classList.add('black');
                    const tbody = document.getElementById('rows');
                    tbody.innerHTML = '';
                    data.school.forEach((f, i) => {
                        tbody.innerHTML += `
    <tr>
      <td style="padding:20px">${i + 1}</td>
      <td>${f}</td>
      <td>
        <button class="button detailButtonSekolah">Detail</button>
      </td>
    </tr>
  `;
                    });
                } catch (err) {
                    console.error('Error fetching school data:', err);
                }
            });
            const tombolInfoUmum = document.getElementById('tombolInfoUmum');
            tombolInfoUmum.addEventListener('click', async function (event) {
                event.preventDefault();
                getBackInfoUmum();
            });
            function getBackInfoUmum() {
                document.getElementById('overlay1').style.display = 'flex';
                document.getElementById('overlay2').style.display = 'none';
                tombolInfoUmum.classList.remove('black');
                tombolInfoUmum.classList.add('red');
                document.getElementById('tombolSekolah').classList.remove('red');
                document.getElementById('tombolSekolah').classList.add('black');
                document.getElementById('configOverlay').style.display = 'flex';
                document.getElementById('configOverlay2').style.display = 'none';
            }
            const closeButton = document.getElementById('close-btn');
            closeButton.addEventListener('click', async function (event) {
                event.preventDefault();
                getBackInfoUmum();
                document.getElementById('miniOverlay').style.display = 'none', document.getElementById('container').classList.remove('blur');
            });
            let dataSekolah = null;
            document.getElementById('rows').addEventListener('click', async function (event) {
                if (event.target && event.target.classList.contains('detailButtonSekolah')) {
                    event.preventDefault();
                    document.getElementById('configOverlay').style.display = 'none';
                    document.getElementById('configOverlay2').style.display = 'flex';
                    getInfoUmumSekolah();
                    const row = event.target.closest('tr');
                    const schoolName = row.children[1].textContent.trim();
                    try {
                        const response = await fetch(
                            `/api/school-data?name=${encodeURIComponent(schoolName)}`
                        );
                        dataSekolah = await response.json();
                        document.getElementById('schoolName').innerText = schoolName;
                        document.getElementById('address').innerText = dataSekolah.infoSekolah.address;
                        document.getElementById('total_porsi_sekolah').innerText = dataSekolah.infoSekolah.total_porsi;
                        document.getElementById('total_siswa_sekolah').innerText = dataSekolah.infoSekolah.total_siswa;
                        document.getElementById('persenSekolah').innerText = dataSekolah.infoSekolah.persen + "%";
                    }
                    catch (err) {
                        console.error('Error fetching school data:', err);
                    }
                }
            });
            const tombolInfoUmumSekolah = document.getElementById('tombolInfoUmumSekolah');
            tombolInfoUmumSekolah.addEventListener('click', function (event) {
                getInfoUmumSekolah();
            });
            const tombolDokumSekolah = document.getElementById('tombolDokumSekolah');
            tombolDokumSekolah.addEventListener('click', function (event) {
                getDokumSekolah();
            });
            function getInfoUmumSekolah() {
                document.getElementById('tombolInfoUmumSekolah').classList.remove('black');
                document.getElementById('tombolInfoUmumSekolah').classList.add('red');
                document.getElementById('tombolDokumSekolah').classList.add('black');
                document.getElementById('tombolDokumSekolah').classList.remove('red');
                document.getElementById('overlay4').style.display = 'none';
                document.getElementById('overlay3').style.display = 'flex';
            }
            function getDokumSekolah() {
                document.getElementById('tombolInfoUmumSekolah').classList.remove('red');
                document.getElementById('tombolInfoUmumSekolah').classList.add('black');
                document.getElementById('tombolDokumSekolah').classList.add('red');
                document.getElementById('tombolDokumSekolah').classList.remove('black');
                document.getElementById('overlay4').style.display = 'flex';
                document.getElementById('overlay3').style.display = 'none';
                document.getElementById('dokumSekolah').src = 'data:image/jpeg;base64,' + dataSekolah.infoSekolah.dokum;
            }
            const inputNamaSekolah = document.getElementById('inputNamaSekolah');
            inputNamaSekolah.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    const namaSekolah = this.value.toLowerCase();
                    const baris = document.querySelectorAll('#rows tr');
                    baris.forEach(b => {
                        const dataNamaSekolah = b.cells[1].textContent.toLowerCase();
                        if (dataNamaSekolah.includes(namaSekolah)) {
                            b.style.display = '';
                        } else {
                            b.style.display = 'none';
                        }
                    });
                }
            });
            window.addEventListener('resize', () => map.invalidateSize());
            setTimeout(() => map.invalidateSize(), 200);
        });
    </script>
</body>

</html>