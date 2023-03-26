<?php

require 'function.php';
//koneksi database

//ambil data id
$id = $_GET["id"];
//query data mahasiswa berdasarkan id

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    //cek apakah data berhasil di ubah

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil di ubah');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal di ubah');
        document.location.href='index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <h2>Ubah Data Mahasiswa</h2>
    <article>Silahkan ubah data valid anda</article>
    <hr size="10px" color="black">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarOld" value="<?= $mhs["gambar"]; ?>">
        <div>
            <label for="nama" class="form-label">
                <h5>Nama</h5>
            </label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $mhs["nama"] ?>">
        </div>
        <div>

            <label for="nim" class="form-label">
                <h5>Nim</h5>
            </label>
            <input type="text" name="nim" id="nim" class="form-control" value="<?= $mhs["nim"] ?>">

        </div>
        <div>
            <label for="email" class="form-label">
                <h5>Email</h5>
            </label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $mhs["email"] ?>">
        </div>
        <div>
            <label for="jurusan" class="form-label">
                <h5>Jurusan</h5>
            </label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $mhs["jurusan"] ?>">
        </div>

        <label for="gambar">
            <h5>Gambar</h5>
        </label>
        <img src="img/<?= $mhs['gambar']; ?>" width="50" style="border:1px solid #000"><br>
        <input type="file" name="gambar" id="gambar"><br><br>


        <button type="submit" name="submit" class="btn btn-primary">ubah data</button>

        </ul>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>