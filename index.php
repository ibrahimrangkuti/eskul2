<?php
require 'functions.php';

$anggota = query("SELECT * FROM anggota ORDER BY id DESC");


// session_start();

// var_dump($_SESSION["role"])
// if($_SESSION["role"] !== 'Admin') {
//     header('Location: login.php');
// }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>DATA ESKUL SMKN 5</title>
  </head>
  <body>
    
  <div class="container  mt-5">
      <h1>DATA ESKUL SMKN 5</h1>
      <a href="tambah.php" class="btn btn-success">Tambah Data</a>
      <div class="row">
          <form action="">
            <div class="col-6">
                <input type="search" class="form-control mt-3" id="cari" name="cari" placeholder="Silakan cari data yang anda inginkan" autocomplete="off">
            </div>
          </form>
      </div>
       <table class="table table-responsive table-bordered table-hover mt-3">
           <thead>
               <tr>
                   <th>NO</th>
                   <th>FOTO</th>
                   <th>NAMA</th>
                   <th>KELAS & JURUSAN</th>
                   <th>EMAIL</th>
                   <th>NO HP</th>
                   <th>ESKUL YANG DIIKUTI</th>
                   <th>AKSI</th>
               </tr>
           </thead>
           <tbody>
                <?php $i = 1; foreach($anggota as $row) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><img src="img/<?= $row["foto"] ?>" alt="" width="50"></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["kelas"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td><?= $row["no_hp"] ?></td>
                        <td><?= $row["eskul"] ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row["id"] ?>" class="btn btn-warning btn-sm">UBAH</a>
                            <a href="hapus.php?id=<?= $row["id"] ?>" class="btn btn-danger btn-sm">HAPUS</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
           </tbody>
       </table>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>