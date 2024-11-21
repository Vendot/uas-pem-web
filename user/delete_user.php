<?php
    include_once("../function/koneksi.php");
    include_once("../function/helper.php");

    $id = $_POST["id"];
    
    $query = "DELETE FROM user WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:" . BASE_URL . "index.php?page=database");
    } else {
        echo "Gagal menghapus data";
    }