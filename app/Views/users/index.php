<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
<div class="alert alert-light fw-bold" role="alert">
  Featured
</div>
</div>

<div class="container mt-3 d-flex justify-content-start">
  <div class="row">
  <?php if ($movie) : ?>
    <?php foreach ($movie as $m) : ?>
      <div class="col-md-3">
      <a href="/moviedetail/<?= $m['id_movie'] ?>">
        <div class="mybox mx-3 my-3">
          <div class="card" style="width: 100%;">
            <img src="/images/<?= $m['poster'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text fw-bold"><?= $m['title'] ?> (<?= $m['release_year'] ?>)</p>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php endforeach; ?>
  <?php else : ?>
    <div class="alert alert-light" role="alert">
      Movie not found
    </div>
  <?php endif; ?>
  </div>
</div>


<?= $this->endSection() ?>