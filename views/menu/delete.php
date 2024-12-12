<?php
require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Items.php";
$id = $_GET['id'];
if (empty($id)) {
    header("location: index.php");
}
$delete = new Items();
$delete->DeleteC($id);
if ($delete) {
    echo "<script>alert('Data berhasil di hapus');
    window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>alert('Data gagal di hapus');
    window.location.href = 'index.php';
    </script>";
}
