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
                <th scope="col">Penulis</th>
                <th scope="col">Rating</th>
                <th scope="col">ISBN</th>
                <th scope="col">Bahasa</th>
                <th scope="col">Publisher</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $i = 0;
                foreach ($biblios as $b) {
                    ?>

                    <tr>
                        <th scope="row"><?= ++$i + 10 * ($currentPage - 1) ?></th>
                        <td><?= $b['title'] ?></td>
                        <td><?= $b['authors'] ?></td>
                        <td><?= $b['average_rating'] ?></td>
                        <td><?= $b['isbn'] ?></td>
                        <td><?= $b['language_code'] ?></td>
                        <td><?= $b['publisher'] ?></td>
                        <td><a href="/biblio/detail/<?= $b['buku_id'] ?>" class="btn btn-success">Detail</a></td>
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