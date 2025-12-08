<div class="container">
    <h3>Edit Antrian</h3>

    <form action="<?= site_url('queue/update/'.$queue->queue_id) ?>" method="post">

        <div class="form-group">
            <label>Reg ID</label>
            <input type="number" name="reg_id" class="form-control"
                   value="<?= $queue->reg_id ?>" required>
        </div>

        <div class="form-group">
            <label>No Antrian</label>
            <input type="number" name="queue_number" class="form-control"
                   value="<?= $queue->queue_number ?>" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="waiting"    <?= $queue->status == 'waiting' ? 'selected' : '' ?>>Waiting</option>
                <option value="processing" <?= $queue->status == 'processing' ? 'selected' : '' ?>>Processing</option>
                <option value="done"       <?= $queue->status == 'done' ? 'selected' : '' ?>>Done</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= site_url('queue') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
