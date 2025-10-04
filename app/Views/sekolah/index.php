<?= $this->extend('layout/header')?>
<?=$this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Laporan Data Siswa</h1>
            <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Masukkan Pencarian Data Siswa" name="cari">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
            </div>
            </form>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-succes" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>
            <a href="/sekolah/tambah" class="btn btn-primary">Tambah Data Siswa</a>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">ASAL SEKOLAH</th>
                    <th scope="col">NO TELEPON</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">Foto</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1 + (2*($current-1));
                    foreach ($sekolah as $b):
                    ?>
                    <tr>
                    <th scope="row"><?=$i++ ?></th>
                    <td><?=$b['NIS'];?></td>
                    <td><?=$b['nama'];?></td>
                    <td><?=$b['jurusan'];?></td>
                    <td><?=$b['alamat'];?></td>
                    <td><?=$b['tahun_masuk'];?></td>
                    <td><?=$b['asal_sekolah'];?></td>
                    <td><?=$b['no_telepon'];?></td>
                    <td><?=$b['status'];?></td>
                    <td><img src="<?= base_url('/img/') . $b['foto'];?>"alt="" width="75"></td>
                    <td><a href="/sekolah/<?=$b['NIS']; ?>" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?= $pager->links('sekolah', 'page_sekolah');?>
    <?= $this->endSection();?>