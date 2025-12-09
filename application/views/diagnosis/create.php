<!DOCTYPE html>
<html>
<head>
    <title>Tambah Diagnosis</title>
</head>
<body>

    <h2>Tambah Diagnosis</h2>

    <form action="<?php echo site_url('medical/diagnosis/store'); ?>" method="post">

        <label>Record ID</label><br>
        <input type="text" name="record_id" required><br><br>

        <label>Kode ICD-10</label><br>
        <input type="text" name="icd10" required><br><br>

        <label>Nama Diagnosis</label><br>
        <input type="text" name="diagnosis_name" required><br><br>

        <label>Catatan</label><br>
        <textarea name="notes"></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="<?php echo site_url('medical/diagnosis'); ?>">Kembali</a>

    </form>

</body>
</html>
