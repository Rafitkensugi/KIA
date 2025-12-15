<h2>Data Obat</h2>
<a href="<?= base_url('index.php/drugs/create') ?>">Tambah Obat</a>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; foreach ($drugs as $d): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d->drug_name ?></td>
        <td><?= $d->category ?></td>
        <td><?= number_format($d->price, 2) ?></td>
        <td>
            <a href="<?= base_url('index.php/drugs/detail/'.$d->drug_id) ?>">Detail</a> |
            <a href="<?= base_url('index.php/drugs/edit/'.$d->drug_id) ?>">Edit</a> |
            <a href="<?= base_url('index.php/drugs/delete/'.$d->drug_id) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
