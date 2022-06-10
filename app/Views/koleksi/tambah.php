<?= $this->extend('/layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>

                <h2 class="my-3">Tambah Koleksi Buku</h2>
                <h4><?= $biblio['title'] ?></h4>
            </center>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form action="/koleksi/save" method="POST" enctype="multipart/form-data" >
                        <?= csrf_field() ?>
                        <div class="my-3">
                            <label for="nomorregistrasi" class="form-label" style="font-size: 20px; color: black;">Nomor Registrasi</label>
                            <input type="text" id="nomorregistrasi" value="<?= old('nomorregistrasi') ?>" class="form-control <?= ($validation->hasError('nomorregistrasi')) ? "is-invalid" : "" ?>" name="nomorregistrasi" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomorregistrasi') ?>
                                </div>
                            <div id="nomorregistrasi" class="form-text">(Contoh : 202210060001)</div>
                        </div>
                        <div class="my-3">
                            <label for="lokasi" class="form-label" style="font-size: 20px; color: black;">Lokasi Koleksi</label>
                            <input type="text" id="lokasi" value="<?= old('lokasi') ?>" class="form-control <?= ($validation->hasError('lokasi')) ? "is-invalid" : "" ?>" name="lokasi" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lokasi') ?>
                                </div>
                            <div id="nomorregistrasi" class="form-text">(Contoh : L02R001 (Lantai 2 Rak 1))</div>
                        </div>
                        <input type="hidden" name="buku_id" value="<?=$biblio['buku_id']?>">   
                        
                        <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>