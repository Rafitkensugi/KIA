<!DOCTYPE html>
<html>
<head>
    <title>Tambah Registrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Registrasi</h3>

    <form action="<?= site_url('registrations/store'); ?>" method="post">

        <div class="form-group">
            <label>Tipe Pasien</label>
            <select name="patient_type" class="form-control" required>
                <option value="">-- pilih --</option>
                <option value="mother">Ibu</option>
                <option value="child">Anak</option>
            </select>
        </div>

        <div class="form-group">
            <label>Ibu</label>
            <select name="mother_id" class="form-control">
                <option value="">-- pilih ibu --</option>
                <?php foreach ($mothers as $m): ?>
                    <option value="<?= $m->mother_id ?>"><?= $m->mother_name ?></option>
                <?php endforeach; ?>
            </select>
            <small class="form-text text-muted">Kosongkan jika pasien adalah anak.</small>
        </div>

        <div class="form-group">
            <label>Anak</label>
            <select name="child_id" class="form-control">
                <option value="">-- pilih anak --</option>
                <?php foreach ($children as $c): ?>
                    <option value="<?= $c->child_id ?>"><?= $c->child_name ?></option>
                <?php endforeach; ?>
            </select>
            <small class="form-text text-muted">Kosongkan jika pasien adalah ibu.</small>
        </div>

        <div class="form-group">
            <label>Tanggal Kunjungan</label>
            <input type="date" name="visit_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jenis Layanan</label>
            <select name="service_type" class="form-control" required>
                <option value="">-- pilih layanan --</option>
                <option value="pemeriksaan_ibu">Pemeriksaan Ibu</option>
                <option value="pemeriksaan_anak">Pemeriksaan Anak</option>
                <option value="imunisasi">Imunisasi</option>
                <option value="usg">USG</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
