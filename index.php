<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


//tombol cari di klik
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico">

  <title>Halaman admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="data.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">universitas</a></li>
              <li><a class="dropdown-item" href="#">sejarah</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">moment</a></li>
            </ul>
          </li>
        </ul>

        <form class="d-flex" role="search" action="" method="POST">
          <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword" autofocus placeholder="Masukan Data Pencarian" autocomplete="off">
          <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
        </form>
      </div>
    </div>
  </nav>
  </div><br>
  <div>
    <h2>Data Mahasiswa</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="tambah.php" class="btn btn-outline-primary" type="button">tambah data</a><br><br>
    </div>
    <hr size="10px" color="blue">
  </div><br>

  <table border="1" cellpadding="10" cellspacing="0" class="table table-striped">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Nim</th>
      <th>Email</th>
      <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
      <tr>
        <td><?= $i ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-primary">ubah</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ?');" class="btn btn-primary">hapus</a>
        </td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="40"></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
      </tr>
      <?php $i++; ?>
    <?php endforeach; ?>
  </table>


</body>

</html>