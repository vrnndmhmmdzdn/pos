<?php
require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Items.php";
$items = new Items();
$items = $items->AllC();
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
    <link rel="stylesheet" href="../../assets/modules/jquery-selectric/selectric.css">
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
    <script>
        const itemsSelected = [{}];
        itemsSelected = [{}];

        function addItem(idItem, quantity = 1) {
            itemsSelected.push({
                id: idItem,
                q: quantity
            })
            alert(itemsSelected.map(item => item.id))
        }
    </script>
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
                                    <div class="card-body">
                                        <script>
                                            itemsSelected
                                        </script>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control phone-number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control selectric">
                                                <option>Lunas</option>
                                                <option>Hutang</option>
                                                <option>Cancel</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-book"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control phone-number">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 p-2 d-flex justify-content-center align-items-center">
                                <div class="row">
                                    <?php foreach ($items as $item): ?>
                                        <button onclick="addItem(<?= $item['item_id'] ?>)" class="p-2 border-0 shadow rounded overflow-hidden m-0 col-6 h-fit position-relative">
                                            <span class="position-absolute top-0 mt-1 ml-1 start-100 translate-middle badge rounded-pill bg-primary text-white">+1</span>
                                            <div class="ratio ratio-16x9 rounded" style="overflow: hidden; height: 160px;width: auto; ">
                                                <img alt="image" src="../../public/img/items/<?= $item['attachment'] ?>" class="img-fluid" style="object-fit: cover; ">
                                            </div>
                                            <h5 class="m-0"><?= $item['item_name'] ?></h5>
                                            <p class="m-0 text-success"><?= $item['price'] ?></p>
                                        </button>
                                    <?php endforeach ?>
                                </div>
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
    <script src="../../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>

</html>