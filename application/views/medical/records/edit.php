<div class="container-fluid px-4">

    <h3 class="mt-4 mb-4">Edit Medical Record</h3>

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-warning text-white rounded-top-4">
            <h5 class="mb-0">Edit Record #<?= $record->record_id ?></h5>
        </div>

        <div class="card-body p-4">

            <form action="<?= site_url('medical/records/update/'.$record->record_id) ?>" method="post">

                <div class="mb-3">
                    <label class="form-label">Registration ID</label>
                    <input type="number" name="reg_id" 
                           class="form-control" 
                           value="<?= $record->reg_id ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Height (cm)</label>
                    <input type="number" name="height" 
                           class="form-control" 
                           value="<?= $record->height ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Weight (kg)</label>
                    <input type="number" name="weight" 
                           class="form-control" 
                           value="<?= $record->weight ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Blood Pressure</label>
                    <input type="text" name="blood_pressure" 
                           class="form-control" 
                           value="<?= $record->blood_pressure ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pulse</label>
                    <input type="number" name="pulse" 
                           class="form-control" 
                           value="<?= $record->pulse ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Temperature (°C)</label>
                    <input type="number" step="0.1" 
                           name="temperature" 
                           class="form-control" 
                           value="<?= $record->temperature ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Symptoms</label>
                    <textarea name="symptoms" class="form-control" rows="3"><?= $record->symptoms ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="3"><?= $record->notes ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= site_url('medical/records') ?>" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </div>

</div>
