<?php
    include_once("../function/koneksi.php");
    include_once("../function/helper.php");

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        header("location: " . BASE_URL . "index.php?page=register&notif=nim");
    } else {
        $password = md5($password);
        $query = "INSERT INTO user (nim, nama, password) VALUES ('$nim', '$nama', '$password')";
        
        if (mysqli_query($conn, $query)) {
            header("location: " . BASE_URL . "index.php?page=login&notif=success");
        } else {
            header("location: " . BASE_URL . "index.php?page=register&notif=error");
        }
    }

