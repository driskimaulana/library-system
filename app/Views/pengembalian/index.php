<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<!-- <div class="container mt-3"> -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <h3>Pengembalian</h3>

                </div>
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan keyword ..." name="keyword">
                            <button class="btn btn-outline-secondary" class="btn btn-primary" type=submit" id="submit" name="submit">Cari</button>
                        </div>

                    </form>
                </div>

            </div>
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Peminjaman</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Admin</th>
                <th scope="col">Kondisi Buku</th>
                <th scope="col">Denda</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                $j = 0;
                foreach ($pengembalians as $b) {
                    ?>

                    <tr>
                        <th scope="row"><?= ++$i + 10 * ($currentPage - 1) ?></th>
                        <td><?= $b['nomor_peminjaman'] ?></td>
                        <td><a href="/biblio/detail/<?= $b['buku_id'] ?>"><?= $judul[$j]?></td>
                        <td><?= $admin->nama ?></td>
                        <td><?= $b['kondisi_buku'] ?></td>
                        <td><?= $b['denda'] ?></td>
                        <td><?= $b['tanggal_kembali'] ?></td>
                        <td><?= $b['catatan'] ?></td>
                    </tr>

                    <?php
                    $j++;
                }

                ?>
            </tbody>
            </table>
            <?= $pager->links('pengembalian', 'my_pagination') ?>
        </div>
    </div>
<!-- </div> -->

<?= $this->endSection(); ?>