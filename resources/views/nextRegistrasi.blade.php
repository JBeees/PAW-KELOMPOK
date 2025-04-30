<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
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
            font-size: 20px;
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
            width: 290px;
            height: 40px;
            border-radius: 20px;
            margin-top: 40px;
            background-color: red;
            color: white;
            font-size: 20px;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="login">
            <a href="{{ route('dashboard') }}" class="nusa">NusaFood</a>
            <h2 class="regis">Register</h2>
            <form class="form">
                <div class="loginForm">
                    <label>Nama Sekolah</label>
                    <input style="width:600px;height:40px;font-size:20px" type="type" placeholder="Nama Sekolah">
                </div>
                <div class="loginForm">
                    <div style="display:flex;flex-direction:row;gap:10px">
                        <div class="loginForm">
                            <label>No. Telepon</label>
                            <input style="width:220px;height:40px;font-size:20px" type="tel" placeholder="123-456-789">
                        </div>
                        <div class="loginForm">
                            <label>Alamat</label>
                            <input style="width:370px;height:40px;font-size:20px" type="tel" placeholder="Jl Ciamis">
                        </div>
                    </div>
                </div>
                <div class="loginForm">
                    <div class="daerah" style="display:flex;flex-direction:row; gap:10px">
                        <div style="display:flex;flex-direction:column;">
                            <label>Banyak Siswa</label>
                            <input style="width:120px;height:40px;font-size:20px;text-align:center;" type="number"
                                placeholder="100">
                        </div>
                        <div style="display:flex;flex-direction:column;">
                            <label>Provinsi</label>
                            <select
                                style="width:230px;height:40px;font-size:20px;border-radius: 20px;padding-left: 12px;background:none"
                                id="province">
                                <option disabled selected>Memuat provinsi…</option>
                            </select>
                        </div>
                        <div style="display:flex;flex-direction:column;">
                            <label>Kabupaten/Kota</label>
                            <select
                                style="width:230px;height:40px;font-size:20px;border-radius: 20px;padding-left: 12px;background:none"
                                id="city" disabled>
                                <option disabled selected>—</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" onclick="window.location.href='{{ route('registrasi') }}'">Kembali</button>
                    <button type="button" onclick="window.location.href='{{ route('login') }}'"
                        class="masuk">Submit</button>
                </div>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('Image/redbox.png') }}">
            <img class="map" src="{{ asset('Image/indo_bg.png') }}">
        </div>
    </div>
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

        loadDaerah().catch(err => console.error(err));
    </script>
</body>

</html>