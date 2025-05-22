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
            height: auto;
            border-top-left-radius: 50px;
            background-color: white;
            align-self: flex-end;
            padding: 80px;
        }

        .uploadData {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
        }

        .fillBar {
            width: 100%;
            min-height: 200px;
            margin-top: 20px
        }

        .partisiForm {
            display: flex;
            flex-direction: column;
        }

        .gradient {
            background: #fad2d2;
            background: linear-gradient(0deg, rgba(250, 210, 210, 1) 0%, rgba(255, 255, 255, 1) 100%, rgba(255, 255, 255, 1) 34%);
        }

        .red {
            color: red;
        }

        .partisiForm {
            font-size: 20px;
            padding: 10px;
            gap: 10px;
        }

        input[type="time"],
        input[type="date"] {
            max-width: 200px;
        }

        input {
            height: 50px;
            font-size: 20px;
            padding: 10px;
            border-radius: 10px;
        }

        .upload {
            width: 400px;
            height: 200px;
            border: 0.5px dashed black;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .uploadLabel {
            width: 400px;
            height: 200px;
            cursor: pointer;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #submit, #successButton {
            width: 200px;
            height: 50px;
            margin-top: 30px;
            background: none;
            background-color: red;
            color: white;
            border: none;
            font-size: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            transition:
                background-color 0.3s ease,
                transform 0.2s ease,
                box-shadow 0.3s ease;
        }

        #submit:hover, #successButton:hover {
            background-color: black;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        #successPopUp {
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

        #successButton {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        @include('partials.loggedInNavbar')
        <div class="page">
            <div class="uploadData">
                <form action="{{ route('tambah-makanan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1>Tambah Data Penerimaan Makanan</h1>
                    <hr
                        style="height: 2px; background-color: black; border: none; width: 100%;opacity: 20%;margin-top:10px;margin-bottom:20px">
                    <div class="fillBar">
                        <div class="gradient">
                            <h2>Isi Data Pengirim Makanan</h2>
                            <p style="font-size:20px;opacity:60%">Silakan lengkapi data nama dan nomor telepon dari
                                pengirim
                                makanan.</p>
                            <hr
                                style="height: 2px; background-color: black; border: none; width: 100%;opacity: 20%;margin-top:10px;margin-bottom:20px">
                        </div>
                        <div class="partisiForm">
                            <label>Nama<span class="red">*</span></label>
                            <input name="nama" type="text" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="partisiForm">
                            <label>Nomor Telepon<span class="red">*</span></label>
                            <input name="phone" type="tel" placeholder="Masukkan Nomor Telepon">
                        </div>
                    </div>
                    <div class="fillBar">
                        <div class="gradient">
                            <h2>Isi Waktu dan Tanggal Pengiriman Makanan</h2>
                            <p style="font-size:20px;opacity:60%">Silakan lengkapi data waktu dan tanggal pengiriman
                                makanan.</p>
                            <hr
                                style="height: 2px; background-color: black; border: none; width: 100%;opacity: 20%;margin-top:10px;margin-bottom:20px">
                        </div>
                        <div class="partisiForm" style="flex-direction: row; gap: 20px;">
                            <div style="display: flex;flex-direction:column">
                                <label>Waktu<span class="red">*</span></label>
                                <input name="time" type="time">
                            </div>
                            <div style="display: flex;flex-direction:column">
                                <label>Tanggal<span class="red">*</span></label>
                                <input name="date" type="date">
                            </div>
                        </div>
                    </div>
                    <div class="fillBar">
                        <div class="gradient">
                            <h2>Detail Makanan yang Diterima</h2>
                            <p style="font-size:20px;opacity:60%">Silakan lengkapi data makanan yang diterima.</p>
                            <hr
                                style="height: 2px; background-color: black; border: none; width: 100%;opacity: 20%;margin-top:10px;margin-bottom:20px">
                        </div>
                        <div class="partisiForm" style="flex-direction: row; gap: 20px;">
                            <div style="display: flex;flex-direction:column">
                                <label>Porsi yang diterima<span class="red">*</span></label>
                                <input name="porsi" type="number">
                            </div>
                            <div style="display: flex;flex-direction:column">
                                <label>Jumlah siswa yang menerima<span class="red">*</span></label>
                                <input name="siswa" type="number">
                            </div>
                            <div style="display: flex;flex-direction:column">
                                <label>Jumlah kualitas makanan bagus<span class="red">*</span></label>
                                <input name="bagus" type="number">
                            </div>
                            <div style="display: flex;flex-direction:column">
                                <label>Jumlah kualitas makanan buruk<span class="red">*</span></label>
                                <input name="buruk" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="fillBar">
                        <div class="gradient">
                            <h2>Unggah Foto Dokumentasi</h2>
                            <p style="font-size:20px;opacity:60%">
                                Upload foto bukti dokumentasi program makanan bergizi.
                            </p>
                            <hr
                                style="height: 2px; background-color: black; border: none; width: 100%; opacity: 20%; margin-top:10px; margin-bottom:20px">
                        </div>

                        <div class="partisiForm" style="flex-direction: column; gap: 20px;">
                            <label>Bukti<span class="red">*</span></label>
                            <div class="upload">
                                <label for="dokum" class="uploadLabel" id="uploadLabel"
                                    style="cursor: pointer; padding: 10px; border-radius: 5px;">
                                    📁 Upload foto disini
                                </label>

                                <input name="dokum" type="file" id="dokum" accept="image/*" hidden>
                                <label for="dokum" id="previewWrapper" style="display: none; cursor: pointer;">
                                    <img id="dokumPreview"
                                        style="max-width: 100px; border: 1px solid #ccc; border-radius: 5px;"
                                        alt="Preview foto dokumentasi">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="fillBar">
                        <div class="gradient">
                            <h2>Catatan</h2>
                            <p style="font-size:20px;opacity:60%">Tambah catatan tentang program ini.</p>
                            <hr
                                style="height: 2px; background-color: black; border: none; width: 100%;opacity: 20%;margin-top:10px;margin-bottom:20px">
                        </div>
                        <div class="partisiForm" style="flex-direction: column; gap: 20px;">
                            <label>Catatan</label>
                            <textarea name="catatan" rows="4"
                                style="width:800px;height:100px;border-radius:10px;padding;20px;font-size:20px"
                                placeholder="Tuliskan catatan disini"></textarea>
                        </div>
                    </div>
                    <button id="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const assetBaseUrl = "{{ asset('') }}";
        window.onload = () => {
            document.getElementById('icon3').src = assetBaseUrl + 'Image/upload-active.png'
            document.getElementById('iconTitle3').classList.add('active');
        }
        const dokumInput = document.getElementById('dokum');
        const uploadLabel = document.getElementById('uploadLabel');
        const previewWrapper = document.getElementById('previewWrapper');
        const previewImg = document.getElementById('dokumPreview');

        dokumInput.addEventListener('click', function () {
            this.value = null;
        });

        dokumInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) {
                previewImg.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewWrapper.style.display = 'inline-block';
                uploadLabel.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    </script>
    @if (session('success'))
        <div id="successPopUp">
            <div id="popupContent">
                <p>{{ session('success') }}</p>
                <button id="successButton" onclick="closePopup()">Close</button>
            </div>
        </div>

        <script>
            var myModal = document.getElementById('successPopUp');
            myModal.style.display = 'flex';
            function closePopup() {
                myModal.style.display = 'none';
            }
        </script>
    @endif
</body>

</html>