<?= $this->extend('layout/header')?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 rounded-3">
                <div class="row g-0">
                    <!-- Foto Siswa -->
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                        <img src="/img/<?= esc($sekolah['foto']); ?>" 
                             class="img-fluid rounded" 
                             alt="<?= esc($sekolah['foto']); ?>">
                    </div>

                    <!-- Detail Siswa -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title fw-bold mb-2"><?= ($sekolah['nama']); ?></h4>
                            <p class="mb-1"><strong>Nama: </strong> <?= ($sekolah['nama']); ?></p>
                            <p class="mb-1"><strong>Jurusan: </strong> <?= ($sekolah['jurusan']); ?></p>
                            <p class="mb-3"><strong>Alamat: </strong> <?= ($sekolah['alamat']); ?></p>
                            <a href="/sekolah/ubah/<?= $sekolah['NIS'];?>" class="btn btn-warning">Ubah</a>

                                <form action="/sekolah/<?= $sekolah['NIS']; ?>" method="post" class="d-inline">
                                    <?= csrf_field();?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ini?')">Hapus</button>
                                </form>
                             <br><br>                          
                            </div>

                            <div class="mt-3">
                                <a href="/sekolah" class="text-decoration-none"> Kembali ke Daftar Siswa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection();?>