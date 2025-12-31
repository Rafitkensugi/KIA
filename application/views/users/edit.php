<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<?= validation_errors('<p style="color:red;">', '</p>'); ?>

<form method="post" action="<?= site_url('users/edit/'.$user->id); ?>">
    <p>
        <label>Nama</label><br>
        <input type="text" name="name"
               value="<?= set_value('name', $user->name); ?>">
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email"
               value="<?= set_value('email', $user->email); ?>">
    </p>

    <p>
        <label>Password (kosongkan jika tidak diubah)</label><br>
        <input type="password" name="password">
    </p>

    <p>
        <label>Role</label><br>
        <select name="role_id">
            <option value="">-- Pilih Role --</option>
            <?php foreach ($roles as $id => $name): ?>
                <option value="<?= $id; ?>"
                    <?= set_select('role_id', $id, $id == $user->role_id); ?>>
                    <?= html_escape($name); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Status</label><br>
        <select name="status">
            <option value="1" <?= $user->status == 1 ? 'selected' : ''; ?>>Aktif</option>
            <option value="0" <?= $user->status == 0 ? 'selected' : ''; ?>>Nonaktif</option>
        </select>
    </p>

    <p>
        <button type="submit">Update</button>
        <a href="<?= site_url('users'); ?>">Kembali</a>
    </p>
</form>

</body>
</html>
