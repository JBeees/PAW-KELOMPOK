@extends('historyDashboard')
@section('content')
    <div class="page">
        <h1 style="width:100%;align-self:flex-start">Daftar Laporan</h1>
        <div class="searchBar">
            <div class="bar">
                <label>Pencarian</label>
                <input id="inputNamaPengirim" style="width:300px;height:40px;font-size:20px;border-radius:10px;"
                    type="search" placeholder="Masukkan Nama Pengirim">
            </div>
            <div class="bar">
                <label>Tanggal</label>
                <input id="tanggal" style="width: 200px;height:40px;font-size:20px;border-radius:10px;x" type="date"
                    placeholder="Provinsi">
            </div>
        </div>
        <div class="info">
            <div class="box">
                <img src="{{ asset('Image/cooking2.png') }}" style="width: 10%;" alt="">
                <div>
                    <h2>Total porsi diterima</h2>
                    <h1 id="porsi">x</h1>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('Image/hand-shake2.png') }}" style="width: 10%;" alt="">
                <div style="display:flex;flex-direction:column;">
                    <h2>Persentase Penerimaan</h2>
                    <h1 id="persen">x</h1>
                </div>
            </div>
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
                <tbody id="rows">
                    @foreach ($food as $f)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $f->nama_pengirim }}</td>
                            <td>{{ $f->waktu }}</td>
                            <td>{{ $f->tanggal }}</td>
                            <td>{{ $f->jumlah_porsi }}</td>
                            <td><button onclick="window.location.href='{{ route('detail-info', $f->id_makanan) }}'"
                                    class="button">Detail</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const assetBaseUrl = "{{ asset('') }}";
        window.addEventListener('DOMContentLoaded', async function () {
            document.getElementById('icon2').src = assetBaseUrl + 'Image/history-active.png'
            document.getElementById('iconTitle2').classList.add('active');
            const response = await fetch(`api/history-data`);
            const data = await response.json();
            console.log(data);
            document.getElementById('porsi').innerText = data.total_porsi + " porsi";
            document.getElementById('persen').innerText = data.persen + "%";
 
        });
        const inputNamaPengirim = document.getElementById('inputNamaPengirim');
        inputNamaPengirim.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                const namaPengirim = this.value.toLowerCase();
                const baris = document.querySelectorAll('#rows tr');
                baris.forEach(b => {
                    const dataNamaPengirim = b.cells[1].textContent.toLowerCase();
                    if (dataNamaPengirim.includes(namaPengirim)) {
                        b.style.display = '';
                    }
                    else {
                        b.style.display = 'none';
                    }
                });
            }
        });
        const tanggal = document.getElementById('tanggal');
        tanggal.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                const date = this.value.trim();
                const baris = document.querySelectorAll('#rows tr');
                baris.forEach(b => {
                    const targetTanggal = b.cells[3].textContent;
                    if (!date || targetTanggal === date) {
                        b.style.display = '';
                    } else {
                        b.style.display = 'none';
                    }
                });
            }
        });

    </script>
@endpush