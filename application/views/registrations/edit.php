<!DOCTYPE html>
<html>
<head>
    <title>Edit Registrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<div class="container mt-4">
    <h3>Edit Registrasi</h3>

    <form action="<?= site_url('registrations/update/'.$reg->reg_id); ?>" method="post">

        <div class="form-group">
            <label>Kode Registrasi</label>
            <input type="text" class="form-control" value="<?= $reg->reg_code ?>" disabled>
        </div>

        <div class="form-group">
            <label>Pasien</label>
            <input type="text" class="form-control" value="<?= $reg->patient_name ?> (<?= $reg->patient_type ?>)" disabled>
        </div>

        <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="visit_date" class="form-control" value="<?= $reg->visit_date ?>" required>
        </div>

        <div class="form-group">
            <label>Jenis Layanan</label>
            <select name="service_type" class="form-control" required>
                <option value="pemeriksaan_ibu"  <?= $reg->service_type == 'pemeriksaan_ibu' ? 'selected' : '' ?>>Pemeriksaan Ibu</option>
                <option value="pemeriksaan_anak" <?= $reg->service_type == 'pemeriksaan_anak' ? 'selected' : '' ?>>Pemeriksaan Anak</option>
                <option value="imunisasi"        <?= $reg->service_type == 'imunisasi' ? 'selected' : '' ?>>Imunisasi</option>
                <option value="usg"              <?= $reg->service_type == 'usg' ? 'selected' : '' ?>>USG</option>
                <option value="lainnya"          <?= $reg->service_type == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status Registrasi</label>
            <select name="status" class="form-control">
                <option value="pending"  <?= $reg->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="on_queue" <?= $reg->status == 'on_queue' ? 'selected' : '' ?>>On Queue</option>
                <option value="finished" <?= $reg->status == 'finished' ? 'selected' : '' ?>>Finished</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
