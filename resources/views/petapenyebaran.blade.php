<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETA</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
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

        #map {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .infoFooter {
            margin-top: auto;
            width: 90%;
            display: flex;
            justify-content: flex-start;
            padding: 20px 0;
            z-index: 10;
        }

        .infoFooter>div {
            width: 300px;
            height: 100px;
            background-color: white;
            margin-inline: 50px;
            opacity: 90%;
            border-radius: 10px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);

        }

        #miniOverlay {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 800px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: none;
            z-index: 9999;
            padding: 20px;
            transition: all 0.3s ease;
        }

        #miniOverlay .close-btn {
            align-self: flex-start;
            cursor: pointer;
            font-size: 50px;
            margin-top: -10px;
            margin-right: -10px;
            padding: 5px;
        }

        .configOverlay {
            display: flex;
            width: 90%;
            height: 90%;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        .blur {
            filter: blur(5px);
            transition: filter 0.3s ease;
        }

        .navbarOverlay {
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }

        .navbarOverlay a {
            padding-left: 10px;
            padding-right: 10px;
        }

        .navbarOverlay a:hover {
            background-color: red;
            color: white;
            border-radius: 10px;
        }

        .infoOverlay {
            display: flex;
            justify-content: space-between;
        }

        .infoOverlay1,
        .infoOverlay2 {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        .info {
            width: 200px;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 10px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .navbarOverlay > a.active {
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="map"></div>
        @include('partials.navbar')
        <div class="infoFooter">
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/graduation.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Sekolah Penerima</p>
                    <p>Example</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/hand-shake.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Persentase Penerimaan </p>
                    <p>Example</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/truck.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Porsi Terkirim </p>
                    <p>Example</p>
                </div>
            </div>
            <div>
                <img style="padding-left: 10px;" src="{{ asset('Image/people.png') }}">
                <div style="display: flex;flex-direction: column; padding-left:20px ;">
                    <p style="font-size: 20px;">Total Siswa Penerima</p>
                    <p>Example</p>
                </div>
            </div>
        </div>
    </div>
    <div id="miniOverlay">
        <span class="close-btn"
            onclick="document.getElementById('miniOverlay').style.display='none', document.getElementById('container').classList.remove('blur');">×</span>
        <div class="configOverlay">
            <h1 style="font-size: 50px;padding:25px;">Province</h1>
            <div class="navbarOverlay">
                <a id="overlay" data-page="page1">Info Umum</a>
                <a id="overlay" data-page="page2">Sekolah Penerima</a>
                <a id="overlay" data-page="page3">Statistik Gizi</a>
            </div>
            <div id="overlayContent"></div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        function switchOverlay(pageKey) {
            const html = overlays[pageKey];
            if (!html) {
                console.error("No overlay found for", pageKey);
                return;
            }
            document.getElementById('overlayContent').innerHTML = html;
            document.getElementById('miniOverlay').style.display = 'flex';
            document.getElementById('container').classList.add('blur');
        }
        const overlays = {
            page1: `<img style="width: 100%;padding:20px;" src="indo_bg.png">
            <div style="width: 90%; height: 400px;" class="infoOverlay">
                <div class="infoOverlay1">
                    <div class="info">
                        <img src="graduation.png">
                        <div>
                            <p>Total Sekolah Penerima</p>
                            <p>Example</p>
                        </div>
                    </div>
                    <div class="info">
                        <img src="hand-shake.png">
                        <div>
                            <p>Persentase Penerimaan</p>
                            <p>Example</p>
                        </div>
                    </div>
                    <div class="info">
                        <img src="building.png">
                        <div>
                            <p>Anggaran Daerah</p>
                            <p>Example</p>
                        </div>
                    </div>
                </div>
                <div class="infoOverlay2">
                    <div class="info">
                        <img src="people.png">
                        <div>
                            <p>Total Siswa Penerima</p>
                            <p>Example</p>
                        </div>
                    </div>
                    <div class="info">
                        <img src="truck.png">
                        <div>
                            <p>Total Porsi Terkirim</p>
                            <p>Example</p>
                        </div>
                    </div>
                    <div class="info">
                        <img src="cooking.png">
                        <div>
                            <p>Total Unit Pelayanan</p>
                            <p>Example</p>
                        </div>
                    </div>
                </div>
            </div>`,
            page2: `<h1>Overlay 2</h1> <a data-page="page4">Sekolah</a>`,
            page3: `<h1>Overlay 3</h1>`,
            page4: `<h1>Overlay 4</h1>`,
            page5: `<h1>Overlay 5</h1>`,
            page6: `<h1>Overlay 6</h1>`
        };
        const buttons = document.querySelectorAll('a[data-page]');
        buttons.forEach(btn => {
            btn.addEventListener('click', e => {
                const page = e.currentTarget.getAttribute('data-page');
                switchOverlay(page);

                buttons.forEach(b => b.classList.remove('active'));
                e.currentTarget.classList.add('active');
            });
        });
        const overlayEl = document.getElementById('overlay');
        const newLinks = overlayEl.querySelectorAll('a[data-page]');
        newLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const newPage = e.currentTarget.getAttribute('data-page');
                showOverlay(newPage);
            });
        });
        window.addEventListener('load', () => {
            const indonesiaSW = [-11.0, 95.0];   // southwest corner
            const indonesiaNE = [6.0, 141.0];   // northeast corner
            const indonesiaBounds = [indonesiaSW, indonesiaNE];
            const map = L.map('map', {
                center: [-2.5, 118.0],   // geographic center of Indonesia
                zoom: 5.5,                 // adjust (3–6) until you see the full archipelago
                minZoom: 4,              // don’t let users zoom out too far
                maxZoom: 20,              // limit how far they can zoom in
                maxBounds: indonesiaBounds,          // lock panning to Indonesia
                maxBoundsViscosity: 1.0,             // “sticky” edges
                zoomControl: true,                   // show the +/− buttons
                worldCopyJump: false                 // don’t repeat the world
            });
            map.zoomControl.setPosition('bottomright'); // or any other corner
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 18,
                noWrap: true                        // important: only load tiles once
            }).addTo(map);

            map.on('click', function (e) {
                switchOverlay('page1');
            });
            window.addEventListener('resize', () => map.invalidateSize());
            setTimeout(() => map.invalidateSize(), 200);
        });
    </script>
</body>

</html>