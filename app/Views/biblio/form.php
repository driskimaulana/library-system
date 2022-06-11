<?= $this->extend('/layout/template'); ?>


<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <center>
        
                <h2 class="my-3">Form Biblio Baru</h2>
            </center>

            <form action="/biblio/save" method="POST" enctype="multipart/form-data" >
                <?= csrf_field() ?>
                

                <div class="my-3">
                    <label for="title" class="form-label" style="font-size: 20px; color: black;">Title</label>
                    <input type="text" id="title" value="<?= old('title') ?>" class="form-control <?= ($validation->hasError('title')) ? "is-invalid" : "" ?>"
                    name="title">
                    <div class="invalid-feedback">
                        <?= $validation->getError('title') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="authors" class="form-label" style="font-size: 20px; color: black;">Authors</label>
                    <input type="text" id="authors" value="<?= old('authors') ?>" class="form-control <?= ($validation->hasError('authors')) ? "is-invalid" : "" ?>"
                    name="authors">
                    <div class="invalid-feedback">
                        <?= $validation->getError('authors') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="average-rating" class="form-label" style="font-size: 20px; color: black;">Average Rating</label>
                    <div id="average-rating" class="form-text">(opsional)</div>
                    <input type="text" id="average-rating" value="<?= old('average-rating') ?>" class="form-control <?= ($validation->hasError('average-rating')) ? "is-invalid" : "" ?>"
                    name="average-rating">
                    <div id="average-rating" class="form-text">(Contoh : 4.91 (menggunakan titik (.)))</div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('average-rating') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="isbn" class="form-label" style="font-size: 20px; color: black;">ISBN</label>
                    <input type="text" id="isbn" value="<?= old('isbn') ?>" class="form-control <?= ($validation->hasError('isbn')) ? "is-invalid" : "" ?>"
                    name="isbn">
                    <div class="invalid-feedback">
                        <?= $validation->getError('isbn') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="isbn13" class="form-label" style="font-size: 20px; color: black;">ISBN13</label>
                    <div id="average-rating" class="form-text">(opsional)</div>
                    <input type="text" id="isbn13" value="<?= old('isbn13') ?>" class="form-control <?= ($validation->hasError('isbn13')) ? "is-invalid" : "" ?>"
                    name="isbn13">
                    <div class="invalid-feedback">
                        <?= $validation->getError('isbn13') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="language-code" class="form-label" style="font-size: 20px; color: black;">Kode Bahasa</label>
                    <input type="text" id="language-code" value="<?= old('language-code') ?>" class="form-control <?= ($validation->hasError('language-code')) ? "is-invalid" : "" ?>"
                    name="language-code">
                    <div id="average-rating" class="form-text">(Contoh : eng, ind)</div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('language-code') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="num-pages" class="form-label" style="font-size: 20px; color: black;">Jumlah Halaman</label>
                    <input type="text" id="num-pages" value="<?= old('num-pages') ?>" class="form-control <?= ($validation->hasError('num-pages')) ? "is-invalid" : "" ?>"
                    name="num-pages">
                    <div class="invalid-feedback">
                        <?= $validation->getError('num-pages') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="ratings-count" class="form-label" style="font-size: 20px; color: black;">Banyak Orang Memberi Rating</label>
                    <div id="average-rating" class="form-text">(opsional)</div>
                    <input type="text" id="ratings-count" value="<?= old('ratings-count') ?>" class="form-control <?= ($validation->hasError('ratings-count')) ? "is-invalid" : "" ?>"
                    name="ratings-count">
                    <div class="invalid-feedback">
                        <?= $validation->getError('ratings-count') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="publication-date" class="form-label" style="font-size: 20px; color: black;">Tanggal Publish</label>
                    <input type="text" id="publication-date" value="<?= old('publication-date') ?>" class="form-control <?= ($validation->hasError('publication-date')) ? "is-invalid" : "" ?>"
                    name="publication-date">
                    <div class="invalid-feedback">
                        <?= $validation->getError('publication-date') ?>
                    </div>
                    <div id="average-rating" class="form-text">(tanggal/bulan/tahun (13/04/2002))</div>
                </div>
                <div class="my-3">
                    <label for="publisher" class="form-label" style="font-size: 20px; color: black;">Penerbit</label>
                    <input type="text" id="publisher" value="<?= old('publisher') ?>" class="form-control <?= ($validation->hasError('publisher')) ? "is-invalid" : "" ?>"
                    name="publisher">
                    <div class="invalid-feedback">
                        <?= $validation->getError('publisher') ?>
                    </div>
                </div>
                <div class="my-3">
                    <label for="img" class="form-label" style="font-size: 20px; color: black;">Pilih Gambar</label>
                    <div id="average-rating" class="form-text">(opsional)</div>
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="/images/books/default_book.png" class="img-thumbnail img-preview" >
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('img')) ? "is-invalid" : "" ?>" type="file" id="img" name="img" onchange="previewImage()">  
                            <div class="invalid-feedback">
                                <?= $validation->getError('img') ?>
                            </div>
                        </div>

                    </div>
                </div>
               
                
                <button type="submit" class="btn btn-primary mt-2">Tambah Biblio Baru</button>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>
