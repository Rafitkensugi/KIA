<h2>Detail Stok Obat</h2>

<p><b>Nama Obat:</b> <?= $stock->drug_name ?></p>
<p><b>Tanggal:</b> <?= $stock->date ?></p>
<p><b>Tipe:</b> <?= ($stock->type == 'in') ? 'Masuk' : 'Keluar' ?></p>
<p><b>Jumlah:</b> <?= $stock->quantity ?></p>
<p><b>Supplier:</b> <?= $stock->supplier ?></p>
<p><b>No Batch:</b> <?= $stock->batch_number ?></p>
<p><b>Catatan:</b><br><?= nl2br($stock->notes) ?></p>

<a href="<?= base_url('index.php/stock') ?>">Kembali</a>
