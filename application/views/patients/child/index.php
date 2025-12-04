<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Data Anak</h3>
        <a href="<?= site_url('patients/child/create') ?>" class="btn btn-primary">
            + Data Anak
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama Anak</th>
                        <th>Ibu</th>
                        <th>Gender</th>
                        <th>Tgl Lahir</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($children as $c): ?>
                    <tr>
                        <td><?= $c->child_id ?></td>
                        <td><?= $c->nik ?></td>
                        <td><?= $c->name ?></td>
                        <td><?= $c->mother_name ?></td>
                        <td><?= $c->gender ?></td>
                        <td><?= $c->birth_date ?></td>
                        <td>
                            <a href="<?= site_url('patients/child/detail/'.$c->child_id) ?>" class="btn btn-sm btn-info text-white">Detail</a>
                            <a href="<?= site_url('patients/child/edit/'.$c->child_id) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= site_url('patients/child/delete/'.$c->child_id) ?>" 
                               onclick="return confirm('Yakin ingin menghapus?')"
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
