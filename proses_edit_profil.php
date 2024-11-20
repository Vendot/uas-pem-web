<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $domisili = $_POST['domisili'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $update_foto = "";

    if (!empty($_FILES["file"]["name"])) {
        $query = "SELECT foto FROM user WHERE nim='$nim'";
        if ($result = mysqli_query($conn, $query)) {
            $row = mysqli_fetch_assoc($result);
            $old_file = $row["foto"];
            echo var_dump($old_file);
            unlink("image/$nim/$old_file");
        }

        $nama_file = $_FILES["file"]["name"];
        $upload_path = "image/" . $nim . "-" . $nama_file;
        move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path);

        $update_foto = ", foto='$nama_file'";
    }
    echo var_dump($update_foto);

    $query = "UPDATE user 
            SET nama='$nama', 
                jenis_kelamin='$jenis_kelamin', 
                domisili='$domisili', 
                tgl_lahir='$tgl_lahir', 
                alamat='$alamat' 
                $update_foto 
            WHERE nim='$nim'";

    mysqli_query($conn, $query) or die(mysqli_error($conn));

    header("Location: " . BASE_URL . "index.php?page=kontak");
