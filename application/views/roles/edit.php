<!DOCTYPE html>
<html>
<head>
    <title>Edit Role</title>
</head>
<body>

<h2>Edit Role</h2>

<?= validation_errors('<p style="color:red;">', '</p>'); ?>

<form method="post" action="<?= site_url('roles/edit/'.$role->role_id); ?>">

    <p>
        <label>Role Name</label><br>
        <input type="text" name="role_name"
               value="<?= set_value('role_name', $role->role_name); ?>">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4"><?= set_value('description', $role->description); ?></textarea>
    </p>

    <p>
        <button type="submit">Update</button>
        <a href="<?= site_url('roles'); ?>">Kembali</a>
    </p>

</form>

</body>
</html>
