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
            justify-content: center;
            align-items: center;
            padding: 80px;
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            text-align: center;
        }

        .detailSchool {
            background-color: #fff;
            width: 50%;
            height: 90%;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-size: 40px;
            margin-left: 0;
            gap: 20px;
        }

        .image-upload-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .profile-img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: 0.3s;
        }

        .image-upload-wrapper:hover .hover-overlay {
            opacity: 1;
        }

        .infoTable {
            display: flex;
            flex-direction: row;
            gap: 20px;
            margin: 20px;
        }

        #edit,
        #submit {
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

        #edit:hover,
        #submit:hover {
            background-color: black;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        .inputEdit {
            border-radius: 10px;
            font-size: 20px;
            padding: 10px
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
            <h1 style="font-size: 50px;">Informasi Sekolah</h1>
            <div class="info">
                <div class="schoolProfile">
                    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="profileImageInput" class="image-upload-wrapper">
                            <img src="{{ $sekolah->profile_image
    ? 'data:image/jpeg;base64,' . base64_encode($sekolah->profile_image)
    : asset('Image/profile-user-grey.png') }}" class="profile-img">
                            <div class="hover-overlay">Ganti Foto Profil</div>
                        </label>
                        <input id="profileImageInput" type="file" name="profile_image" accept="image/*"
                            style="display: none;" onchange="this.form.submit()">
                    </form>
                    <h1>{{ $sekolah->name }}</h1>
                </div>
                <div class="detailSchool">
                    <form action="{{ route('updateData') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="infoTable">
                            <strong>Nomor HP:</strong>
                            <p id="phoneData">{{ $sekolah->phone_number }}</p>
                            <input name="phone" id="phoneEdit" class="inputEdit" type="text"
                                placeholder="Update Nomor HP" style="display:none">
                        </div>
                        <div class="infoTable">
                            <strong>Alamat:</strong>
                            <p id="addressData">{{ $sekolah->address }}</p>
                            <input name="address" id="addressEdit" class="inputEdit" type="text"
                                placeholder="Update Alamat" style="display:none">
                        </div>
                        <div class="infoTable">
                            <strong>Provinsi:</strong>
                            <p id="provinceData">{{ $sekolah->province }}</p>
                            <input name="province" id="provinceEdit" class="inputEdit" type="text"
                                placeholder="Update Provinsi" style="display:none">
                        </div>
                        <div class="infoTable">
                            <strong>Kota:</strong>
                            <p id="cityData">{{ $sekolah->city }}</p>
                            <input name="city" id="cityEdit" class="inputEdit" type="text" placeholder="Update Kota"
                                style="display:none">
                        </div>
                        <button type="button" id="edit" onclick="updateData()">EDIT</button>
                        <button type="submit" id="submit" onclick="updateData()" style="display:none;">Submit</button>
                    </form>
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
        let flipEdit = false;
        function updateData() {
            flipEdit = !flipEdit;
            const data = ['phone', 'address', 'province', 'city'];
            data.forEach(d => {
                document.getElementById(d + "Data").style.display = flipEdit ? 'none' : 'block';
                document.getElementById(d + "Edit").style.display = flipEdit ? 'block' : 'none';
            });
            document.getElementById("submit").style.display = flipEdit ? 'block' : 'none';
            document.getElementById("edit").style.display = flipEdit ? 'none' : 'block';
        }
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