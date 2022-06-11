<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<!-- <div class="container mt-3"> -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <h3>Riwayat Peminjaman</h3>

                </div>
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan nomor peminjaman" name="keyword">
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
                <th scope="col">Judul</th>
                <th scope="col">Nomor Membership</th>
                <th scope="col">Noreg Koleksi</th>
                <th scope="col">Admin</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Batas Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
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
                        <td><?= $b['nomor_peminjaman'] ?></td>
                        <td><a href="/biblio/detail/<?= $b['buku_id'] ?>"><?= $judul[$j]?></td>
                        <td><?= $members[$j] ?></td>
                        <td><?= $koleksis[$j] ?></td>
                        <td><?= $admin ?></td>
                        <td><?= $b['tanggal_pinjam'] ?></td>
                        <td><?= $b['batas_kembali'] ?></td>
                        <td><?= $b['status'] ?></td>
                        <td> <?= $b['status'] == 'Dalam Peminjaman' ? "<a href='/pengembalian/form_pengembalian/" . $b['peminjaman_id'] . "' class='btn btn-success'>Pengembalian</a>" : '' ?> </td>
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
<!-- </div> -->

<?= $this->endSection(); ?>