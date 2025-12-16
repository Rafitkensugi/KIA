<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Treatment - KIA System</title>
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
            <h3>Edit Treatment</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- Action tanpa parameter, id dikirim via hidden input -->
                <form action="<?= site_url('medical/treatments/update/' .$treatments->treatment_id) ?>" method="post">
                    <input type="hidden" name="treatment_id" value="<?= $treatments->treatment_id ?>">

                    <div class="mb-3">
                        <label class="form-label">Record ID <span class="text-danger">*</span></label>
                        <input type="number" name="record_id" class="form-control"
                            value="<?= $treatments->record_id ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Treatment <span class="text-danger">*</span></label>
                        <input type="text" name="treatment_name" class="form-control"
                            value="<?= $treatments->treatment_name ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biaya (Rp) <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" name="cost" class="form-control"
                            value="<?= $treatments->cost ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea name="notes" class="form-control" rows="3"><?= $treatments->notes ?></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= site_url('medical/treatments') ?>" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>