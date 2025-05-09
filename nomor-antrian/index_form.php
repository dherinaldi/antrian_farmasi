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

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
    @media print {
        .noPrint {
            display: none;
        }
    }
    </style>
</head>

<?php date_default_timezone_set('Asia/Jakarta');
require_once "../config/database_prod.php";
?>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0 ">
        <div class="container pt-5 noPrint">
            <div class="row justify-content-lg-center">
                <div class="col-lg-5 mb-4">
                    <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                        <!-- judul halaman -->
                        <div class="d-flex align-items-center me-md-auto">
                            <i class="bi-people-fill text-success me-3 fs-3"></i>
                            <h1 class="h5 pt-2">Nomor Antrian</h1>
                        </div>
                    </div>


                    </select>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-5">
                            <div class="border border-success rounded-2 py-2 mb-5">
                                <h3 class="pt-4">ANTRIAN</h3>
                                <!-- menampilkan informasi jumlah antrian -->
                                <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2 antrian">
                                </h1>
                            </div>
                            <div class="border border-success rounded-2 py-2 mb-5">
                                <label for="norm" class="form-label">NORM</label>
                                <select id="sel_norm" class="form-select " aria-label="Default select example">
                                </select>

                                <input type="text" id="id">
                                <p id="norm_pasien" class="h4 fw-bold text-success form-label">-
                                </p>

                                <p id="nama_pasien" class="h4 fw-bold text-success form-label">-
                                </p>

                                <p id="poli" class="h4 fw-bold text-success form-label">-
                                </p>

                                <p id="nama_dokter" class="h4 fw-bold text-success form-label">-
                                </p>
                            </div>

                            <!-- button pengambilan nomor antrian -->
                            <a href="javascript:void(0)" data-jenis="0"
                                class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2 insert">
                                <i class="bi-book fs-4 me-2"></i> NON RACIKAN
                            </a>
                            <a href="javascript:void(0)" data-jenis="1"
                                class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2 insert">
                                <i class="bi-book fs-4 me-2"></i> RACIKAN
                            </a>
                            <!-- <a id="cetak_nomor" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                                <i class="bi-person-plus fs-4 me-2"></i> Cetak
                            </a> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2021 - <a href="#" target="_blank" class="text-danger text-decoration-none">Dhe Rinaldi SIRS RSUD
                    Lawang</a>. All rights reserved.
            </div>
        </div>
    </footer>

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

    <!-- Styles -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        //$('.sel_norm').select2(); 
        $('#antrian').load('get_antrian.php');

        $('a.insert').on('click', function() {
            var jenis = $(this).data('jenis');
            var id = $("#id").val();
            $.ajax({
                type: 'POST', // mengirim data dengan method POST
                url: 'insert.php', // url file proses insert data
                data: {
                    jenis: jenis,
                    id: id,
                    poli: $("#poli").text(),
                    nama_pasien: $("#nama_pasien").text()

                },
                success: function(result) { // ketika proses insert data selesai
                    console.log(result);
                    // jika berhasil
                    if (result === 'Sukses') {
                        $('#antrian').load('get_antrian.php').fadeIn('slow');
                    }
                },
            });
            // cetak tiket berdasarkan jenis resepnya
            //cetak(jenis);
        });


        $("#sel_norm").select2({
            placeholder: 'Ketikkan No RM Anda',
            minimumInputLength: 2,
            ajax: {
                url: "data.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        search: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $('#sel_norm').on('change', function() {
            //var input_value = $(this).find(':selected').data('value');;
            let value = $(this).val();
            const val_arr = value.split("|");

            let text = $("option:selected").text();
            const arr = text.split("|");
            
            let norm_pasien = `${arr[0]}`;
            let nm_pasien = `${arr[1]}`;
            let poli = `${arr[2]}`;
            let nama_dokter = `${val_arr[6]}`;

            alert(value);

            $("#id").val(value);
            $("#norm_pasien").text(norm_pasien);
            $("#nama_pasien").text(nm_pasien);
            $("#nama_dokter").text(nama_dokter);
            $("#poli").text(poli);          
        });

    });

    function cetak(jenis) {
        var antrian = $('#antrian').text();
        $.ajax({
            type: 'POST', // mengirim data dengan method POST
            url: 'cetak.php', // url file proses insert data
            data: {
                antrian: parseInt(antrian) + 1,
                cetak: 'cetak',
                jenis: jenis,
                tanggal: '<?php echo date('Y-m-d')?>'
            },
            success: function(result) { // ketika proses insert data selesai
                // jika berhasil                           
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write(result);
                printWindow.document.close();
                printWindow.print();
            },
        });

    }
    </script>
</body>

</html>