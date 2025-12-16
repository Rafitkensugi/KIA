<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="mb-3">
        <h3 class="fw-bold">Tambah Registrasi</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= site_url('registrations/store'); ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Tipe Pasien <span class="text-danger">*</span></label>
                    <select name="patient_type" class="form-select" required>
                        <option value="">-- Pilih Tipe Pasien --</option>
                        <option value="mother">Ibu</option>
                        <option value="child">Anak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ibu</label>
                    <select name="mother_id" class="form-select">
                        <option value="">-- Pilih Ibu --</option>
                        <?php foreach ($mothers as $m): ?>
                            <option value="<?= $m->mother_id ?>"><?= $m->mother_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">Kosongkan jika pasien adalah anak.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Anak</label>
                    <select name="child_id" class="form-select">
                        <option value="">-- Pilih Anak --</option>
                        <?php foreach ($children as $c): ?>
                            <option value="<?= $c->child_id ?>"><?= $c->child_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">Kosongkan jika pasien adalah ibu.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kunjungan <span class="text-danger">*</span></label>
                    <input type="date" name="visit_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                    <select name="service_type" class="form-select" required>
                        <option value="">-- Pilih Jenis Layanan --</option>
                        <option value="pemeriksaan_ibu">Pemeriksaan Ibu</option>
                        <option value="pemeriksaan_anak">Pemeriksaan Anak</option>
                        <option value="imunisasi">Imunisasi</option>
                        <option value="usg">USG</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>