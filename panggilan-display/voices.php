<button id="aktifkan-suara">Aktifkan Suara</button>

<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script>
let suaraAktif = false;

document.getElementById("aktifkan-suara").addEventListener("click", function() {
    suaraAktif = true;
    alert("✅ Suara aktif — sistem siap memanggil antrian.");

    speakNomor(255);

    setInterval(speakNomor, 5000); // cek tiap 10 detik
});

function speakNomor(nomor) {
    if (!suaraAktif) return;
    const text = "Nomor antrian " + nomor + ", silakan menuju loket penyerahan obat, farmasi";
    responsiveVoice.speak(text, "Indonesian Male", {
        rate: 0.9
    });
}
</script>