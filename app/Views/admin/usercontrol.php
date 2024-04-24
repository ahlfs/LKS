<?= $this->extend('layouts/navbar') ?>
<?= $this->section('content') ?>

<div class="container">
<div class="card">
  <div class="card-body">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 0; ?>
    <?php foreach($daftaruser as $du) :?>
    <tr>
      <?php $i++ ?>
      <th scope="row"><?= $i ?></th>
      <td><?= $du['username'] ?></td>
      <td><?= $du['email'] ?></td>
      <td><?= $du['level'] ?></td>
      <td>
      <a href="/edituser/<?= $du['id_user'] ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square fa-lg"></i> Edit</button></a>
      <a href="/deleteuser/<?= $du['id_user'] ?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fa-lg"></i> Delete</button></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </div>
</div>
</div>

<?= $this->endSection() ?>