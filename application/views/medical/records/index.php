<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records - KIA System</title>
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
            <h3>Medical Records</h3>
            <a href="<?= site_url('medical/records/create'); ?>" class="btn btn-primary">
                + Tambah Record
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Denyut Nadi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($records)): ?>
                            <?php foreach ($records as $r): ?>
                            <tr>
                                <td><?= $r->record_id ?></td>
                                <td><?= $r->height ?> cm</td>
                                <td><?= $r->weight ?> kg</td>
                                <td><?= $r->blood_pressure ?></td>
                                <td><?= $r->pulse ?> bpm</td>
                                <td>
                                    <a href="<?= site_url('medical/records/detail/'.$r->record_id) ?>" 
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="<?= site_url('medical/records/edit/'.$r->record_id) ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('medical/records/delete/'.$r->record_id) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada data medical record
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