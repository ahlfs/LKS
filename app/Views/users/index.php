<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container mt-3 d-flex justify-content-start">
  
  <?php if ($movie) : ?>
    <?php foreach ($movie as $m) : ?>
      <a href="/moviedetail/<?= $m['id_movie'] ?>">
      <div class="mybox">
        <div class="card" style="width: 18rem;">
          <img src="/images/<?= $m['poster'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text no-text-decoration"><?= $m['title'] ?></p>
          </div>
        </div>
        </div>
      </a>
    <?php endforeach; ?>
    <?php else : ?>
      <h1>No Movie Yet</h1>
  <?php endif; ?>
</div>


<?= $this->endSection() ?>