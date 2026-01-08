<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Panggilan Antrian Farmasi</title>
    <style>
    body {
        background: #101820;
        color: #00ffcc;
        font-family: Arial, sans-serif;
        text-align: center;
        padding-top: 120px;
    }

    h1 {
        font-size: 4em;
    }

    #status {
        color: #ccc;
        font-size: 1.2em;
    }

    #aktifkan {
        padding: 15px 30px;
        font-size: 18px;
        background: #00FFAA;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        margin-top: 40px;
    }
    </style>
    <script src="../assets/js/responsivevoice.js"></script>
</head>

<body>

    <h1 id="antrian-sekarang">--</h1>
    <div id="status">Menunggu aktivasi suara...</div>
    <button id="aktifkan">Aktifkan Suara Display 🔊</button>

    <script>
    function panggilNomor(nomor) {
        const u = new SpeechSynthesisUtterance("Nomor antrian " + nomor +
            ", silakan menuju loket penyerahan obat, farmasi");
        u.lang = "id-ID";
        u.rate = 0.9;
        u.pitch = 1;
        speechSynthesis.speak(u);

        document.getElementById('antrian-sekarang').textContent = nomor;
        document.getElementById('status').textContent = "Memanggil nomor antrian " + nomor;
    }

    function updateAntrian() {
        fetch('get_antrian_sekarang.php')
            .then(res => res.text())
            .then(data => {
                const nomor = data.trim();
                if (nomor) panggilNomor(nomor);
            })
            .catch(err => {
                console.error("Gagal memuat antrian:", err);
                document.getElementById('status').textContent = "Gagal memuat data antrian.";
            });
    }

    document.getElementById('aktifkan').addEventListener('click', () => {
        document.getElementById('aktifkan').remove();
        document.getElementById('status').textContent = "Suara aktif. Menunggu data...";
        // mulai langsung
        updateAntrian();
        setInterval(updateAntrian, 10000);
    });
    </script>

    <script>
    function speakNomor(nomor) {
        const text = "Nomor antrian " + nomor + ", silakan menuju loket penyerahan obat, farmasi";

        // Coba pakai suara Indonesian Male
        const voice = "Indonesian Male";

        // Jika suara tidak tersedia, fallback ke female
        if (!responsiveVoice.voiceSupport()) {
            console.error("ResponsiveVoice tidak didukung di browser ini.");
            return;
        }

        if (!responsiveVoice.isPlaying()) {
            responsiveVoice.speak(text, voice, {
                rate: 0.9
            });
            console.log("🎙️ Panggilan:", voice);
        }
    }

    // Contoh pemanggilan otomatis
    window.onload = function() {
        // Tunggu 2 detik biar halaman siap
        setTimeout(() => {
            speakNomor("93");
        }, 2000);
    };
    </script>

</body>

</html>