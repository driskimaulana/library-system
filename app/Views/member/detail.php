<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="/images/<?= $members['img'] ?>" width="200px" alt="">
            <a href="/member/banned/<?= $members['member_id'] ?>" class="btn btn-danger my-3">Banned Member</a>
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

</div>

<?= $this->endSection(); ?>
