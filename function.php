<?php
//koneksi ke data base
$conn = mysqli_connect("localhost","root","","databasekita");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
      
}

function tambah ($data){
    global $conn; //agar dapat memanggil data di variavel $conn

    //ambil data dari tiap elemen form
    $nama = htmlspecialchars( $data["nama"]);
    $nim = htmlspecialchars( $data["nim"]);
    $email = htmlspecialchars( $data["email"]);
    $jurusan = htmlspecialchars( $data["jurusan"]);

    //upload gambar

    $gambar = upload();
    if(!$gambar){
        return false;
    }


 //insert data
 $query = "INSERT INTO mahasiswa VALUES('','$nama','$nim','$email','$jurusan','$gambar')";

 mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}


function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar yang di upload

    if($error === 4){
        echo "<script>
        alert ('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    //cek yang di upload gambar atau bukan

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end ($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert ('Harus Gambar!! ');
        </script>";
        return false;
    }
        
//cek ukuaran gambar

if ($ukuranFile > 2000000){
        echo "<script>
    alert ('ukuran gambar melebihi maksimal !');
    </script>";
        return false;
}
//gambar siap di upload
//generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($conn);
}

//function ubah
function ubah ($data){
    global $conn; //agar dapat memanggil data di variavel $conn
                          //ambil data dari tiap elemen form
    $id = $data["id"];
    $nama = htmlspecialchars( $data["nama"]);
    $nim = htmlspecialchars( $data["nim"]);
    $email = htmlspecialchars( $data["email"]);
    $jurusan = htmlspecialchars( $data["jurusan"]);
    $gambarOld =  htmlspecialchars( $data["gambarOld"]);

    // cek user memilih gambar
    if ($_FILES['gambar']['error'] === 4){
        $gambar = $gambarOld;

    }
    else{
        $gambar = upload();
    }


 //insert data
 $query = "UPDATE mahasiswa SET 
            nama = '$nama',
            nim = '$nim',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
        WHERE id = $id
            ";

 mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

//functiom cari

function cari ($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$keyword%' OR
    nim LIKE '%$keyword%'OR
    email LIKE '%$keyword%'OR
    jurusan LIKE '%$keyword%'
    ";
    return query($query);
}

?>