<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>

<!-- <div class="container mt-3"> -->
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-6">
                    <a href="/member/tambah/" class="btn btn-primary mb-3">Tambah Data Member</a>
                    <h3>Daftar Member</h3>

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
                <th scope="col">Nomor Membership</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status Membership</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                foreach ($members as $m) {
                    ?>

                    <tr>
                        <th scope="row"><?= ++$i + 10 * ($currentPage - 1) ?></th>
                        <td><?= $m['nomor_membership'] ?></td>
                        <td><?= $m['nama'] ?></td>
                        <td><?= $m['tanggal_lahir'] ?></td>
                        <td><?= $m['email'] ?></td>
                        <td><?= $m['telepon'] ?></td>
                        <td><?= $m['alamat'] ?></td>
                        <td><?= $m['status_membership'] ?></td>
                        <td><a href="/member/detail/<?= $m['member_id'] ?>" class="btn btn-success">Detail</a></td>
                    </tr>

                    <?php
                }

                ?>
            </tbody>
            </table>
            <?= $pager->links('biblio', 'my_pagination') ?>
        </div>
    </div>
<!-- </div> -->

<?= $this->endSection(); ?>