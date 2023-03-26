<?php

require 'function.php';
//koneksi database

if (isset($_POST["submit"]) ){

    //cek apakah data berhasil di tambahkan
    if (tambah($_POST) > 0){
        echo "
        <script>
            alert('data berhasil di tambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
        alert('data gagal di tambahkan');
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
<h2>Input Data Mahasiswa</h2>
<article>Silahkan Input Data Sesuai Form dibawah ini</article>   <hr size="10px" color="black"> 
    <form action="" method="post" enctype="multipart/form-data" >
        <div>
                <label for="nama" class="form-label"  > Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" >
        </div>
        <div class="mb-3">
        <label for="nim" class="form-label">Nim</label>
                <input type="int" name="nim" id="nim" class="form-control" >
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" >
        </div>
            <div>
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" >
            </div>
            <div>
            <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" >
            </div>
            <br>
 
            <div>
                <button type="submit" name="submit" class="btn btn-primary" float="right">Tambah Data</button>
                <input class="btn btn-primary" type="reset" value="Reset">
            </div>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>
</html>