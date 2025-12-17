<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Resep - KIA System</title>
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
        <h3>Data Resep Obat</h3>
        <a href="<?= site_url('prescriptions/create') ?>" class="btn btn-primary">
            + Tambah Resep
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Record</th>
                        <th>Obat</th>
                        <th>Dosis</th>
                        <th>Jumlah</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($prescriptions)): ?>
                    <?php foreach($prescriptions as $p): ?>
                    <tr>
                        <td><?= $p->prescription_id ?></td>
                        <td><?= $p->record_id ?></td>
                        <td><span class="badge bg-info"><?= $p->drug_name ?></span></td>
                        <td><?= $p->dosage ?></td>
                        <td><?= $p->quantity ?></td>
                        <td><?= $p->notes ? $p->notes : '-' ?></td>
                        <td>
                            <a href="<?= site_url('prescriptions/edit/'.$p->prescription_id) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('prescriptions/delete/'.$p->prescription_id) ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus resep ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Belum ada data resep
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