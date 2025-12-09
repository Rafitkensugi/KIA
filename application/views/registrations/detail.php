<!DOCTYPE html>
<html>
<head>
    <title>Detail Registrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<div class="container mt-4">
    <h3>Detail Registrasi</h3>

    <table class="table">
        <tr>
            <th width="200">Kode Registrasi</th>
            <td><?= $reg->reg_code ?></td>
        </tr>
        <tr>
            <th>Tipe Pasien</th>
            <td><?= $reg->patient_type ?></td>
        </tr>
        <tr>
            <th>Nama Pasien</th>
            <td><?= $reg->patient_name ?></td>
        </tr>
        <tr>
            <th>Tanggal Kunjungan</th>
            <td><?= $reg->visit_date ?></td>
        </tr>
        <tr>
            <th>Jenis Layanan</th>
            <td><?= $reg->service_type ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= $reg->status ?></td>
        </tr>
        <tr>
            <th>Dibuat Pada</th>
            <td><?= $reg->created_at ?></td>
        </tr>
    </table>

    <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
    <a href="<?= site_url('registrations/print/'.$reg->reg_id); ?>" class="btn btn-success" target="_blank">Print</a>
</div>

</body>
</html>
