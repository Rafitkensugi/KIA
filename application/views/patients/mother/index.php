<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Data Ibu</h3>
        <a href="<?= site_url('patients/mother/create') ?>" class="btn btn-primary">
            + Tambah Ibu
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama Ibu</th>
                        <th>Tgl Lahir</th>
                        <th>No. Telepon</th>
                        <th>Golongan Darah</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($mothers as $m): ?>
                    <tr>
                        <td><?= $m->mother_id ?></td>
                        <td><?= $m->nik ?></td>
                        <td><?= $m->name ?></td>
                        <td><?= $m->birth_date ?></td>
                        <td><?= $m->phone ?></td>
                        <td><?= $m->blood_type ?></td>
                        <td>
                            <a href="<?= site_url('patients/mother/detail/'.$m->mother_id) ?>" 
                               class="btn btn-sm btn-info text-white">Detail</a>
                            
                            <a href="<?= site_url('patients/mother/edit/'.$m->mother_id) ?>" 
                               class="btn btn-sm btn-warning">Edit</a>
                            
                            <a href="<?= site_url('patients/mother/delete/'.$m->mother_id) ?>"
                               onclick="return confirm('Yakin ingin menghapus data ini?')"
                               class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
