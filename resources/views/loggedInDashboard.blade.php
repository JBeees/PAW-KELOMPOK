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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            width: 90%;
=======
            width: 91%;
>>>>>>> additionalBranch
=======
            width: 91%;
>>>>>>> additionalBranch
=======
            width: 91%;
>>>>>>> additionalBranch
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-size: 40px;
            line-height: 1.6;
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
                    <p><strong>Nomor HP:</strong> {{ $sekolah->phone_number}}</p>
                    <p><strong>Alamat:</strong> {{ $sekolah->address }}</p>
                    <p><strong>Provinsi:</strong> {{ $sekolah->province }}</p>
                    <p><strong>Kota:</strong> {{ $sekolah->city }}</p>
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