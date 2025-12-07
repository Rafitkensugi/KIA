<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">

    <h3 class="fw-bold mb-3">Edit Data Ibu</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= site_url('patients/mother/update/'.$mother->mother_id) ?>" method="post" class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?= $mother->nik ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Ibu</label>
                    <input type="text" name="name" class="form-control" value="<?= $mother->name ?>" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-control" value="<?= $mother->birth_date ?>">
                </div>

                <div class="col-md-6">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="phone" class="form-control" value="<?= $mother->phone ?>">
                </div>

                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" rows="2"><?= $mother->address ?></textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Golongan Darah</label>
                    <input type="text" name="blood_type" class="form-control" value="<?= $mother->blood_type ?>">
                </div>

                <div class="col-md-8">
                    <label class="form-label">Alergi</label>
                    <input type="text" name="alergies" class="form-control" value="<?= $mother->alergies ?>">
                </div>

                <div class="col-12">
                    <label class="form-label">Riwayat Medis</label>
                    <textarea name="medical_history" class="form-control" rows="3"><?= $mother->medical_history ?></textarea>
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-warning text-dark">Update</button>
                    <a href="<?= site_url('patients/mother') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
