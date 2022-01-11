<?php
require 'functions.php';

if(isset($_POST["register"])) {
    if(register($_POST) > 0) {
        echo "<script>
                alert('Data user berhasil ditambahkan!');
                document.location.href = 'login.php';
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

    <title>REGISTER</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header mb-0">
                        <h4 class="text-center">REGISTER</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-input">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                            </div>
                            <div class="form-input mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-input mt-3">
                                <label for="password2">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="register">REGISTER</button>
                            <a href="login.php">Sudah punya akun?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>