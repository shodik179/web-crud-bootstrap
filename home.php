<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


//tombol cari di klik
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>halaman admin</title>
</head>

<body>
  <nav id="head">
    <a class="link" href="#">home</a>
    <a class="link" href="#">profil</a>
    <a class="link" href="#">data</a>
  </nav>
  <h3>Data Mahasiswa</h3>
  <a href="tambah.php">tambah data</a><br><br>

  <form action="" method="POST">

    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Data Pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari</button>

  </form><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>no.</th>
      <th>aksi</th>
      <th>gambar</th>
      <th>nama</th>
      <th>nrp</th>
      <th>email</th>
      <th>jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $row) : ?>
      <tr>
        <td><?= $i ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ?');">hapus</a>
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
<style>
  h3 {
    color: #3fa46a;
    padding-left: 19%;
    font-size: large;
  }

  nav {
    margin-top: 40px;
    padding: 24px;
    text-align: center;
    font-family: Raleway;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    width: 44.5%;
    height: 20px;
  }

  #head {
    background: #3fa46a;
  }

  .link {
    transition: 0.3s ease;
    background: #3fa46a;
    color: #ffffff;
    font-size: 20px;
    text-decoration: none;
    border-top: 4px solid #3fa46a;
    border-bottom: 4px solid #3fa46a;
    padding: 10px 0;
    margin: 0 20px;
  }

  .link:hover {
    border-top: 4px solid #ffffff;
    border-bottom: 4px solid #ffffff;
    padding: 6px 0;
  }
</style>