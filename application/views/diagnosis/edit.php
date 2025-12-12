<!DOCTYPE html>
<html>
<head>
    <title>Edit Diagnosis</title>
</head>
<body>

    <h2>Edit Diagnosis</h2>

    <form action="<?php echo site_url('medical/diagnosis/update/' . $item->diagnosis_id); ?>" method="post">

        <label>Record ID</label><br>
        <input type="text" name="record_id" value="<?php echo $item->record_id; ?>" required><br><br>

        <label>Kode ICD-10</label><br>
        <input type="text" name="icd10" value="<?php echo $item->icd10; ?>" required><br><br>

        <label>Nama Diagnosis</label><br>
        <input type="text" name="diagnosis_name" value="<?php echo $item->diagnosis_name; ?>" required><br><br>

        <label>Catatan</label><br>
        <textarea name="notes"><?php echo $item->notes; ?></textarea><br><br>

        <button type="submit">Update</button>
        <a href="<?php echo site_url('medical/diagnosis'); ?>">Kembali</a>

    </form>

</body>
</html>
