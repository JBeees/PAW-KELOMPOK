<div class="header">
    <h1>NusaFood</h1>
    <div style="display: flex; align-items: center; gap: 10px;">
        <div style="display:flex;align-items:flex-end;flex-direction:column;">
            <h1 class="profileInfo">{{ $sekolah->name }}</h1>
            <h5>PJ Sekolah</h5>
        </div>
        <img class="profilImg" src="{{ $sekolah->profile_image
    ? 'data:image/jpeg;base64,' . base64_encode($sekolah->profile_image)
    : asset('Image/profile-user.png') }}" class="rounded-circle" style="width:60px; height:60px; object-fit:cover;">
    </div>
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
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class=" logout-button">
            <div class="logout-icon">
                <div class="door"></div>
                <div class="arrow"></div>
            </div>
        </button>
    </form>
</div>