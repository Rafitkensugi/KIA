<div class="container-fluid px-4">

    <h3 class="mt-4 mb-4">Medical Records</h3>

    <a href="<?= site_url('medical/records/create'); ?>" class="btn btn-primary mb-3">
        + Add New
    </a>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>BP</th>
                        <th>Pulse</th>
                        <th width="25%">Action</th>
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
                                   class="btn btn-info btn-sm text-white">Detail</a>

                                <a href="<?= site_url('medical/records/edit/'.$r->record_id) ?>" 
                                   class="btn btn-warning btn-sm">Edit</a>

                                <a href="<?= site_url('medical/records/delete/'.$r->record_id) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data medical record.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
