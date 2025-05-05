@extends('historyDashboard')
@section('content')
    <div class="page">
        <h1 style="width:100%;align-self:flex-start">Daftar Laporan</h1>
        <div class="searchBar">
            <div class="bar">
                <label>Pencarian</label>
                <input style="width:300px;height:40px;font-size:20px;border-radius:10px;" type="search"
                    placeholder="Masukkan Kata Kunci">
            </div>
            <div class="bar">
                <label>Tanggal</label>
                <input style="width: 200px;height:40px;font-size:20px;border-radius:10px;x" type="date"
                    placeholder="Provinsi">
            </div>
        </div>
        <div class="info">
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengirim</th>
                        <th>Waktu</th>
                        <th>Tanggal</th>
                        <th>Jumlah Porsi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($food as $f)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $f->nama_pengirim }}</td>
                            <td>{{ $f->waktu }}</td>
                            <td>{{ $f->tanggal }}</td>
                            <td>{{ $f->jumlah_porsi }}</td>
                            <td><button onclick="window.location.href='{{ route('detail-info',$f->id_makanan) }}'" class="detailButton">Detail</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection