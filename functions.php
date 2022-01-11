<?php 

$conn = mysqli_connect("localhost", "root", "", "eskul");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $foto = upload();   
    if(!$foto) {
        echo "<script>
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $eskul = htmlspecialchars($data["eskul"]);

    mysqli_query($conn, "INSERT INTO anggota (id, foto, nama, kelas, email, no_hp, eskul) VALUES ('', '$foto', '$nama', '$kelas', '$email', '$nohp', '$eskul')");
    
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];

    $fotoLama = $data["fotoLama"];
    // Cek apakah user pilih gambar baru
    if($_FILES["foto"]["error"] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $eskul = htmlspecialchars($data["eskul"]);

    mysqli_query($conn, "UPDATE anggota SET
        foto = '$foto', 
        nama = '$nama', 
        kelas = '$kelas', 
        email = '$email',
        no_hp = '$nohp',
        eskul = '$eskul'
        WHERE id = '$id'"
    );

    return mysqli_affected_rows($conn);

}

function hapus() {
    global $conn;

    $id = $_GET["id"];

    $hapus = mysqli_query($conn, "DELETE FROM anggota WHERE id = '$id'");
    if($hapus) {
        echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
    }

}

function upload() {
    $namaFoto = $_FILES["foto"]["name"];
    $ukuranFoto = $_FILES["foto"]["size"];
    $tmpName = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];

    // Cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    $ekstensiValid = ["jpg", "jpeg", "png"];
    $ekstensiFoto = explode('.', $namaFoto);
    // $ekstensiFoto = pathinfo($namaFoto);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    // Cek apakah ekstensi gambar nya sesuai
    if(!in_array($ekstensiFoto, $ekstensiValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // Cek ukuran foto
    if($ukuranFoto > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // Generate nama baru
    $namaFotoBaru = uniqid();
    $namaFotoBaru .= '.';
    $namaFotoBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'img/' . $namaFotoBaru);

    return $namaFotoBaru;

}

function register($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    // Cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai!');
            </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}