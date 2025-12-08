<div class="container-fluid px-4">

    <h3 class="mt-4 mb-4">Detail Medical Record</h3>

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h5 class="mb-0">Medical Record #<?= $record->record_id ?></h5>
        </div>

        <div class="card-body p-4">

            <table class="table table-bordered">
                <tr>
                    <th width="25%">Record ID</th>
                    <td><?= $record->record_id ?></td>
                </tr>

                <tr>
                    <th>Registration ID</th>
                    <td><?= $record->reg_id ?></td>
                </tr>

                <tr>
                    <th>Height</th>
                    <td><?= $record->height ?> cm</td>
                </tr>

                <tr>
                    <th>Weight</th>
                    <td><?= $record->weight ?> kg</td>
                </tr>

                <tr>
                    <th>Blood Pressure</th>
                    <td><?= $record->blood_pressure ?></td>
                </tr>

                <tr>
                    <th>Pulse</th>
                    <td><?= $record->pulse ?> bpm</td>
                </tr>

                <tr>
                    <th>Temperature</th>
                    <td><?= $record->temperature ?> °C</td>
                </tr>

                <tr>
                    <th>Symptoms</th>
                    <td><?= nl2br($record->symptoms) ?></td>
                </tr>

                <tr>
                    <th>Notes</th>
                    <td><?= nl2br($record->notes) ?></td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td><?= $record->created_at ?></td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="<?= site_url('medical/records') ?>" 
                   class="btn btn-secondary">Back</a>

                <a href="<?= site_url('medical/records/edit/'.$record->record_id) ?>" 
                   class="btn btn-warning">Edit</a>

                <a href="<?= site_url('medical/records/delete/'.$record->record_id) ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Hapus record ini?')">Delete</a>

                <!--  PRINT  -->
                <a href="<?= site_url('medical/records/print/'.$record->record_id) ?>" 
                   class="btn btn-success" target="_blank">Print</a>
            </div>

        </div>
    </div>

</div>
