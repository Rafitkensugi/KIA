<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Medical Record - KIA System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .page-header h3 {
            margin: 0;
            font-size: 22px;
            color: #2c3e50;
        }

        .card {
            border: none;
            border-radius: 8px;
        }

        .table th {
            background: #f8f9fa;
            width: 30%;
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 15px;
            }
            .table th {
                width: 40%;
            }
        }

        
    </style>
</head>
<body>


    <div class="main">

        <div class="page-header">
            <h3>Detail Medical Record #<?= $record->record_id ?></h3>
        </div>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered align-middle">
                    <tr>
                        <th>Record ID</th>
                        <td><?= $record->record_id ?></td>
                    </tr>

                    <tr>
                        <th>Registration ID</th>
                        <td><?= $record->reg_id ?></td>
                    </tr>

                    <tr>
                        <th>Tinggi Badan</th>
                        <td><?= $record->height ?> cm</td>
                    </tr>

                    <tr>
                        <th>Berat Badan</th>
                        <td><?= $record->weight ?> kg</td>
                    </tr>

                    <tr>
                        <th>Tekanan Darah</th>
                        <td><?= $record->blood_pressure ?></td>
                    </tr>

                    <tr>
                        <th>Denyut Nadi</th>
                        <td><?= $record->pulse ?> bpm</td>
                    </tr>

                    <tr>
                        <th>Suhu Tubuh</th>
                        <td><?= $record->temperature ?> °C</td>
                    </tr>

                    <tr>
                        <th>Gejala</th>
                        <td><?= $record->symptoms ? nl2br($record->symptoms) : '-' ?></td>
                    </tr>

                    <tr>
                        <th>Catatan</th>
                        <td><?= $record->notes ? nl2br($record->notes) : '-' ?></td>
                    </tr>

                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td><?= date('d/m/Y H:i', strtotime($record->created_at)) ?></td>
                    </tr>
                </table>

                <div class="mt-3 d-flex gap-2">
                    <a href="<?= site_url('medical/records') ?>" 
                       class="btn btn-secondary">Kembali</a>

                    <a href="<?= site_url('medical/records/edit/'.$record->record_id) ?>" 
                       class="btn btn-warning">Edit</a>

                    <a href="<?= site_url('medical/records/delete/'.$record->record_id) ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus record ini?')">Hapus</a>

                    <a href="<?= site_url('medical/records/print/'.$record->record_id) ?>" 
                       class="btn btn-success" target="_blank">Print</a>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>