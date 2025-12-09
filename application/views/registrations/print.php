<!DOCTYPE html>
<html>
<head>
    <title>Cetak Registrasi</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; }
        .box {
            border: 1px solid #000; 
            padding: 20px; 
            width: 450px; 
            margin: 0 auto;
        }
        h3 { text-align: center; }
    </style>
</head>
<body onload="window.print()">

<div class="box">
    <h3>Data Registrasi</h3>
    <p><b>Kode:</b> <?= $reg->reg_code ?></p>
    <p><b>Pasien:</b> <?= $reg->patient_name ?> (<?= $reg->patient_type ?>)</p>
    <p><b>Tanggal Kunjungan:</b> <?= $reg->visit_date ?></p>
    <p><b>Layanan:</b> <?= $reg->service_type ?></p>
    <p><b>Status:</b> <?= $reg->status ?></p>
    <p><b>Dibuat Pada:</b> <?= $reg->created_at ?></p>
</div>

</body>
</html>
