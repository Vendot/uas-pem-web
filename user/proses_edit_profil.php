<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    try {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $domisili = $_POST['domisili'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $update_foto = "";

        $edit = isset($_POST['edit']) ? $_POST['edit'] : false;

        if (empty($nim) || empty($nama)) {
            throw new Exception("NIM atau Nama tidak boleh kosong");
        }

        if (!empty($_FILES["file"]["name"])) {
            $query = "SELECT foto FROM user WHERE nim='$nim'";
            if ($result = mysqli_query($conn, $query)) {
                $row = mysqli_fetch_assoc($result);
                $old_file = $row["foto"];
                if (!empty($old_file) && file_exists("image/$nim/$old_file")) {
                    unlink("image/$nim/$old_file");
                }
            }

            $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
            $file_type = $_FILES["file"]["type"];
            if (!in_array($file_type, $allowed_types)) {
                throw new Exception("Tipe file tidak didukung. Hanya diperbolehkan JPG atau PNG.");
            }

            $nama_file = basename($_FILES["file"]["name"]);
            $upload_path = "../image/$nim-" . $nama_file;

            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
                throw new Exception("Gagal mengunggah file.");
            }

            $update_foto = ", foto='$nama_file'";
        }

        $query = "UPDATE user 
                    SET nama='$nama', 
                        jenis_kelamin='$jenis_kelamin', 
                        domisili='$domisili', 
                        tgl_lahir='$tgl_lahir', 
                        alamat='$alamat' 
                        $update_foto 
                    WHERE nim='$nim'";

        if (!mysqli_query($conn, $query)) {
            throw new Exception("Gagal memperbarui data: " . mysqli_error($conn));
        }

        if ($edit) {
            header("Location: " . BASE_URL . "index.php?page=database");
        } else {
            header("Location: " . BASE_URL . "index.php?page=kontak");
        }
    } catch (Exception $e) {
        header("Location: " . BASE_URL . "index.php?page=kontak&error=" . $e->getMessage());
        error_log("Pesan error: " . $e->getMessage(), 3, "error_log.txt");

}
