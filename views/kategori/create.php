<?php

require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Category.php";

if (isset($_POST["button"])) {
    $category = ["name" => $_POST["input"]];
    if (strlen($_POST["input"]) > 225) {
        echo "<script>alert('Karakter terlalu panjang (tidak lebih dari 255 karakter)') ; 
        window.location.href = 'create.php';</script>";
        die;
    }

    $categories = new Category();
    $result = $categories->CreateC($category);
    if ($result !== false) {
        echo "<script>alert(`Kategori {$result['name']} telah di tambahkan`) ; 
        window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert(`Gagal menambahkan data!`) ; 
        window.location.href = 'index.php';</script>";
    }
    var_dump($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
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
        <div class="main-wrapper main-wrapper-1">
            <?php include "../../components/layout/navbar-expand.php" ?>
            <?php include "../../components/layout/sidebar.php" ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Tambah Kategori</h1>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Kategori</h2>
                        <p class="section-lead">Masukkanlah nama ke dalam input untuk menambah kategori baru</p>

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Kategori Baru</h4>
                                    </div>
                                    <form action="" method="post" class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input name="input" type="text" class="form-control phone-number" required>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" name="button" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <img src="../../assets/img/skate.png" width="350">
                            </div>
                        </div>
                </section>
            </div>
            <?php include "../../components/layout/footer.php" ?>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="../../assets/modules/jquery.min.js"></script>
    <script src="../../assets/modules/popper.js"></script>
    <script src="../../assets/modules/tooltip.js"></script>
    <script src="../../assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="../../assets/modules/moment.min.js"></script>
    <script src="../../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>

</html>