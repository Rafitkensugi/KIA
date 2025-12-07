<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="mb-3">
        <h3 class="fw-bold">Tambah Data Anak</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= site_url('patients/child/store') ?>" method="post" class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <select name="mother_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($mothers as $m): ?>
                            <option value="<?= $m->mother_id ?>"><?= $m->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">NIK Anak</label>
                    <input type="text" name="nik" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Anak</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Berat Lahir (gr)</label>
                    <input type="number" name="birth_weight" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Panjang Lahir (cm)</label>
                    <input type="number" name="birth_length" class="form-control">
                </div>

                <div class="col-12">
                    <label class="form-label">Alergi</label>
                    <input type="text" name="alergies" class="form-control">
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('patients/child') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
