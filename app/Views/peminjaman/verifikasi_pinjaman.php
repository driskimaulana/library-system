<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Detail Member</h3>
        </div>

    </div>
    <div class="row">
        
        <div class="col-md-3">
            <img src="/images/books/<?= $members['img'] ?>" width="200px" alt="">
        </div>
        <div class="col-md-9">
            <h3><?= $members['nama'] ?></h3>
            <div class="row">
                <div class="col-md-4">
                    <p>Nomor Membership</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['nomor_membership'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Tanggal Lahir</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['tanggal_lahir'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Email</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['email'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Telepon</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['telepon'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Alamat</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['alamat'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Status Membership</p>
                </div>
                <div class="col-md-7 mx-3">
                    <p><?= $members['status_membership'] ?></p>
                </div>
            </div>
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <h3>Riwayat Peminjaman</h3>

                </div>

            </div>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Nomor Membership</th>
                <th scope="col">Noreg Koleksi</th>
                <th scope="col">Admin</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Batas Kembali</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                $j = 0;
                foreach ($peminjamans as $b) {
                    ?>

                    <tr>
                        <th scope="row"><?= ++$i + 10 * ($currentPage - 1) ?></th>
                        <td><?= $p_judul[$j] ?></td>
                        <td><?= $p_member[$j] ?></td>
                        <td><?= $p_koleksi[$j] ?></td>
                        <td><?= $admin->nama ?></td>
                        <td><?= $b['tanggal_pinjam'] ?></td>
                        <td><?= $b['batas_kembali'] ?></td>
                        <td><?= $b['status'] ?></td>
                    </tr>

                    <?php
                    $j++;
                }

                ?>
            </tbody>
            </table>
            <?= $pager->links('peminjaman', 'my_pagination') ?>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Detail Buku</h3>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <img src="/images/<?= $biblios['img'] ?>" alt="">
        </div>
        <div class="col-md-9">
            <h3><?= $biblios['title'] ?></h3>
            <div class="row">
                <div class="col-md-4">
                    <p>Nomor Koleksi</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $koleksis['nomor_registrasi'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Penulis</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['authors'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Rating by Goodreads.com</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['average_rating'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>ISBN</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['isbn'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Bahasa</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['language_code'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Jumlah Halaman</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['num_pages'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Banyak Rating di Goodreads.com</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['ratings_count'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Tanggal Publish</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['publication_date'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Penerbit</p>
                </div>
                <div class="col-md-4 mx-3">
                    <p><?= $biblios['publisher'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-12">
            <center>

                <h2 class="my-3">Detail Peminjaman</h2>
            </center>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <form action="/peminjaman/save" method="POST" enctype="multipart/form-data" >
                        <?= csrf_field() ?>
                        <div class="my-3">
                            <label for="member" class="form-label" style="font-size: 20px; color: black;">Peminjam</label>
                            <input type="text" id="member" value="<?= $members['nama'] ?>" class="form-control <?= ($validation->hasError('member')) ? "is-invalid" : "" ?>" name="member" disabled>
                            <input type="hidden" id="hidden" value="<?= $members['member_id'] ?>" class="form-control <?= ($validation->hasError('member')) ? "is-invalid" : "" ?>" name="member-id" >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('member') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="buku" class="form-label" style="font-size: 20px; color: black;">Buku</label>
                            <input type="text" id="buku" value="<?= $biblios['title'] ?>" class="form-control <?= ($validation->hasError('buku')) ? "is-invalid" : "" ?>" name="buku" disabled>
                            <input type="hidden" id="buku" value="<?= $biblios['buku_id'] ?>" class="form-control <?= ($validation->hasError('buku')) ? "is-invalid" : "" ?>" name="buku-id" >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('buku') ?>
                                </div>
                        </div>
                        
                        <div class="my-3">
                            <label for="koleksi" class="form-label" style="font-size: 20px; color: black;">Nomor Registrasi Buku</label>
                            <input type="text" id="koleksi" value="<?= $koleksis['nomor_registrasi'] ?>" class="form-control <?= ($validation->hasError('buku')) ? "is-invalid" : "" ?>" name="koleksi" disabled>
                            <input type="hidden" id="koleksi" value="<?= $koleksis['koleksi_id'] ?>" class="form-control <?= ($validation->hasError('buku')) ? "is-invalid" : "" ?>" name="koleksi-id" >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('buku') ?>
                                </div>
                        </div>

                        <div class="my-3">
                            <label for="admin" class="form-label" style="font-size: 20px; color: black;">Admin</label>
                            <input type="text" id="admin" value="<?= $admin->nama ?>" class="form-control <?= ($validation->hasError('admin')) ? "is-invalid" : "" ?>" name="admin" disabled>
                            <input type="hidden" id="admin" value="<?= $admin->id ?>" class="form-control <?= ($validation->hasError('admin')) ? "is-invalid" : "" ?>" name="admin-id" >
                                <div class="invalid-feedback">
                                    <?= $validation->getError('buku') ?>
                                </div>
                        </div>

                        <div class="my-3">
                            <label for="nomor-peminjaman" class="form-label" style="font-size: 20px; color: black;">Nomor Peminjaman</label>
                            <input type="text" id="nomor-peminjaman" value="" class="form-control <?= ($validation->hasError('nomor-peminjaman')) ? "is-invalid" : "" ?>" name="nomor-peminjaman" required>
                            <div id="nomormember" class="form-text">(Contoh : 1106220001 (Tanggal Pinjam + Nomor urut pinjam))</div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nomor-peminjaman') ?>
                                </div>
                        </div>
                        
                        
                        
                        <div class="my-3">
                            <label for="tanggal-pinjam" class="form-label" style="font-size: 20px; color: black;">Tanggal Pinjam</label>
                            <input type="date" id="tanggal-pinjam" value="" class="form-control <?= ($validation->hasError('tanggal-pinjam')) ? "is-invalid" : "" ?>" name="tanggal-pinjam"  required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal-pinjam') ?>
                                </div>
                        </div>
                        <div class="my-3">
                            <label for="batas-kembali" class="form-label" style="font-size: 20px; color: black;">Batas Kembali</label>
                            <input type="date" id="batas-kembali" value="<?= old('batas-kembali') ?>" class="form-control <?= ($validation->hasError('batas-kembali')) ? "is-invalid" : "" ?>" name="batas-kembali" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('batas-kembali') ?>
                                </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-2">Konfirmasi Peminjaman</button>
                        <a href="/koleksi/index" class="btn btn-warning my-2">Tolak Peminjaman</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
