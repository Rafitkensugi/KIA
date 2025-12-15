<h2>Riwayat Stok Obat</h2>

<a href="<?= base_url('index.php/stock/create') ?>">Tambah Stok</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Obat</th>
        <th>Tipe</th>
        <th>Jumlah</th>
        <th>Supplier</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; foreach ($stocks as $s): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $s->date ?></td>
        <td><?= $s->drug_name ?></td>
        <td>
            <?= ($s->type == 'in') ? 'Masuk' : 'Keluar' ?>
        </td>
        <td><?= $s->quantity ?></td>
        <td><?= $s->supplier ?></td>
        <td>
            <a href="<?= base_url('index.php/stock/detail/'.$s->stock_id) ?>">Detail</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
