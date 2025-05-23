<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link rel="stylesheet" href="{{asset('css/navbar.css') }}">
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
            height: 100%;
            overflow-x: hidden;
        }

        #container {
            width: 100%;
            height: 1600px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            min-height: 100vh;
        }

        .kontakTitle {
            width: 100%;
            height: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            background-color: red;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .kelasSaran {
            width: 100%;
            height: 900px;
            display: flex;
            justify-content: center;
        }

        .boxSaran {
            margin: 15px;
            padding: 70px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            border-radius: 40px;
            height: 55em;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 20px;
        }

        .boxKiri {
            padding: 70px;
            margin-left: ;
            width: 100%;
            height: 45em;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            border-radius: 40px;
        }

        .fillform {
            display: flex;
            flex-direction: column;
        }

        #input {
            font-size: 20px;
            border-radius: 10px;
            padding: 5px;
        }

        .daerah select {
            height: 35px;
            font-size: 20px;
        }

        .hotline {
            margin-top: 30px;
            height: 90px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            padding-left: 20px;
        }

        button {
            width: 100%;
            height: 35px;
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

        button:hover {
            background-color: black;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        #errorPopUp {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
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
        }

        #errorButton {
            width: 100px;
        }
    </style>
</head>

<body>
    <div id="container">
        @include('partials.navbar')
        <div class="kontakTitle">
            <h1 style="font-size: 60px;">Suara kamu siap kami dengar</h1>
            <p style="font-size: 20px;">Aspirasi, laporan, maupun keluh kesah kamu sangat berarti<br>untuk Indonesia
                yang lebih <strong>akuntabel</strong></p>
        </div>
        <div class="kelasSaran">
            <div class="boxSaran" style="width: 53%;">
                <h1 style="font-size: 3em;align-self:center">Apa yang bisa Kami Bantu?</h1>
                <div class="boxKiri">
                    <h1>Kirim Laporan</h1>
                    <p style="font-size: 20px;opacity: 60%;">Laporan akan direspon melalui email maks 2x24 jam</p>
                    <form action="{{ route('uploadLaporan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="fillform">
                            <label style="margin-top: 30px;margin-bottom:5px">Jenis Laporan</label>
                            <select id="input" style="height: 43px;" name="jenisLaporan">
                                <option value="" disabled selected>Pilih jenis laporan…</option>
                                <option value="aspirasi">Aspirasi</option>
                                <option value="keluhan">Keluhan</option>
                                <option value="laporan">Laporan</option>
                            </select>
                            <label style="margin-top: 20px;margin-bottom:5px">Email</label>
                            <input id="input" style="height: 35px;" type="email" placeholder="Email" name="email">
                            <label style="margin-top: 20px;margin-bottom:5px">Deskripsi Masalah</label>
                            <textarea id="input" style="height: 90px;" name="deskripsi"
                                placeholder="Ketik deskripsi masalah disini" rows="5"></textarea>
                            <button style="margin-top:1em" id="submit" type="submit">Kirim Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="boxSaran" style="width: 43%;">
                <h1 style="font-size: 40px;">Punya Masalah Darurat?</h1>
                <form>
                    <div class="fillform">
                        <label style="margin-top: 30px;margin-bottom:5px">Pencarian</label>
                        <input type="search" id="input" style="height: 43px;" name="pencarian" placeholder="Cari...">
                        <label style="margin-top: 20px;margin-bottom:5px">Filter Berdasarkan Lokasi</label>
                        <div class="daerah">
                            <select id="province">
                                <option disabled selected>Memuat provinsi…</option>
                            </select>
                            <select id="city" disabled>
                                <option disabled selected>—</option>
                            </select>
                        </div>
                        <div class="hotline">
                            <h1>Hubungi Tim Pusat</h1>
                        </div>
                        <div class="hotline">
                            <h1>Hotline Badan Gizi Nasional</h1>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
    @if ($errors->any() || session('success'))
        <div id="errorPopUp">
            <div id="popupContent">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @if(session('success'))
                    <p>{{ session('success') }}</p>
                @endif
                <button id="errorButton" onclick="closePopup()">Close</button>
            </div>
        </div>

        <script>
            var myModal = document.getElementById('errorPopUp');
            myModal.style.display = 'flex';
            function closePopup() {
                myModal.style.display = 'none';
            }
        </script>
    @endif
    <script>
        const URL_PROVINCES = 'https://raw.githubusercontent.com/Caknoooo/provinces-cities-indonesia/main/json/provinces.json';
        const URL_REGENCIES = 'https://raw.githubusercontent.com/Caknoooo/provinces-cities-indonesia/main/json/regencies.json';

        async function loadDaerah() {
            const [provinces, regencies] = await Promise.all([
                fetch(URL_PROVINCES).then(r => r.json()),
                fetch(URL_REGENCIES).then(r => r.json())
            ]);
            const citiesByProv = {};
            provinces.forEach(p => citiesByProv[p.id] = []);
            regencies.forEach(r => {
                if (citiesByProv[r.province_id]) {
                    citiesByProv[r.province_id].push(r.regency);
                }
            });
            const provinceSelect = document.getElementById('province');
            provinceSelect.innerHTML = '<option disabled selected>-- Pilih Provinsi --</option>';
            provinces.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p.id;
                opt.textContent = p.province;
                provinceSelect.appendChild(opt);
            });
            provinceSelect.addEventListener('change', () => {
                const citySelect = document.getElementById('city');
                const provId = +provinceSelect.value;
                citySelect.innerHTML = '<option disabled selected>-- Pilih Kota/Kabupaten --</option>';
                citiesByProv[provId].forEach(name => {
                    const o = document.createElement('option');
                    o.value = name.toLowerCase().replace(/\s+/g, '-');
                    o.textContent = name;
                    citySelect.appendChild(o);
                });
                citySelect.disabled = false;
            });
        }
        document.addEventListener('DOMContentLoaded', loadDaerah);  
    </script>
</body>

</html>