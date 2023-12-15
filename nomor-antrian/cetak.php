<?php
date_default_timezone_set('Asia/Jakarta');
if (isset($_REQUEST['cetak'])) {
    $antrian = $_REQUEST['antrian'];
    $jenis = ($_REQUEST['jenis'] == 0) ? 'NON RACIKAN' : 'RACIKAN';   
    $tanggal = ($_REQUEST['tanggal'] != null)?$_REQUEST['tanggal']:date('Y-m-d');
}
?>
<html>
<style>
@media all {
    .page-break {
        display: none;
    }
}

@media print {
    .no-print {
        visibility: hidden;
    }

    .page-break {
        display: block;
        page-break-before: always;
    }

}

@page {
    sheet-size: 197.3mm 110mm;
}

p {
    margin: 0pt;
}

.antrian {
    text-align: center;
    background-color: #fff;
    font-size: 7em;
    font-family: "Lucida Console";
    font-weight: bold;
}

.antrian_head {
    text-align: center;
    background-color: #fff;
    font-size: 24px;
    font-family: "Lucida Console";
    font-weight: bold;
}

.antrian_head1 {
    text-align: center;
    background-color: #fff;
    font-size: 12px;
    font-family: "roboto";
    font-weight: bold;
}

.antrian_foot {
    text-align: center;
    background-color: #fff;
    font-size: 8px;
    font-family: "roboto";
}

@page {
    size: 58mm 50mm landscape;

}

body.receipt .sheet {
    width: 58mm;
    height: 50mm
}

@media print {
    body.receipt {
        width: 78mm
    }
}

@media print {
    .page-break {
        display: block;
        page-break-before: always;
    }
}

@media print {
    body {
        margin: 0;
        color: #000;
        background-color: #fff;
    }

}
</style>

<body>
    <div class="sheet">
        <p class="antrian_head1"> Antrian Farmasi </p>
        <p class="antrian_head1"> <?php echo $jenis ?> </p>
        <p class="antrian"> <?php echo $antrian ?> </p>
        <p class="antrian_foot"> <?php echo $tanggal ;?> <br> Semoga Lekas Sembuh </p>
    </div>
    <div class="page-break"></div>
    <div class="sheet">
        <p class="antrian_head1"> Antrian Farmasi </p>
        <p class="antrian_head1"> <?php echo $jenis ?> </p>
        <p class="antrian"> <?php echo $antrian ?> </p>
        <p class="antrian_foot"> <?php echo $tanggal;?> <br> Semoga Lekas Sembuh </p>
    </div>
</body>

</html>