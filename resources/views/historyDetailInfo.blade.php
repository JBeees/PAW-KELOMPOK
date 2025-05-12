@extends('historyDashboard')

@section('content')
    <div class="page">
        <div style="width:100%;display:flex;flex-direction:row;justify-content:space-between">
            <h1>Daftar Laporan > <span class="red">Detail Info</span></h1>
            <button class="button" onclick="window.location.href='{{ route('historyDashboard') }}'">BACK</button>
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
                <div class="infoAtas">
                    <div class="infoItem">
                        <div class="infoSP">
                            <img src="{{ asset('Image/graduation.png') }}" style="width:15%" alt="">
                            <div style="display:flex;flex-direction:column">
                                <h2>Jumlah Siswa</h2>
                                <h2>{{ $food->jumlah_siswa }}</h2>
                            </div>
                        </div>
                        <div class="infoSP">
                            <img src="{{ asset('Image/cooking2.png') }}" style="width:15%" alt="">
                            <div style="display:flex;flex-direction:column">
                                <h2>Jumlah Porsi</h2>
                                <h2>{{ $food->jumlah_porsi }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="infoItem">
                        <div class="persen">
                            <canvas id="progressChart" width="180" height="180"></canvas>
                            <h3>Persentase Penerimaan</h3>
                            <h1 id="tempPercent">{{ $percentAccept }}</h1>
                        </div>
                    </div>
                </div>
                <div class="bukti">
                    <h2 style="align-self: flex-start;">Dokumentasi</h2>
                    <img src="{{ $food->dokumentasi
        ? 'data:image/jpeg;base64,' . base64_encode($food->dokumentasi)
        : asset('Image/profile-user-grey.png') }}" style="width: 40%;">
                </div>
            </div>
        </div>
        <div style="align-self:flex-start;">
            <button style="width:150px;height:40px" class="button" onclick="showPopUp()">Hapus Data</button>
            <button style="width:150px;height:40px" class="button">Edit Data</button>
        </div>
    </div>
    <div id="deletePopUp">
        <div id="popupContent">
            <p style="font-size: 20px;">Data akan terhapus!!</p>
            <div style="display: flex;flex-direction:row;justify-content:center;gap:10px;">
                <form action="{{ route('delete-data', $food->id_makanan) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button">Delete</button>
                </form>
                <button id="askButton" class="button" onclick="closePopUp()">Tidak</button>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            Chart.defaults.font.family = "'Jost', sans-serif";
            const num = document.getElementById('tempPercent').textContent.trim();
            document.getElementById('tempPercent').innerText = '';
            const percentage = Number(num);
            const centerTextPlugin = {
                id: 'centerText',
                beforeDraw(chart) {
                    const { ctx, width, height } = chart;
                    ctx.save();
                    const fontSize = (height / 4).toFixed(2);
                    ctx.font = `${fontSize}px 'Jost', sans-serif`;
                    ctx.fillStyle = '#333';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText(`${percentage}%`, width / 2, height / 2);
                    ctx.restore();
                }
            };
            const ctx = document.getElementById('progressChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [percentage, 100 - percentage],
                        backgroundColor: ['red', '#e0e0e0'],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '70%',
                    responsive: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                },
                plugins: [centerTextPlugin]
            });

        });
    </script>
@endpush