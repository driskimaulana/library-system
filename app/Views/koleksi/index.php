<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<!-- <div class="container mt-3"> -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <a href="" class="btn btn-primary mb-3">Tambah Data Biblio</a>
                    <h3>Daftar Biblio</h3>

                </div>
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword" name="keyword">
                            <button class="btn btn-outline-secondary" class="btn btn-primary" type=submit" id="submit" name="submit">Cari</button>
                        </div>

                    </form>
                </div>

            </div>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Nomor Registrasi</th>
                <th scope="col">Lokasi Koleksi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                $j = 0;
                foreach ($koleksis as $k) {
                    ?>

                    <tr>
                        <th scope="row"><?= ++$i + 10 * ($currentPage - 1) ?></th>
                        <td><a href="/biblio/detail/<?= $k['buku_id'] ?>"><?= $judul[$j]?></a></td>
                        <td><?= $k['nomor_registrasi'] ?></td>
                        <td><?= $k['lokasi'] ?></td>
                        <td><?= $k['status'] ?></td>
                        
                        <td><a href="/koleksi/pinjam/<?= $k['koleksi_id'] ?>" class="btn btn-success">Pinjam</a></td>
                    </tr>

                    <?php
                    $j++;
                }

                ?>
            </tbody>
            </table>
            <?= $pager->links('biblio_koleksi', 'my_pagination') ?>
        </div>
    </div>
<!-- </div> -->

<?= $this->endSection(); ?>