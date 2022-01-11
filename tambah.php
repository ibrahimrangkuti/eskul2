<?php 
require 'functions.php';

if(isset($_POST["btnKirim"])) {
    $query = tambah($_POST);
    if($query > 0) {
        echo "<script>
                alert('Data berhasil ditambah!');
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

    <title>TAMBAH DATA</title>
  </head>
  <body>
    
    <div class="container mt-5">
        <h1>TAMBAH DATA</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-input">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="form-input">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-input mt-3">
                <label for="kelas">Kelas & Jurusan</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="10 RPL 1">10 RPL 1</option>
                    <option value="10 RPL 2">10 RPL 2</option>
                    <option value="10 RPL 3">10 RPL 3</option>
                </select>
            </div>
            <div class="form-input mt-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-input mt-3">
                <label for="nohp">No HP</label>
                <input type="number" class="form-control" id="nohp" name="nohp">
            </div>
            <div class="form-input mt-3">
                <label for="eskul">Eskul Yang Diikuti</label>
                <select name="eskul" id="eskul" class="form-control">
                    <option value="WEB PROGRAMMING">WEB PROGRAMMING</option>
                    <option value="ROBOTIC">ROBOTIC</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="btnKirim">TAMBAH DATA</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>