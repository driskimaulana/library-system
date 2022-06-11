<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<!-- <div class="container mt-3"> -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                    <center>
                
                        <h2 class="my-3">Detail Pengembalian</h2>
                    </center>

                    <form action="/pengembalian/save" method="POST" >
                        <?= csrf_field() ?>
                        <div class="my-3">
                            <label for="nomor-peminjaman" class="form-label" style="font-size: 20px; color: black;">Nomor Peminjaman</label>
                            <input type="text" id="nomor-peminjaman" value="<?= $peminjaman['nomor_peminjaman'] ?>" class="form-control <?= ($validation->hasError('nomor-peminjaman')) ? "is-invalid" : "" ?>" 
                            name="nomor-peminjaman" disabled>
                            <input type="hidden" id="nomor-peminjaman" value="<?= $peminjaman['peminjaman_id'] ?>" class="form-control <?= ($validation->hasError('nomor-peminjaman')) ? "is-invalid" : "" ?>" 
                            name="peminjaman-id">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomor-peminjaman') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="judul" class="form-label" style="font-size: 20px; color: black;">Judul Buku</label>
                            <input type="text" id="judul" value="<?= $biblio['title'] ?>" class="form-control <?= ($validation->hasError('judul')) ? "is-invalid" : "" ?>"
                            name="judul" disabled>
                            <input type="hidden" id="judul" value="<?= $biblio['buku_id'] ?>" class="form-control <?= ($validation->hasError('judul')) ? "is-invalid" : "" ?>" 
                            name="biblio-id">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul') ?>
                                </div>
                        </div>
                        
                        <div class="my-3">
                            <label for="admin" class="form-label" style="font-size: 20px; color: black;">Admin</label>
                            <input type="text" id="admin" value="<?= $admin->nama ?>" class="form-control <?= ($validation->hasError('admin')) ? "is-invalid" : "" ?>"
                            name="admin-nama" disabled>
                            <input type="hidden" id="admin" value="<?= $admin->id ?>" class="form-control <?= ($validation->hasError('admin')) ? "is-invalid" : "" ?>" 
                            name="admin-id">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('admin-nama') ?>
                                </div>
                        </div>
                        
                        <div class="my-3">
                            <label for="" class="form-label" style="font-size: 20px; color: black;">Kondisi Buku</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kondisi-buku" id="exampleRadios1" value="Baik" checked>
                                <label class="form-check-label" for="exampleRadios1" >
                                    Baik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kondisi-buku" id="exampleRadios2" value="Rusak">
                                <label class="form-check-label" for="exampleRadios2">
                                    Rusak
                                </label>
                            </div>
                        </div>

                        <div class="my-3">
                            <label for="denda" class="form-label" style="font-size: 20px; color: black;">Denda</label>
                            <input type="text" id="denda" value="<?= old('denda') ?>" class="form-control <?= ($validation->hasError('denda')) ? "is-invalid" : "" ?>"
                            name="denda">
                            <div class="invalid-feedback">
                                <?= $validation->getError('denda') ?>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="tanggal-kembali" class="form-label" style="font-size: 20px; color: black;">Tanggal Kembali</label>
                            <input type="date" id="tanggal-kembali" value="<?= old('tanggal-kembali') ?>" class="form-control <?= ($validation->hasError('tanggal-kembali')) ? "is-invalid" : "" ?>"
                            name="tanggal-kembali">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggal-kembali') ?>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="catatan" class="form-label" style="font-size: 20px; color: black;">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3" <?= ($validation->hasError('catatan')) ? "is-invalid" : "" ?>></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('catatan') ?>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary mt-2">Konfirmasi Pengembalian</button>
                    </form>
                </div>
            </div>
<!-- </div> -->

<?= $this->endSection(); ?>