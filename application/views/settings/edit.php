<!DOCTYPE html>
<html>
<head>
    <title>Edit Setting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Edit Setting</h3>

<form action="<?= site_url('settings/update') ?>" method="post">

    <input type="hidden" name="setting_key" value="<?= $setting->setting_key ?>">

    <div class="mb-3">
        <label>Key</label>
        <input type="text" class="form-control" value="<?= $setting->setting_key ?>" disabled>
    </div>

    <div class="mb-3">
        <label>Value</label>
        <textarea name="setting_value" class="form-control" rows="4"><?= $setting->setting_value ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= site_url('settings') ?>" class="btn btn-secondary">Kembali</a>

</form>

</body>
</html>
