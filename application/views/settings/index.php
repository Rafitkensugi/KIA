<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Pengaturan Aplikasi</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Key</th>
            <th>Value</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($settings as $s): ?>
        <tr>
            <td><?= $s->setting_key ?></td>
            <td><?= $s->setting_value ?></td>
            <td>
                <a href="<?= site_url('settings/edit/'.$s->setting_key) ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
