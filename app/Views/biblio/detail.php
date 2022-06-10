<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="/images/<?= $biblios['img'] ?>" alt="">
            <a href="/koleksi/tambah/<?= $biblios['buku_id'] ?>" class="btn btn-primary my-3">Tambah Koleksi</a>
        </div>
        <div class="col-md-9">
            <h3><?= $biblios['title'] ?></h3>
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

</div>

<?= $this->endSection(); ?>
