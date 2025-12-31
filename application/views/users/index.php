<!DOCTYPE html>
<html>
<head>
    <title>Data Users</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>

<h2>Data Users</h2>

<?php if ($this->session->flashdata('message')): ?>
    <p style="color:green;">
        <?= $this->session->flashdata('message'); ?>
    </p>
<?php endif; ?>

<a href="<?= site_url('users/create'); ?>">+ Tambah User</a>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($users)): ?>
        <?php $no = 1; foreach ($users as $user): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= html_escape($user->name); ?></td>
            <td><?= html_escape($user->email); ?></td>
            <td><?= html_escape($user->role_name); ?></td>
            <td><?= $user->status == 1 ? 'Aktif' : 'Nonaktif'; ?></td>
            <td>
                <a href="<?= site_url('users/edit/'.$user->id); ?>">Edit</a> |
                <a href="<?= site_url('users/delete/'.$user->id); ?>"
                   onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" align="center">Data belum ada</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
