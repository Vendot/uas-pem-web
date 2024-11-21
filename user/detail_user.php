<?php
include_once("function/koneksi.php");

$edit = isset($_GET["edit"]) ? $_GET["edit"] : false;
$user_id = isset($_GET['id']) ? $_GET['id'] : false;

// get data user by id
$query = "SELECT * FROM user WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);


$nim = $row["nim"];
$nama_user = $row["nama"];
$jenis_kelamin = $row["jenis_kelamin"];
$domisili = $row["domisili"];
$tgl_lahir = $row["tgl_lahir"];
$foto = $row["foto"];
$alamat = $row["alamat"];

?>

<?php
if ($edit == "true") {
?>
    <form method="post" action="<?php echo BASE_URL . "user/proses_edit_profil.php"; ?>" enctype="multipart/form-data">
        <?php
        echo "<input type='hidden' name='edit' value='true'>";
        ?>
        <div class="mb-3">
            <label for="nim " class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_user; ?>">
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" <?php echo $jenis_kelamin == "Laki-laki" ? "checked" : ""; ?>>
                <label class="form-check-label" for="laki">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?php echo $jenis_kelamin == "Perempuan" ? "checked" : ""; ?>>
                <label class="form-check-label" for="perempuan">
                    Perempuan
                </label>
            </div>
        </div>

        <div class="mb-3">
            <label for="domisili" class="form-label">Kota</label>
            <select class="form-select" aria-label="Default select example" id="domisili" name="domisili">
                <?php
                $kotas = ["Jakarta", "Bandung", "Surabaya", "Semarang", "Yogyakarta"];
                foreach ($kotas as $kota) {
                    $selected = $domisili == $kota ? "selected" : "";
                    echo "<option value='$kota' $selected>$kota</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="file"><img src="<?php echo  BASE_URL . "image/" . $nim . "-" . $foto; ?>" style="width:200px" alt="image">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php
} else {
?>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4 mb-sm-5">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <img src="<?php echo  BASE_URL . "image/" . $nim . "-" . $foto; ?>" class="img-fluid rounded w-100" alt="image">
                                </div>
                                <div class="col-lg-6 px-xl-10">
                                    <div class="d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9">
                                        <h3 class="h2 text-primary mb-0">
                                            <?php echo $nama_user; ?>
                                        </h3>
                                        <!-- <span class="text-primary">Coach</span> -->
                                    </div>
                                    <ul class="list-unstyled mb-1-9">
                                        <li class="mb-2 mb-xl-3 display-28">
                                            <span class="display-26 text-secondary me-2 font-weight-600">
                                                Jenis Kelamin:
                                            </span>
                                            <?php echo $jenis_kelamin; ?>
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28">
                                            <span class="display-26 text-secondary me-2 font-weight-600">
                                                Domisili:
                                            </span>
                                            <?php echo $domisili; ?>
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28">
                                            <span class="display-26 text-secondary me-2 font-weight-600">
                                                Tanggal Lahir:
                                            </span>
                                            <?php echo $tgl_lahir; ?>
                                        </li>
                                        <li class="mb-2 mb-xl-3 display-28">
                                            <span class="display-26 text-secondary me-2 font-weight-600">
                                                Alamat:
                                            </span>
                                            <?php echo $alamat; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>