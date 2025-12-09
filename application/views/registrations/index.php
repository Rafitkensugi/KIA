<!DOCTYPE html>
<html>
<head>
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<div class="container mt-4">

    <h3>Data Registrasi</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('registrations/create'); ?>" class="btn btn-primary mb-3">Tambah Registrasi</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tipe Pasien</th>
                <th>Nama Pasien</th>
                <th>Tanggal Kunjungan</th>
                <th>Jenis Layanan</th>
                <th>Status</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($registrations)): ?>
                <?php foreach ($registrations as $r): ?>
                    <tr>
                        <td><?= $r->reg_code ?></td>
                        <td><?= ucfirst($r->patient_type) ?></td>
                        <td><?= $r->patient_name ?></td>
                        <td><?= $r->visit_date ?></td>
                        <td><?= $r->service_type ?></td>
                        <td><?= $r->status ?></td>
                        <td>
                            <a href="<?= site_url('registrations/detail/'.$r->reg_id); ?>" class="btn btn-info btn-sm">Detail</a>
                            <a href="<?= site_url('registrations/edit/'.$r->reg_id); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <?php if ($r->has_record): ?>
    <button class="btn btn-danger btn-sm" disabled>Hapus</button>
<?php else: ?>
    <a href="<?= site_url('registrations/delete/'.$r->reg_id); ?>" 
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin hapus?');">Hapus</a>
<?php endif; ?>

                            <a href="<?= site_url('registrations/print/'.$r->reg_id); ?>" class="btn btn-success btn-sm" target="_blank">Print</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
