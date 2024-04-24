<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card mt-5">

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/<?= $movie['poster'] ?>" class="myposter rounded img-fluid" alt="...">
                </div>
                <div class="col-md-8">

                    <h2 class="text-center mb-5"><?= $movie['title'] ?></h2>
                    <?php if (session('id_user') == $movie['id_user'] || session('level') == 3) : ?>
                        <div class="ms-auto">
                            <a href="/editmovie/<?= $movie['id_movie'] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square fa-lg"></i> Edit</button></a>
                            <a href="/deletemovie/<?= $movie['id_movie'] ?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fa-lg"></i> Delete</button></a>
                        </div>
                    <?php endif; ?>

                    <h4 class="text-start">Synopsis</h4>
                    <p><?= $movie['synopsis'] ?></p>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-start">Genre :</h5>
                            <h5 class="text-start">Release Year :</h5>
                            <h5 class="text-start">Runtime :</h5>
                            <h5 class="text-start">Cast :</h5>
                            <h5 class="text-start">Minimum Age :</h5>
                        </div>
                        <div class="col-md-8">
                            <h5 class="text-start"><?= $movie['genre'] ?></h5>
                            <h5 class="text-start"><?= $movie['release_year'] ?></h5>
                            <h5 class="text-start"><?= $movie['runtime'] ?> Minutes</h5>
                            <h5 class="text-start"><?= $movie['cast'] ?></h5>
                            <h5 class="text-start"><?= $movie['age'] ?>+</h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($movie['trailer']) : ?>
                <div class="row mt-5">
                    <div class="col-6">
                        <iframe width="560" height="315" src="<?= $movie['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session('isLogin')) : ?>
                <div class="row mt-5">
                    <div class="col-12">
                        <form method="post" action="/ratemovie/<?= $movie['id_movie'] ?>">
                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Rating</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-star fa-xl" style="color: #FFD43B;"></i></div>
                                <input type="number" min="1" max="10" name="rating" class="form-control" id="inlineFormInputGroupUsername" placeholder="Rating...">
                            </div>
                    </div>
                    <div class="col-12 mt-1">
                        <label class="visually-hidden" for="inlineFormInputGroupUsername">Comment</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa-solid fa-message fa-xl" style="color: #74C0FC;"></i></div>
                            <input type="text" class="form-control" name="message" id="inlineFormInputGroupUsername" placeholder="Comment...">
                        </div>
                    </div>



                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-paper-plane" style="color: #63E6BE;"></i> Send</button>
                    </div>
                    </form>
                </div>
            <?php endif; ?>
            <?php if ($rating) : ?>
                <div class="row mt-5 mx-3">
                    <h3 class="text-start">
                        User's Rating
                    </h3>
                    <?php foreach ($rating as $r) : ?>
                        <div class="alert alert-light" role="alert">
                            <h4><i class="fa-solid fa-star fa-xl" style="color: #FFD43B;"></i> <?= $r['rating'] ?></h4>
                            <h5><i class="fa-solid fa-user mt-3"></i> <?= $r['username'] ?></h5><br>
                            <h5><?= $r['message'] ?></h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?= $this->endSection() ?>