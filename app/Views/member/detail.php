<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="/images/<?= $members['img'] ?>" width="200px" alt="">
            <?= $members['status_membership'] == 'Aktif' ? '<a href="/member/banned/' . $members['member_id'] . '" class="btn btn-danger my-3">Banned Member</a>' : '<a href="/member/activate/' . $members['member_id'] . '" class="btn btn-success my-3">Aktifkan Member</a>' ?>
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
                        <td><?= $p_judul[$j] ?></td>
                        <td><?= $p_member[$j] ?></td>
                        <td><?= $p_koleksi[$j] ?></td>
                        <td><?= $admin->nama ?></td>
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

</div>

<?= $this->endSection(); ?>
