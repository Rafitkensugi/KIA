<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kehamilan - KIA System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main {
            padding: 30px;
        }

        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .page-header h3 {
            margin: 0;
            font-size: 22px;
            color: #2c3e50;
        }

        .card {
            border: none;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>



    <div class="main">

        <div class="page-header">
            <h3>Edit Data Kehamilan</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= site_url('patients/pregnancy/update/'.$pregnancy->pregnancy_id) ?>">

                    <div class="mb-3">
                        <label class="form-label">Ibu <span class="text-danger">*</span></label>
                        <select name="mother_id" class="form-select" required>
                            <?php foreach($mothers as $m): ?>
                                <option value="<?= $m->mother_id ?>"
                                    <?= ($m->mother_id == $pregnancy->mother_id ? 'selected' : '') ?>>
                                    <?= $m->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">HPHT (Hari Pertama Haid Terakhir) <span class="text-danger">*</span></label>
                                <input type="date" name="hpht" class="form-control" value="<?= $pregnancy->hpht ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">HPL (Hari Perkiraan Lahir) <span class="text-danger">*</span></label>
                                <input type="date" name="hpl" class="form-control" value="<?= $pregnancy->hpl ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Gravida</label>
                                <input type="number" name="gravida" class="form-control" min="0" value="<?= $pregnancy->gravida ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Para</label>
                                <input type="number" name="para" class="form-control" min="0" value="<?= $pregnancy->para ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Abortus</label>
                                <input type="number" name="abortus" class="form-control" min="0" value="<?= $pregnancy->abortus ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea name="notes" class="form-control" rows="4"><?= $pregnancy->notes ?></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= site_url('patients/pregnancy') ?>" class="btn btn-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>