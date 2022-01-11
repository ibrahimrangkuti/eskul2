<?php 
require 'functions.php';

$id = $_GET["id"];
$anggota = query("SELECT * FROM anggota WHERE id = '$id'");

if(isset($_POST["btnUbah"])) {
    $query = ubah($_POST);
    if($query > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>UBAH DATA</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <h1>UBAH DATA</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <?php foreach($anggota as $row) : ?>
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <input type="hidden" name="fotoLama" value="<?= $row["foto"] ?>">
                <div class="form-input">
                    <label for="foto">Foto</label><br>
                    <img src="img/<?= $row["foto"] ?>" alt="" width="80">
                    <input type="file" class="form-control mt-3" id="foto" name="foto">
                </div>
                <div class="form-input mt-3">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $row["nama"] ?>">
                </div>
                <div class="form-input mt-3">
                    <label for="kelas">Kelas & Jurusan</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <?php if($row["kelas"] === "10 RPL 1") : ?>
                            <option value="10 RPL 1" selected>10 RPL 1</option>
                            <option value="10 RPL 2">10 RPL 2</option>
                            <option value="10 RPL 3">10 RPL 3</option>
                        <?php elseif($row["kelas"] === "10 RPL 2") : ?>
                            <option value="10 RPL 1">10 RPL 1</option>
                            <option value="10 RPL 2" selected>10 RPL 2</option>
                            <option value="10 RPL 3">10 RPL 3</option>
                        <?php elseif($row["kelas"] === "10 RPL 3") : ?>
                            <option value="10 RPL 1">10 RPL 1</option>
                            <option value="10 RPL 2">10 RPL 2</option>
                            <option value="10 RPL 3" selected>10 RPL 3</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-input mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $row["email"] ?>">
                </div>
                <div class="form-input mt-3">
                    <label for="nohp">No HP</label>
                    <input type="number" class="form-control" id="nohp" name="nohp" value="<?= $row["no_hp"] ?>">
                </div>
                <div class="form-input mt-3">
                    <label for="eskul">Eskul Yang Diikuti</label>
                    <select name="eskul" id="eskul" class="form-control">
                        <?php if($row["eskul"] === "WEB PROGRAMMING") : ?>
                            <option value="WEB PROGRAMMING" selected>WEB PROGRAMMING</option>
                            <option value="ROBOTIC">ROBOTIC</option>
                        <?php elseif($row["eskul"] === "ROBOTIC") : ?>
                            <option value="WEB PROGRAMMING">WEB PROGRAMMING</option>
                            <option value="ROBOTIC" selected>ROBOTIC</option>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3" name="btnUbah">UBAH DATA</button>
            <?php endforeach; ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>