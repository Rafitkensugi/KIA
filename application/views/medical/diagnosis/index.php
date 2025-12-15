<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diagnosis - KIA System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main {
            margin-left: 260px;
            padding: 30px;
        }

        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .table thead th {
            background: #3498db;
            color: white;
            font-weight: 500;
            border: none;
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }
            .page-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main">

        <div class="page-header">
            <h3>Data Diagnosis</h3>
            <a href="<?php echo site_url('medical/diagnosis/create'); ?>" class="btn btn-primary">
                + Tambah Diagnosis
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Record ID</th>
                            <th>ICD-10</th>
                            <th>Nama Diagnosis</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($diagnosis)): ?>
                            <?php foreach ($diagnosis as $item): ?>
                            <tr>
                                <td><?php echo $item->diag_id; ?></td>
                                <td><?php echo $item->record_id; ?></td>
                                <td><span class="badge bg-info"><?php echo $item->icd10; ?></span></td>
                                <td><?php echo $item->diagnosis_name; ?></td>
                                <td><?php echo $item->notes ? $item->notes : '-'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('medical/diagnosis/edit/' . $item->diag_id); ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?php echo site_url('medical/diagnosis/delete/' . $item->diag_id); ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada data diagnosis
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>