<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="mb-3">
        <h3 class="fw-bold">Tambah Data Ibu</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= site_url('patients/mother/store') ?>" method="post" class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="col-md-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" rows="2"></textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Golongan Darah</label>
                    <input type="text" name="blood_type" class="form-control">
                </div>

                <div class="col-md-8">
                    <label class="form-label">Alergi</label>
                    <input type="text" name="alergies" class="form-control">
                </div>

                <div class="col-12">
                    <label class="form-label">Riwayat Medis</label>
                    <textarea name="medical_history" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('patients/mother') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
