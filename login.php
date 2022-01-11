<?php 
require 'functions.php';

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek username
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            header('Location: index.php');
            exit;
        }
    }

    $error = true;
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

    <title>LOGIN</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row justify-content-center py-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header mb-0">
                        <h4 class="text-center">LOGIN</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Username atau Password tidak sesuai!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-input">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                            </div>
                            <div class="form-input mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="login">LOGIN</button>
                            <a href="register.php">Belum punya akun?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>