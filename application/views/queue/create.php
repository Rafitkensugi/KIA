<div class="container">
    <h3>Tambah Antrian</h3>

    <form action="<?= site_url('queue/store') ?>" method="post">
        <div class="form-group">
            <label>Reg ID</label>
            <input type="number" name="reg_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label>No Antrian</label>
            <input type="number" name="queue_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="waiting">Waiting</option>
                <option value="processing">Processing</option>
                <option value="done">Done</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= site_url('queue') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>