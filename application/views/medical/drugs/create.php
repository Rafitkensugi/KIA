<h2>Tambah Obat</h2>

<form action="<?= base_url('medical/drugs/store') ?>" method="post">
    <input type="text" name="drug_name" placeholder="Nama Obat" required><br><br>
    <input type="text" name="category" placeholder="Kategori"><br><br>
    <input type="text" name="unit" placeholder="Satuan"><br><br>
    <input type="number" name="price" placeholder="Harga" step="0.01"><br><br>
    <input type="date" name="expiration_date"><br><br>
    <input type="number" name="stock_minimum" placeholder="Stok Minimum"><br><br>

    <button type="submit">Simpan</button>
</form>
