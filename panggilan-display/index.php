<!-- Aplikasi Antrian Berbasis Web
**********************************************
* Developer   : Indra Styawantoro
* Company     : Indra Studio
* Release     : Juni 2021
* Update      : -
* Website     : www.indrasatya.com
* E-mail      : indra.setyawantoro@gmail.com
* WhatsApp    : +62-821-8686-9898
-->

<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian Berbasis Web">
    <meta name="author" content="Indra Styawantoro">

    <!-- Title -->
    <title>Aplikasi Antrian Berbasis Web</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-4">
            <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                <!-- judul halaman -->
                <div class="d-flex align-items-center me-md-auto">
                    <i class="bi-mic-fill text-success me-3 fs-3"></i>
                    <h1 class="h5 pt-2">Display Antrian </h1>

                </div>
                <!-- breadcrumbs -->
                <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://www.indrasatya.com/"><i
                                        class="bi-house-fill text-success"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item" aria-current="page">Antrian</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="container pt-5">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-5 mb-4">
                        <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                            <!-- judul halaman -->
                            <div class="d-flex align-items-center me-md-auto">
                                <i class="bi-people-fill text-success me-3 fs-3"></i>
                                <h1 class="h5 pt-2">NOMOR ANTRIAN</h1>
                                <div id="digital-clock"></div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center d-grid p-5">
                                <div class="d-flex justify-content-start">
                                    <div class="feature-icon-3 me-4">
                                        <i class="bi-person-check text-success"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold text-success" style="font-size:160%;">ANTRIAN FARMASI </p>
                                        <h1 id="antrian-sekarang"
                                            class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                                        <!-- <button id="test-voice" class="btn btn-primary">Aktifkan Suara</button> -->
                                        <button id="aktifkan-suara" class="btn btn-sm btn-primary">Aktifkan
                                            Suara</button>
                                        <!-- <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <hr class="my-4">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2021 - <a href="#" target="_blank" class="text-danger text-decoration-none">Dhe Rinaldi SIRS RSUD
                    Lawang</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- load file audio bell antrian -->
    <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>

    <!-- jQuery Core -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <!-- Responsivevoice -->
    <!-- Get API Key -> https://responsivevoice.org/ -->
    <script src="../assets/js/responsivevoice.js"></script>
    <script src="../assets/js/clock.js"></script>

    <script type="text/javascript">
    let suaraDiaktifkan = false;
    let nomorTerakhir = null;

    let selectedVoice = null;

    function initVoice() {
        const voices = speechSynthesis.getVoices();

        if (voices.length === 0) {
            // kadang getVoices() masih kosong, tunggu event
            speechSynthesis.onvoiceschanged = initVoice;
            return;
        }

        // filter hanya bahasa Indonesia
        const indoVoices = voices.filter(v => v.lang === "id-ID");

        // cari suara pria berdasarkan nama
        selectedVoice =
            indoVoices.find(v => /male|laki|man/i.test(v.name)) ||
            indoVoices[0] || // fallback ke suara Indonesia pertama
            voices.find(v => /male|david|matthew|daniel/i.test(v.name)) || // fallback ke male English
            voices[0]; // terakhir: apapun yang ada

        console.log("🎙️ Suara dipilih:", selectedVoice?.name || "default");
    }

    initVoice(); // panggil saat halaman pertama dimuat

    function speakNomor1(nomor) {
        const u = new SpeechSynthesisUtterance(
            "Nomor antrian " + nomor + ", silakan menuju loket penyerahan obat, farmasi"
        );
        u.lang = "id-ID";
        u.rate = 0.9;

        if (selectedVoice) u.voice = selectedVoice;

        speechSynthesis.speak(u, "Indonesian Female");
    }

    function speakNomor(nomor) {
        responsiveVoice.speak("Nomor antrian " + nomor + ",, silakan menuju loket penyerahan obat, farmasi", "Indonesian Male");
    }    

    //mulai disini
    $('#aktifkan-suara').on('click', function() {
        suaraDiaktifkan = true;
        alert("✅ Suara aktif — sistem siap memanggil antrian.");
        $(this).hide(); // sembunyikan tombol
        cekAntrian();
        setInterval(cekAntrian, 5000); // cek tiap 10 detik
    });

    function cekAntrian() {
        $('#antrian-sekarang').load('get_antrian_sekarang.php', function(response, status, xhr) {
            if (!suaraDiaktifkan) return;
            if (status === "success") {
                const nomor = response.trim();
                if (nomor && nomor !== nomorTerakhir) { // hanya bicara jika nomor baru
                    nomorTerakhir = nomor;

                    /* const u = new SpeechSynthesisUtterance("Nomor antrian " + nomor +
                        ", silakan menuju loket penyerahan obat, farmasi");
                    u.lang = "id-ID male";
                    u.rate = 0.9;
                    speechSynthesis.speak(u); */

                    speakNomor(nomor);

                    console.log("Memanggil antrian:", nomor);
                }
            }
        });
    }



    $('#aktifkan-suara1').on('click', function() {
        suaraDiaktifkan = true;
        alert("✅ Suara aktif — sistem siap memanggil antrian.");
    });


    $('#antrian-sekarang1').load('get_antrian_sekarang.php', function(response, status, xhr) {
        //if (!suaraDiaktifkan) return;

        console.log(response.trim());

        if (status === "success") {
            const nomor = response.trim();
            const u = new SpeechSynthesisUtterance("Nomor antrian " + nomor +
                ", silakan menuju loket penyerahan obat, farmasi");
            u.lang = "id-ID";
            u.rate = 0.9;

            speechSynthesis.speak(u);
        }
    });


    $(document).ready(function() {

        window.onload = function() {
            const u = new SpeechSynthesisUtterance("Selamat datang di display antrian farmasi");
            u.lang = "id-ID";
            u.rate = 0.9;
            speechSynthesis.speak(u);
        };

        // tampilkan informasi antrian
        $('#jumlah-antrian').load('get_jumlah_antrian.php');
        //$('#antrian-sekarang').load('get_antrian_sekarang.php');

        $('#test-voice').on('click', function() {
            $('#antrian-sekarang').load('get_antrian_sekarang.php', function(response) {
                var bell = document.getElementById('tingtung');

                // mainkan suara bell antrian
                bell.pause();
                bell.currentTime = 0;
                bell.play();

                // set delay antara suara bell dengan suara nomor antrian
                durasi_bell = bell.duration * 770;

                // mainkan suara nomor antrian
                setTimeout(function() {
                    const nomor = response.trim();
                    const u = new SpeechSynthesisUtterance("Nomor antrian " + nomor +
                        ", silakan menuju loket penyerahan obat, farmasi");
                    u.lang = "id-ID";
                    u.rate = 0.9;
                    speechSynthesis.speak(u);

                }, durasi_bell);

            });
        });

        // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
        /* setInterval(function() {
            $('#jumlah-antrian').load('get_jumlah_antrian.php').fadeIn("slow");
            $('#antrian-sekarang').load('get_antrian_sekarang.php').fadeIn("slow");
            $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php').fadeIn("slow");
            $('#sisa-antrian').load('get_sisa_antrian.php').fadeIn("slow");
        }, 1000); */
        
    });
    </script>
</body>

</html>