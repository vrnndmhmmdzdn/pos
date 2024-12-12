<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Category.php";
$id = $_GET['id'];
if (empty($id)) {
    header("location: ../views/kategori/");
}
$delete = new Category();
$delete->DeleteC($id);
if ($delete) {
    echo "<script>alert('Data berhasil di hapus');
    window.location.href = '../views/index.php';
    </script>";
} else {
    echo "<script>alert('Data gagal di hapus');
    window.location.href = '../views/index.php';
    </script>";
}
