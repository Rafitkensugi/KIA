<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">

    <h3 class="fw-bold mb-3">Detail Data Ibu</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">ID Ibu</th>
                    <td><?= $mother->mother_id ?></td>
                </tr>

                <tr>
                    <th>NIK</th>
                    <td><?= $mother->nik ?></td>
                </tr>

                <tr>
                    <th>Nama Ibu</th>
                    <td><?= $mother->name ?></td>
                </tr>

                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?= $mother->birth_date ?></td>
                </tr>

                <tr>
                    <th>No. Telepon</th>
                    <td><?= $mother->phone ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td><?= $mother->address ?></td>
                </tr>

                <tr>
                    <th>Golongan Darah</th>
                    <td><?= $mother->blood_type ?></td>
                </tr>

                <tr>
                    <th>Alergi</th>
                    <td><?= $mother->alergies ?></td>
                </tr>

                <tr>
                    <th>Riwayat Medis</th>
                    <td><?= $mother->medical_history ?></td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td><?= $mother->created_at ?></td>
                </tr>

            </table>

            <div class="mt-3">
                <a href="<?= site_url('patients/mother/edit/'.$mother->mother_id) ?>" class="btn btn-warning text-dark">Edit</a>
                <a href="<?= site_url('patients/mother') ?>" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
