<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep - KIA System</title>
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
    </style>
</head>
<body>

<div class="main">

    <div class="page-header">
        <h3>Edit Resep Obat</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?= site_url('prescriptions/update/'.$prescription->prescription_id) ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Record</label>
                    <select name="record_id" class="form-control" required>
                        <?php foreach ($records as $r): ?>
                            <option value="<?= $r->record_id ?>"
                                <?= $r->record_id == $prescription->record_id ? 'selected' : '' ?>>
                                Record #<?= $r->record_id ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Obat</label>
                    <select name="drug_id" class="form-control" required>
                        <?php foreach ($drugs as $d): ?>
                            <option value="<?= $d->drug_id ?>"
                                <?= $d->drug_id == $prescription->drug_id ? 'selected' : '' ?>>
                                <?= $d->drug_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dosis</label>
                    <input type="text" name="dosage" class="form-control"
                           value="<?= $prescription->dosage ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Aturan Pakai</label>
                    <input type="text" name="instruction" class="form-control"
                           value="<?= $prescription->instruction ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="quantity" class="form-control"
                           value="<?= $prescription->quantity ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="notes" class="form-control" rows="4"><?= $prescription->notes ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= site_url('prescriptions') ?>" class="btn btn-secondary">Kembali</a>
                </div>

            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
