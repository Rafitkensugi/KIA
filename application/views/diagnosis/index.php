<!DOCTYPE html>
<html>
<head>
    <title>Data Diagnosis</title>
</head>
<body>

    <h2>Data Diagnosis</h2>

    <a href="<?php echo site_url('medical/diagnosis/create'); ?>">+ Tambah Diagnosis</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Record ID</th>
            <th>ICD-10</th>
            <th>Nama Diagnosis</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($diagnosis as $item): ?>
        <tr>
            <td><?php echo $item->diagnosis_id; ?></td>
            <td><?php echo $item->record_id; ?></td>
            <td><?php echo $item->icd10; ?></td>
            <td><?php echo $item->diagnosis_name; ?></td>
            <td><?php echo $item->notes; ?></td>
            <td>
                <a href="<?php echo site_url('medical/diagnosis/edit/' . $item->diagnosis_id); ?>">Edit</a> |
                <a href="<?php echo site_url('medical/diagnosis/delete/' . $item->diagnosis_id); ?>" 
                   onclick="return confirm('Yakin hapus data?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
