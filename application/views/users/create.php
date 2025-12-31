<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>

<h2>Tambah User</h2>

<?= validation_errors('<p style="color:red;">', '</p>'); ?>

<form method="post" action="<?= site_url('users/create'); ?>">
    <p>
        <label>Nama</label><br>
        <input type="text" name="name" value="<?= set_value('name'); ?>">
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="<?= set_value('email'); ?>">
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password">
    </p>

    <p>
        <label>Role</label><br>
        <select name="role_id">
            <option value="">-- Pilih Role --</option>
            <?php foreach ($roles as $id => $name): ?>
                <option value="<?= $id; ?>" <?= set_select('role_id', $id); ?>>
                    <?= html_escape($name); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Status</label><br>
        <select name="status">
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
        </select>
    </p>

    <p>
        <button type="submit">Simpan</button>
        <a href="<?= site_url('users'); ?>">Kembali</a>
    </p>
</form>

</body>
</html>
