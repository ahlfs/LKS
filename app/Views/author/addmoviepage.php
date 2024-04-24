<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>




<div class="container">
    <div class="card mt-5">

        <div class="card-body">
            <h5 class="card-title center">Add Movie</h5>

            <form method="post" action="/submitmovie" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none" value="<?= old('title') ?>">
                    <?php if (session()->getFlashdata('titleError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('titleError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Synopsis</label>
                    <textarea name="synopsis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="none"><?= old('synopsis') ?></textarea>
                    <?php if (session()->getFlashdata('synopsisError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('synopsisError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Genre</label>
                    <select class="form-select form-select-lg mb-3" name="genre" aria-label="Large select example">
                        <option selected disabled>Select Genre</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Horror">Horror</option>
                        <option value="Action">Action</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Romance">Romance</option>
                        <option value="Drama">Drama</option>
                        <option value="Science Fiction">Science Fiction</option>
                    </select>


                    <?php if (session()->getFlashdata('genreError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('genreError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Release Year</label>
                    <input type="number" name="year" class="form-control" id="exampleInputPassword1" min="1900" max="2099" step="1" value="<?= old('year') ?>" />
                    <?php if (session()->getFlashdata('yearError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('yearError') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Runtime (Minute)</label>
                    <input type="number" name="runtime" class="form-control" id="exampleInputPassword1" value="<?= old('runtime') ?>">
                    <?php if (session()->getFlashdata('runtimeError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('runtimeError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Cast</label>
                    <input type="text" name="cast" class="form-control" id="exampleInputPassword1" value="<?= old('cast') ?>">
                    <?php if (session()->getFlashdata('castError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('castError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Minimum Age</label>
                    <input type="number" name="age" class="form-control" min="1" max="21" id="exampleInputPassword1" value="<?= old('age') ?>">
                    <?php if (session()->getFlashdata('ageError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('ageError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Poster</label>
                    <input type="file" name="poster" class="form-control" id="exampleInputPassword1">
                    <?php if (session()->getFlashdata('posterError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('posterError') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Trailer</label>
                    <input type="text" name="trailer" class="form-control" id="exampleInputPassword1" <?= old('trailer') ?>>
                    <?php if (session()->getFlashdata('trailerError')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('trailerError') ?>
                        </div>
                    <?php else : ?>
                        <div id="emailHelp" class="form-text">*Youtube embed link only</div>
                    <?php endif; ?>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>