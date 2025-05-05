@extends('historyDashboard')

@section('content')
    <div class="page">
        <div style="width:100%;display:flex;flex-direction:row;justify-content:space-between">
            <h1>Daftar Laporan > <span class="red">Detail Info</span></h1>
            <button class="backButton" onclick="window.location.href='{{ route('historyDashboard') }}'">BACK</button>
        </div>
        <div style="display:flex;flex-direction:row;" class="information">
            <div class="infoUmum">
                <h1>Informasi Umum</h1>
                <h4>ID Penerimaan Makanan: {{ $food->id_makanan }} </h4>
                <hr style="border: 1px solid rgba(0, 0, 0, 0.2; width: 100%;">
                <div class="groupOfInfo">
                    <div class="bagianAtas">
                        <div id="bagianInfo" class="infoKiri">
                            <div style="margin:20px 0">
                                <h2>Nama Pengirim</h2>
                                <h2 style="font-weight:100">{{ $food->nama_pengirim }}</h2>
                            </div>
                            <div style="margin:20px 0">
                                <h2>No. Telepon</h2>
                                <h2 style="font-weight:100">{{ $food->phone_number }}</h2>
                            </div>
                            <div style="margin:20px 0">
                                <h2>Jumlah Makanan Kualitas Bagus</h2>
                                <h2 style="font-weight:100">{{ $food->kualitas_bagus }}</h2>
                            </div>
                        </div>
                        <div id="bagianInfo" class="infoKanan">
                            <div style="margin:20px 0">
                                <h2>Waktu</h2>
                                <h2 style="font-weight:100">{{ $food->waktu }}</h2>
                            </div>
                            <div style="margin:20px 0">
                                <h2>Tanggal</h2>
                                <h2 style="font-weight:100">{{ $food->tanggal }}</h2>
                            </div>
                            <div style="margin:20px 0">
                                <h2>Jumlah Makanan Kualitas Buruk</h2>
                                <h2 style="font-weight:100">{{ $food->kualitas_buruk }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <div style="margin:20px 0">
                            <h2>Catatan</h2>
                            <h2 style="font-weight:100">{{ $food->catatan}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="groupOfBox">
                <div style="width:100%;display: flex;flex-direction:row;gap:30px;height:40%">
                    <div style="width:50%;display: flex;flex-direction:column;gap:30px">
                        <div class="box"
                            style="display:flex;flex-direction:row;justify-content:center;align-items:center;gap:20px">
                            <img src="{{ asset('Image/graduation.png') }}" alt="">
                            <div style="display:flex;flex-direction:column">
                                <h2>Jumlah Siswa</h2>
                                <h3 style="font-weight: 100;">{{ $food->jumlah_siswa }}</h3>
                            </div>
                        </div>
                        <div class="box"
                            style="display:flex;flex-direction:row;justify-content:center;align-items:center;gap:20px">
                            <img src="{{ asset('Image/cooking.png') }}" alt="">
                            <div style="display:flex;flex-direction:column">
                                <h2>Jumlah Porsi</h2>
                                <h3 style="font-weight: 100;">{{ $food->jumlah_siswa }}</h3>
                            </div>
                        </div>
                    </div>
                    <div style="width: 50%;">
                        <div style="height:250px;display:flex;flex-direction:column;justify-content:center;align-items:center;gap:20px"
                            class="box">
                            <img src="{{ asset('Image/hand-shake.png') }}" alt="">
                            <h1 style="font-size:70px">{{ $percentAccept }}%</h1>
                            <h3>Persentase Penerimaan</h3>
                        </div>
                    </div>
                </div>
                <div class="bukti">
                    <div class="infoBukti">
                        <h2>Dokumentasi</h2>

                    </div> <img src="{{ $food->dokumentasi
        ? 'data:image/jpeg;base64,' . base64_encode($food->dokumentasi)
        : asset('Image/profile-user-grey.png') }}" style="width: 50%;">
                </div>
            </div>
        </div>
    </div>
@endsection