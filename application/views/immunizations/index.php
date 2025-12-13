<!DOCTYPE html>
<html>
<head>
  <title>Immunizations</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container-fluid px-4">

    <h3 class="mt-4 mb-4">Immunization Records</h3>

    <a href="<?= site_url('immunizations/add'); ?>" class="btn btn-primary mb-3">
        + Add New
    </a>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Child ID</th>
                        <th>Record ID</th>
                        <th>Vaccine</th>
                        <th>Immunization Date</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($immunizations)): ?>
                        <?php foreach ($immunizations as $r): ?>
                        <tr>
                            <td><?= $r->immun_id ?></td>
                            <td><?= $r->child_id ?></td>
                            <td><?= $r->record_id ?></td>
                            <td><?= $r->vaccine_name ?></td>
                            <td><?= $r->immunization_date ?></td>

                            <td>
                                <a href="<?= site_url('immunizations/view/'.$r->immun_id) ?>" 
                                   class="btn btn-info btn-sm text-white">Detail</a>

                                <a href="<?= site_url('immunizations/edit/'.$r->immun_id) ?>" 
                                   class="btn btn-warning btn-sm">Edit</a>

                                <a href="<?= site_url('immunizations/delete/'.$r->immun_id) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data imunisasi.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>
