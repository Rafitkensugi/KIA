<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi Pasien - KIA System</title>
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
            <h3>Data Registrasi Pasien</h3>
            <a href="<?= site_url('registrations/create'); ?>" class="btn btn-primary">
                + Tambah Registrasi
            </a>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Tipe Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Jenis Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($registrations)): ?>
                            <?php foreach ($registrations as $r): ?>
                            <tr>
                                <td><strong><?= $r->reg_code ?></strong></td>
                                <td>
                                    <?php if (strtolower($r->patient_type) == 'baru'): ?>
                                        <span class="badge bg-info">Baru</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Lama</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $r->patient_name ?></td>
                                <td><?= date('d/m/Y', strtotime($r->visit_date)) ?></td>
                                <td><?= $r->service_type ?></td>
                                <td>
                                    <?php 
                                        $status = strtolower($r->status);
                                        if ($status == 'aktif') {
                                            echo '<span class="badge bg-success">Aktif</span>';
                                        } elseif ($status == 'selesai') {
                                            echo '<span class="badge bg-secondary">Selesai</span>';
                                        } elseif ($status == 'batal') {
                                            echo '<span class="badge bg-danger">Batal</span>';
                                        } else {
                                            echo '<span class="badge bg-primary">' . ucfirst($r->status) . '</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('registrations/detail/'.$r->reg_id); ?>" 
                                       class="btn btn-sm btn-info text-white">Detail</a>
                                    <a href="<?= site_url('registrations/edit/'.$r->reg_id); ?>" 
                                       class="btn btn-sm btn-warning">Edit</a>
                                    <?php if ($r->has_record): ?>
                                        <button class="btn btn-sm btn-secondary" disabled>Hapus</button>
                                    <?php else: ?>
                                        <a href="<?= site_url('registrations/delete/'.$r->reg_id); ?>"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')"
                                           class="btn btn-sm btn-danger">Hapus</a>
                                    <?php endif; ?>
                                    <a href="<?= site_url('registrations/print/'.$r->reg_id); ?>" 
                                       class="btn btn-sm btn-success text-white" 
                                       target="_blank">Print</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data registrasi
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