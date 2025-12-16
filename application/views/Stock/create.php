<h2>Tambah Stok Obat</h2>

<form action="<?= base_url('index.php/stock/store') ?>" method="post">

    <label>Obat</label><br>
    <select name="drug_id" required>
        <option value="">-- Pilih Obat --</option>
        <?php foreach ($drugs as $d): ?>
            <option value="<?= $d->drug_id ?>">
                <?= $d->drug_name ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Tipe</label><br>
    <select name="type" required>
        <option value="in">Masuk</option>
        <option value="out">Keluar</option>
    </select>
    <br><br>

    <label>Jumlah</label><br>
    <input type="number" name="quantity" min="1" required>
    <br><br>

    <label>Supplier</label><br>
    <input type="text" name="supplier">
    <br><br>

    <label>No Batch</label><br>
    <input type="text" name="batch_number">
    <br><br>

    <label>Tanggal</label><br>
    <input type="date" name="date" required>
    <br><br>

    <label>Catatan</label><br>
    <textarea name="notes"></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>

<a href="<?= base_url('index.php/stock') ?>">Kembali</a>
