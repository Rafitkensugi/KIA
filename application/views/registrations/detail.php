<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="mb-3">
        <h3 class="fw-bold">Detail Registrasi</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th width="220">Kode Registrasi</th>
                        <td><span class="badge bg-primary"><?= $reg->reg_code ?></span></td>
                    </tr>
                    <tr>
                        <th>Tipe Pasien</th>
                        <td>
                            <?php if (strtolower($reg->patient_type) == 'baru'): ?>
                                <span class="badge bg-info">Baru</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Lama</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <td><strong><?= $reg->patient_name ?></strong></td>
                    </tr>
                    <tr>
                        <th>Tanggal Kunjungan</th>
                        <td><?= date('d/m/Y', strtotime($reg->visit_date)) ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Layanan</th>
                        <td><?= $reg->service_type ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?php 
                                $status = strtolower($reg->status);
                                if ($status == 'aktif') {
                                    echo '<span class="badge bg-success">Aktif</span>';
                                } elseif ($status == 'selesai') {
                                    echo '<span class="badge bg-secondary">Selesai</span>';
                                } elseif ($status == 'batal') {
                                    echo '<span class="badge bg-danger">Batal</span>';
                                } else {
                                    echo '<span class="badge bg-primary">' . ucfirst($reg->status) . '</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td><?= date('d/m/Y H:i:s', strtotime($reg->created_at)) ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex gap-2 mt-4">
                <a href="<?= site_url('registrations'); ?>" class="btn btn-secondary">Kembali</a>
                <a href="<?= site_url('registrations/print/'.$reg->reg_id); ?>" class="btn btn-success" target="_blank">Print</a>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>