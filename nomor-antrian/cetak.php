<?php
if (isset($_REQUEST['cetak'])) {
    $antrian = $_REQUEST['antrian'];
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
    font-size: 48px;
    font-family: "Lucida Console", "Courier New", monospace;
    font-weight: bold;
}

.antrian_head {
    text-align: center;
    background-color: #fff;
    font-size: 24px;
    font-family: "Lucida Console", "Courier New", monospace;
    font-weight: bold;
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
        width: 58mm
    }
}
</style>

<body>
    <div class="sheet">
        <p class="antrian_head"> FARMASI </p>
        <p class="antrian"> <?php echo $antrian ?> </p>
    </div>
</body>

</html>