<h2>Detail Obat</h2>

<p><b>Nama Obat:</b> <?= $drug->drug_name ?></p>
<p><b>Kategori:</b> <?= $drug->category ?></p>
<p><b>Satuan:</b> <?= $drug->unit ?></p>
<p><b>Harga:</b> <?= number_format($drug->price, 2) ?></p>
<p><b>Kadaluarsa:</b> <?= $drug->expiration_date ?></p>
<p><b>Stok Minimum:</b> <?= $drug->stock_minimum ?></p>
<p><b>Dibuat:</b> <?= $drug->created_at ?></p>

<a href="<?= base_url('index.php/drugs') ?>">Kembali</a>
