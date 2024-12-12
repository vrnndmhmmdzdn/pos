<?php
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Category.php';
require_once __DIR__ . '/../../Model/Items.php';

if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}

$id = $_GET['id'];
if (empty($id)) {
    header("location: index.php");
}

$categories = new Category();
$categories = $categories->AllC();

$menu = new Items();
$items_detail = $menu->FindC($id);
// var_dump($items_detail);

if (isset($_POST["submit"])) {
    //var_dump($_POST);
    $datas = [
        "post" => $_POST,
        "files" => $_FILES,
    ];

    $result = $menu->UpdateC($id, $datas);
    if (gettype($result) == "string") {
        echo "<script>alert(`Gagal meng-update`); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert(`Data berhasil di-update`); window.location.href = 'index.php';</script>";
    }
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
                                    <form action="" method="post" enctype="multipart/form-data" class="card-body">
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="name" class="form-control phone-number" value="<?= $items_detail[0]['item_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <div class="costum-file mb-2">
                                                <img src="../../public/img/items/<?= $items_detail[0]['attachment'] ?>" width="50">
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="attachment" class="custom-file-input" id="site-favicon" value="<?= $items_detail[0]['attachment'] ?>">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Kategori</label>
                                            <select id="category" name="item_category_id" class="form-control selectric">
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category['category_id'] ?>" <?php echo ($category["category_id"] == $items_detail[0]["item_category_id"]) ? 'selected' : ''; ?>>
                                                        <?= $category["category_name"] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-money-bill"></i>
                                                    </div>
                                                </div>
                                                <input name="price" type="text" class="form-control phone-number" value="<?= $items_detail[0]['price'] ?>">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button name="submit" class="btn btn-primary">Submit</button>
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
    <script src="../../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>

</html>