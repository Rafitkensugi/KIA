<!DOCTYPE html>
<html>
<head>
    <title>Data Roles</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Data Roles</h2>

<?php if ($this->session->flashdata('message')): ?>
    <p style="color:green;">
        <?= $this->session->flashdata('message'); ?>
    </p>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <p style="color:red;">
        <?= $this->session->flashdata('error'); ?>
    </p>
<?php endif; ?>

<a href="<?= site_url('roles/create'); ?>">+ Tambah Role</a>

<table>
    <tr>
        <th>No</th>
        <th>Role Name</th>
        <th>Description</th>
        <th>Aksi</th>
    </tr>

    <?php if (!empty($roles)): ?>
        <?php $no = 1; foreach ($roles as $role): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= html_escape($role->role_name); ?></td>
            <td><?= html_escape($role->description); ?></td>
            <td>
                <a href="<?= site_url('roles/edit/'.$role->role_id); ?>">Edit</a> |
                <a href="<?= site_url('roles/delete/'.$role->role_id); ?>"
                   onclick="return confirm('Yakin hapus role ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" align="center">Data role belum tersedia</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
