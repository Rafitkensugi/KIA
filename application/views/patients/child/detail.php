<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-4">

    <h3 class="fw-bold mb-3">Detail Data Anak</h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">ID Anak</th>
                    <td><?= $child->child_id ?></td>
                </tr>

                <tr>
                    <th>NIK Anak</th>
                    <td><?= $child->nik ?></td>
                </tr>

                <tr>
                    <th>Nama Anak</th>
                    <td><?= $child->name ?></td>
                </tr>

                <tr>
                    <th>Nama Ibu</th>
                    <td><?= $child->mother_name ?></td>
                </tr>

                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?= $child->birth_date ?></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td><?= $child->gender == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                </tr>

                <tr>
                    <th>Berat Lahir</th>
                    <td><?= $child->birth_weight ?> gram</td>
                </tr>

                <tr>
                    <th>Panjang Lahir</th>
                    <td><?= $child->birth_length ?> cm</td>
                </tr>

                <tr>
                    <th>Alergi</th>
                    <td><?= $child->alergies ?></td>
                </tr>

            </table>

            <div class="mt-3">
                <a href="<?= site_url('patients/child/edit/'.$child->child_id) ?>" class="btn btn-warning text-dark">Edit</a>
                <a href="<?= site_url('patients/child') ?>" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
