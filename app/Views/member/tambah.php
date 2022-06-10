<?= $this->extend('/layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <center>

                <h2 class="my-3">Pendaftaran Member Baru</h2>
            </center>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form action="/member/save" method="POST" enctype="multipart/form-data" >
                        <?= csrf_field() ?>
                        <div class="my-3">
                            <label for="nomor-membership" class="form-label" style="font-size: 20px; color: black;">Nomor Registrasi</label>
                            <input type="text" id="nomor-membership" value="<?= old('nomor-membership') ?>" class="form-control <?= ($validation->hasError('nomor-membership')) ? "is-invalid" : "" ?>" name="nomor-membership" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomor-membership') ?>
                                </div>
                            <div id="nomor-membership" class="form-text">(Contoh : 1307021106220001 (tanggal lahir + tanggal sekarang + nomor urut pendaftaran))</div>
                        </div>
                        <div class="my-3">
                            <label for="nama" class="form-label" style="font-size: 20px; color: black;">Nama</label>
                            <input type="text" id="nama" value="<?= old('nama') ?>" class="form-control <?= ($validation->hasError('nama')) ? "is-invalid" : "" ?>" 
                            name="nama" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="tanggal-lahir" class="form-label" style="font-size: 20px; color: black;">Tanggal Lahir</label>
                            <input type="date" id="tanggal-lahir" value="<?= old('tanggal-lahir') ?>" class="form-control <?= ($validation->hasError('tanggal-lahir')) ? "is-invalid" : "" ?>" 
                            name="tanggal-lahir" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal-lahir') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="email" class="form-label" style="font-size: 20px; color: black;">Email</label>
                            <input type="email" id="email" value="<?= old('email') ?>" class="form-control <?= ($validation->hasError('email')) ? "is-invalid" : "" ?>" 
                            name="email" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="telepon" class="form-label" style="font-size: 20px; color: black;">Telepon</label>
                            <input type="text" id="telepon" value="<?= old('telepon') ?>" class="form-control <?= ($validation->hasError('telepon')) ? "is-invalid" : "" ?>" 
                            name="telepon" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telepon') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="alamat" class="form-label" style="font-size: 20px; color: black;">Alamat</label>
                            <input type="text" id="alamat" value="<?= old('alamat') ?>" class="form-control <?= ($validation->hasError('alamat')) ? "is-invalid" : "" ?>" 
                            name="alamat" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="img" class="form-label" style="font-size: 20px; color: black;">Pilih Gambar</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="/images/default.png" class="img-thumbnail img-preview" >
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control <?= ($validation->hasError('img')) ? "is-invalid" : "" ?>" type="file" id="img" name="img" onchange="previewImage()">  
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('img') ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>