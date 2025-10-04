<?= $this->extend('layout/header')?>
<?=$this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3 class="mt-2">Form Tambah Data Siswa</h3>
        <form action="/sekolah/simpan" method="post" class="mt-4" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-group row">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" 
                           name="nama" autofocus
                           value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputJurusan" class="col-sm-2 col-form-label">JURUSAN</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="jurusan" value="<?= old('jurusan'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="alamat" value="<?= old('alamat'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="tahun_masuk" value="<?= old('tahun_masuk'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAsal_sekolah" class="col-sm-2 col-form-label">ASAL SEKOLAH</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="asal_sekolah" value="<?= old('asal_sekolah'); ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputNo_telepon" class="col-sm-2 col-form-label">NO TELEPON</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="no_telepon" value="<?= old('no_telepon'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputStatus" class="col-sm-2 col-form-label">STATUS</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="status" value="<?= old('status'); ?>">
                </div>
            </div>

            <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-4">
                <div class="custom-file">
                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>"
                id="foto" name="foto">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="customFile"></label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>


 <?= $this->endSection();?>