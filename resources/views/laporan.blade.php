<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan </title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/navbar.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Jost', sans-serif;
        }

        body,
        html {
            height: 100%;
            overflow-x: hidden;
        }

        #container {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            min-height: 100vh;
        }

        .containerTitle {
            width: 100%;
            height: 400px;
            background-color: red;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .laporan {
            width: 80%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .textLaporan {
            margin: 40px;
        }

        .informationData {
            width: 100%;
            height: 50vh;
            margin: 20px;
            display: flex;
            gap: 30px;
            padding: 30px;
        }

        .leftInformation {
            width: 60%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }

        .rightInformation {
            width: 40%;
            height: 100%;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            gap: 20px;
        }

        .info {
            display: flex;
            align-items: center;
            gap: 40px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 20px;
        }

        .barInformation {
            width: 100%;
            height: 100vh;
            padding: 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #barChart {
            width: 100%;
            height: 50vh;
        }

        #tahun {
            width: 10%;
            font-size: 20px;
        }

        .rollerContainer {
            margin: 5%;
            width: 80%;
            border-radius: 10px;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.2);
            background-image: url('Image/indo.png');
            background-size: 120%;
            background-position: center;
        }

        #roller-content {
            width: 100%;
        }

        .roller-data {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1em;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div id="container">
        @include('partials.navbar')
        <div class="containerTitle">
            <h1 style="font-size:60px; color:white; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); ">Lihat Laporan Kinerja
                Program</h1>
        </div>
        <div class="laporan">
            <div class="textLaporan">
                <h1 style="font-size:40px;">Laporan Umum</h1>
            </div>
            <div class="informationData">
                <div class="leftInformation">
                    <h1>JUMLAH PENERIMA</h1>
                    <div class="info laporanSiswa">
                        <img src="{{ asset('Image/people.png') }}" style="width: 7%;" alt="">
                        <div style="display: flex;flex-direction:column ">
                            <h1>Total Penerimaan Terverifikasi</h1>
                            <h1 id="jumlahSiswa">siswa</h1>
                        </div>
                    </div>
                    <div class="info laporanSekolah">
                        <img src="{{ asset('Image/graduation.png') }}" style="width: 7%;" alt="">
                        <div style="display: flex;flex-direction:column ">
                            <h1>Total Sekolah Penerima</h1>
                            <h1 id="jumlahSekolah">sekolah</h1>
                        </div>
                    </div>
                </div>
                <div class="rightInformation">
                    <canvas id="progressChart" width="240" height="240">TES</canvas>
                    <h2 style="text-align:center;" id="persenAll"></h2>
                </div>
            </div>
            <div class="barInformation">
                <select id="tahun">
                    <option value="2024">2024</option>
                    <option value="2025" selected>2025</option>
                    <option value="2026">2026</option>
                </select>
                <canvas id="barChart"></canvas>
            </div>
            <h1>Laporan Publik</h1>
            <div class="rollerContainer">
                <div id="roller" style="overflow: hidden; height: 20em;">
                    <div id="roller-content">
                        @foreach($data as $d)
                            <div class="roller-data">
                                <div style="width:60%;">
                                    <p style="font-size:22px">Tipe: {{ $d->tipe_laporan }}</p>
                                    <p style="font-size:20px;">Pesan: {{ $d->deskripsi }}</p>
                                </div>
                                <div style="width:40%;display:flex;justify-content:flex-end">
                                    <p style="font-size:20px;">{{ anonymizeEmail($d->email) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        function anonymizeEmail($email)
        {
            $parts = explode('@', $email);
            $name = substr($parts[0], 0, 2) . str_repeat('*', max(0, strlen($parts[0]) - 2));
            return $name . '@' . $parts[1];
        }
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.addEventListener('load', async function () {
            const response = await fetch(`api/all-data`);
            const allData = await response.json();
            const percentage = allData.totals.persen;
            document.getElementById('jumlahSiswa').innerText = allData.totals.siswa + " siswa";
            document.getElementById('jumlahSekolah').innerText = allData.totals.sekolah + " sekolah";
            document.getElementById('persenAll').innerText = percentage + "% dari seluruh pengiriman makanan terverifikasi";
            console.log(allData);
            Chart.defaults.font.family = "'Jost', sans-serif";
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

            const bar = document.getElementById('barChart').getContext('2d');
            const lab = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const tahunIni = 2025;
            const barRule = {
                type: 'bar',
                data: {
                    labels: lab,
                    datasets: [
                        {
                            label: 'Siswa',
                            data: allData.data[tahunIni].siswa,
                            backgroundColor: 'rgb(255, 0, 0)'
                        },
                        {
                            label: 'Porsi',
                            data: allData.data[tahunIni].porsi,
                            backgroundColor: 'rgb(60, 179, 113)'
                        },
                        {
                            label: 'Sekolah',
                            data: allData.data[tahunIni].sekolah,
                            backgroundColor: 'rgb(255, 165, 0)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true, text: 'Bulan', font: {
                                    size: 25
                                }
                            },
                            categoryPercentage: 0.8,
                            barPercentage: 0.9
                        },
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'Jumlah', font: { size: 25 } }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                display: true, position: 'top',
                                font: {
                                    size: 25
                                }
                            }
                        },
                        tooltip: { enabled: true }
                    }
                }
            };
            const barDiagram = new Chart(bar, barRule);
            const selectYear = document.getElementById('tahun');
            selectYear.addEventListener('change', function () {
                const tahun = this.value;
                const datas = allData.data[tahun];
                if (!datas) {
                    console.log("Kosong");
                    barDiagram.data.datasets[0].data = [];
                    barDiagram.data.datasets[1].data = [];
                    barDiagram.data.datasets[2].data = [];
                }
                else {
                    barDiagram.data.datasets[0].data = datas.siswa;
                    barDiagram.data.datasets[1].data = datas.porsi;
                    barDiagram.data.datasets[2].data = datas.sekolah;
                }
                barDiagram.update();
            });
            const roller = document.getElementById("roller-content");
            const items = roller.children;
            let index = 0;
            const firstClone = items[0].cloneNode(true);
            roller.appendChild(firstClone);
            const itemHeight = items[0].offsetHeight;

            setInterval(() => {
                index++;
                roller.style.transition = "margin-top 0.5s";
                roller.style.marginTop = `-${index * itemHeight}px`;
                if (index === items.length) {
                    setTimeout(() => {
                        roller.style.transition = "none";
                        roller.style.marginTop = "0px";
                        index = 0;
                    }, 600);
                }
            }, 2000);
        });
    </script>
</body>

</body>

</html>