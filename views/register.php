<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

$user = new Users();
if (isset($_POST['submit'])) {
    $datas = [
        'post' => $_POST,
        'files' => $_FILES,
    ];
    $result = $user->Register($datas);
    if (gettype($result) == "string") {
        echo "<script>alert(`$result`); window.location.href = 'register.php';</script>";
    } else {
        echo "<script>alert('Berhasil daftar!'); window.location.href = 'index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../assets/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">Nama Lengkap</label>
                                            <input id="frist_name" type="text" class="form-control" name="username" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="custom-file">
                                            <input type="file" name="avatar" class="custom-file-input" id="site-favicon">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Kategori</label>
                                        <select name="gender" class="form-control selectric">
                                            <option value="l">Laki-laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password2" type="password" class="form-control" name="password-confirm">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Sudah punya akun? <a href="login.php"> Login disini</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="../assets/modules/jquery.min.js"></script>
    <script src="../assets/modules/popper.js"></script>
    <script src="../assets/modules/tooltip.js"></script>
    <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../assets/modules/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="../assets/js/page/auth-register.js"></script>

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>