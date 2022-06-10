<?= $this->extend('/layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>

                <h2 class="my-3">Tambah Koleksi Buku</h2>
            </center>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form action="/koleksi/save" method="POST" enctype="multipart/form-data" >
                        <?= csrf_field() ?>
                        <div class="my-3">
                            <label for="nomorregistrasi" class="form-label" style="font-size: 20px; color: black;">Nomor Registrasi</label>
                            <input type="text" id="nomorregistrasi" value="<?= $koleksi['nomor_registrasi'] ?>" class="form-control <?= ($validation->hasError('nomorregistrasi')) ? "is-invalid" : "" ?>" name="nomorregistrasi" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomorregistrasi') ?>
                                </div>
                            <div id="nomorregistrasi" class="form-text">(Contoh : 202210060001)</div>
                        </div>
                        <div class="my-3">
                            <label for="nomormember" class="form-label" style="font-size: 20px; color: black;">Nomor Member</label>
                            <input type="text" id="nomormember" value="<?= old('nomormember') ?>" class="form-control <?= ($validation->hasError('nomormember')) ? "is-invalid" : "" ?>" name="nomormember" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomormember') ?>
                                </div>
                            <div id="nomormember" class="form-text">(Contoh : 202210060001)</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>