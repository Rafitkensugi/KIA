<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian - KIA System</title>
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
            <h3>Edit Antrian</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?= site_url('queue/update/'.$queue->queue_id) ?>" method="post">
                    
                    <div class="mb-3">
                        <label class="form-label">Registration ID <span class="text-danger">*</span></label>
                        <input type="number" name="reg_id" class="form-control" value="<?= $queue->reg_id ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Antrian <span class="text-danger">*</span></label>
                        <input type="number" name="queue_number" class="form-control" min="1" value="<?= $queue->queue_number ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="menunggu" <?= $queue->status == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                            <option value="dipanggil" <?= $queue->status == 'dipanggil' ? 'selected' : '' ?>>Dipanggil</option>
                            <option value="selesai" <?= $queue->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= site_url('queue') ?>" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>