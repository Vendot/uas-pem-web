<?php 
    include_once("../function/koneksi.php");
    include_once("../function/helper.php");

    $nim = $_POST["nim"];
    $password = md5($_POST["password"]);

    $query = "SELECT * FROM user WHERE nim = '$nim' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        session_start();

        $_SESSION['id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['role'] = $row['role'];
        header("location: " . BASE_URL . "index.php?page=home");
    } else {
        header("location: " . BASE_URL . "index.php?page=login&notif=error");
    }

