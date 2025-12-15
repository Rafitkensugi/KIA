<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ibu - KIA System</title>
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
            <h3>Data Ibu</h3>
            <a href="<?= site_url('patients/mother/create') ?>" class="btn btn-primary">
                + Tambah Ibu
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NIK</th>
                            <th>Nama Ibu</th>
                            <th>Tgl Lahir</th>
                            <th>No. Telepon</th>
                            <th>Golongan Darah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($mothers)): ?>
                            <?php foreach ($mothers as $m): ?>
                            <tr>
                                <td><?= $m->mother_id ?></td>
                                <td><?= $m->nik ?></td>
                                <td><?= $m->name ?></td>
                                <td><?= date('d/m/Y', strtotime($m->birth_date)) ?></td>
                                <td><?= $m->phone ?></td>
                                <td><?= $m->blood_type ?></td>
                                <td>
                                    <a href="<?= site_url('patients/mother/detail/'.$m->mother_id) ?>" 
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="<?= site_url('patients/mother/edit/'.$m->mother_id) ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('patients/mother/delete/'.$m->mother_id) ?>"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')"
                                       class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data ibu
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