<div class="header">
    <h1>NusaFood</h1>
    <h1>Profile</h1>
</div>
<div class="navbar">
    <img style="margin-top: 50px;margin-bottom:50px" id="icon0" src="{{ asset('Image/lines.png') }}">
    <button class="nav-item" type="button" onclick="window.location.href='{{ route('loggedIn') }}'">
        <img id="icon1" src="{{ asset('Image/house.png') }}">
        <label id="iconTitle1">Beranda</label>
    </button>
    <button class="nav-item" type="button" onclick="window.location.href='{{ route('historyDashboard') }}'">
        <img id="icon2" src="{{ asset('Image/history.png') }}">
        <label id="iconTitle2">Riwayat</label>
    </button>
    <button class="nav-item" type="button" onclick="window.location.href='{{ route('uploadDashboard') }}'">
        <img id="icon3" src="{{ asset('Image/upload.png') }}">
        <label id="iconTitle3">Upload</label>
    </button>
    <button onclick="window.location.href='{{ route('login') }}'" class=" logout-button">
        <div class="logout-icon">
            <div class="door"></div>
            <div class="arrow"></div>
        </div>
    </button>
</div>