<h2>Edit Obat</h2>

<form action="<?= base_url('index.php/drugs/update/'.$drug->drug_id) ?>" method="post">
    <input type="text" name="drug_name" value="<?= $drug->drug_name ?>" required><br><br>
    <input type="text" name="category" value="<?= $drug->category ?>"><br><br>
    <input type="text" name="unit" value="<?= $drug->unit ?>"><br><br>
    <input type="number" name="price" value="<?= $drug->price ?>" step="0.01"><br><br>
    <input type="date" name="expiration_date" value="<?= $drug->expiration_date ?>"><br><br>
    <input type="number" name="stock_minimum" value="<?= $drug->stock_minimum ?>"><br><br>

    <button type="submit">Update</button>
</form>
