<div class="container">
    <h3>Daftar Antrian</h3>

    <a href="<?= site_url('queue/create') ?>" class="btn btn-primary">Tambah Antrian</a>
    <br><br>

    <table class="table table-bordered">
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
            <?php if (!empty($queue)) : ?>
        <?php foreach ($queue as $q): ?>
            <tr>
                <td><?= $q->queue_id ?></td>
                <td><?= $q->reg_id ?></td>
                <td><?= $q->queue_number ?></td>
                <td><?= $q->status ?></td>
                <td><?= $q->created_at ?></td>
                <td>
                    <a href="<?= site_url('queue/edit/'.$q->queue_id) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= site_url('queue/delete/'.$q->queue_id) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">
                    TIDAK ADA ANTRIAN
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
