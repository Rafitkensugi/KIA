<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian - KIA System</title>
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
            <h3>Daftar Antrian</h3>
            <a href="<?= site_url('queue/create') ?>" class="btn btn-primary">
                + Tambah Antrian
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reg ID</th>
                            <th>No Antrian</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($queue)): ?>
                            <?php foreach ($queue as $q): ?>
                            <tr>
                                <td><?= $q->queue_id ?></td>
                                <td><?= $q->reg_id ?></td>
                                <td><strong><?= $q->queue_number ?></strong></td>
                                <td>
                                    <?php 
                                        $status = strtolower($q->status);
                                        if ($status == 'menunggu') {
                                            echo '<span class="badge bg-warning text-dark">Menunggu</span>';
                                        } elseif ($status == 'dipanggil') {
                                            echo '<span class="badge bg-info">Dipanggil</span>';
                                        } elseif ($status == 'selesai') {
                                            echo '<span class="badge bg-success">Selesai</span>';
                                        } elseif ($status == 'batal') {
                                            echo '<span class="badge bg-danger">Batal</span>';
                                        } else {
                                            echo '<span class="badge bg-secondary">' . ucfirst($q->status) . '</span>';
                                        }
                                    ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($q->created_at)) ?></td>
                                <td>
                                    <a href="<?= site_url('queue/edit/'.$q->queue_id) ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= site_url('queue/delete/'.$q->queue_id) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus antrian ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Tidak ada antrian
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