<!DOCTYPE html>
<html>
<head>
    <title>Print Medical Record</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        @media print {
            .no-print { display: none; }
            body { margin: 20px; }
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="text-center mb-4">
        <h3>Medical Record Report</h3>
        <p class="text-muted">Record ID: <?= $record->record_id ?></p>
        <hr>
    </div>

    <table class="table table-bordered">
        <tr>
            <th width="30%">Record ID</th>
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

    <div class="text-center mt-4 no-print">
        <button onclick="window.print()" class="btn btn-primary">Print</button>
        <a href="<?= site_url('medical/records/detail/'.$record->record_id) ?>" 
           class="btn btn-secondary">Back</a>
    </div>

</div>

</body>
</html>
