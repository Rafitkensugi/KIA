<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="mb-3">
        <h3 class="fw-bold">Edit Registrasi</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= site_url('registrations/update/'.$reg->reg_id); ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Kode Registrasi</label>
                    <input type="text" class="form-control" value="<?= $reg->reg_code ?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pasien</label>
                    <input type="text" class="form-control" value="<?= $reg->patient_name ?> (<?= ucfirst($reg->patient_type) ?>)" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kunjungan <span class="text-danger">*</span></label>
                    <input type="date" name="visit_date" class="form-control" value="<?= $reg->visit_date ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                    <select name="service_type" class="form-select" required>
                        <option value="pemeriksaan_ibu" <?= $reg->service_type == 'pemeriksaan_ibu' ? 'selected' : '' ?>>Pemeriksaan Ibu</option>
                        <option value="pemeriksaan_anak" <?= $reg->service_type == 'pemeriksaan_anak' ? 'selected' : '' ?>>Pemeriksaan Anak</option>
                        <option value="imunisasi" <?= $reg->service_type == 'imunisasi' ? 'selected' : '' ?>>Imunisasi</option>
                        <option value="usg" <?= $reg->service_type == 'usg' ? 'selected' : '' ?>>USG</option>
                        <option value="lainnya" <?= $reg->service_type == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Registrasi <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="pending" <?= $reg->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="on_queue" <?= $reg->status == 'on_queue' ? 'selected' : '' ?>>On Queue</option>
                        <option value="finished" <?= $reg->status == 'finished' ? 'selected' : '' ?>>Finished</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>