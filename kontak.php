<?php
include_once("function/koneksi.php");

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : false;

$nim = "";
$nama_user = "";
$jenis_kelamin = "";
$domisili = "";
$tgl_lahir = "";
$foto = "";
$alamat = "";

if ($user_id) {
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nim = $row["nim"];
    $nama_user = $row["nama"];
    $jenis_kelamin = $row["jenis_kelamin"];
    $domisili = $row["domisili"];
    $tgl_lahir = $row["tgl_lahir"];
    $foto = "<img src='" . BASE_URL . "image/" . $nim . "-" . $row["foto"] . "' style='width: 200px;vertical-align: middle;'/>";
    $alamat = $row["alamat"];
}
?>

<?php 
if ($user_id) {
    $notif = isset($_GET["error"]) ? $_GET["error"] : false;
    if ($notif) {
        echo "<div class='alert alert-danger' role='alert'>" . $notif . "</div>";
    }
?>

<form method="post" action="<?php echo BASE_URL . "user/proses_edit_profil.php"; ?>" enctype="multipart/form-data">
<?php
}
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
        <input type="file" class="form-control" id="foto" name="file"><?php echo $foto; ?>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
    </div>

    <?php 
    if ($user_id) {
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <?php
    } 
    ?>