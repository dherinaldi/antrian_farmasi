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
                    <i class="bi-list-fill text-success me-3 fs-3"></i>
                    <h1 class="h5 pt-2">Rekap Data Antrian </h1>
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
            <div class="card border-0 shadow-sm">
                <div class="d-flex gap-3 align-items-end mb-4" id="filter-tanggal">
                    <div class="col-md-4">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-success" id="btn-filter">Tampilkan</button>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="tabel-antrian" class="table table-bordered table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Antrian</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    <div class="mt-3" id="total-kunjungan"><strong>Total Kunjungan:</strong> 0</div>

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
                &copy; 2021 - <a href="https://www.indrasatya.com/" target="_blank"
                    class="text-danger text-decoration-none">Dhe Rinaldi SIRS RSUD Lawang</a>. All rights reserved.
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

    <script>
    $(document).ready(function() {
        var table = $('#tabel-antrian').DataTable({
            "lengthChange": false, // non-aktifkan fitur "lengthChange"
            "searching": false, // non-aktifkan fitur "Search"
            "ajax": {
                "url": "get_antrian.php",
                "type": "GET", // atau POST sesuai kebutuhan
                "data": function(d) {
                    d.tanggal_awal = $('#tanggal_awal').val();
                    d.tanggal_akhir = $('#tanggal_akhir').val();
                },
                "dataSrc": function(json) {
                    console.log(json);
                    // Update total kunjungan
                    let formattedTotal = new Intl.NumberFormat().format(json.total ?? 0);
                    $('#total-kunjungan').html('<strong>Total Kunjungan:</strong> ' +
                        formattedTotal);
                    return json.data;
                }
            },
            // menampilkan data
            "columns": [{
                    "data": "tanggal",
                    "width": '250px',
                    "className": 'text-center'
                },
                {
                    "data": "antrian",
                    "className": 'text-left'
                },

            ],
            "order": [
                [0, "desc"] // urutkan data berdasarkan "no_antrian" secara descending
            ],
            "iDisplayLength": 10, // tampilkan 10 data per halaman
        });

        // Tombol filter ditekan
        $('#btn-filter').on('click', function() {
            table.ajax.reload();
        });
    });
    </script>



</html>