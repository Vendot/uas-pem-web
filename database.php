<?php
include_once("function/koneksi.php");

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : false;

$nim = "";
$nama = "";
$role = "";
if ($user_id) {
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $nim = $row["nim"];
    $nama = $row["nama"];
    $role = $row["role"];
}
?>

<?php
if ($role == "admin") {
?>
    <div class="row mb-3 border-bottom pb-3">
        <div class="container">
            <form method="POST" action="<?php echo BASE_URL . "auth/proses_register.php"; ?>" class="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIM</label>
                    <input type="nim" class="form-control" id="exampleInputEmail1" name="nim" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="nama" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
<?php
}
?>
<div class="row">
    <!-- show all data user -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <?php
                    if ($user_id) {
                    ?>
                        <th scope="col">Aksi</th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("function/koneksi.php");
                $query = "SELECT * FROM user";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["nim"]; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <?php
                        if ($user_id) {
                        ?>
                            <td>
                                <?php
                                if ($role == "mahasiswa" || $role == "admin") {
                                ?>
                                    <a href="<?php echo BASE_URL . "index.php?page=user/detail_user&id=" . $row["id"]; ?>" class="btn btn-primary">Detail</a>
                                <?php
                                }

                                if ($row["nim"] == $nim) {
                                ?>
                                    <a href="<?php echo BASE_URL . "index.php?page=kontak"; ?>" class="btn btn-warning">Edit</a>
                                <?php
                                }

                                if ($role == "admin") {
                                ?>
                                    <a href="<?php echo BASE_URL . "index.php?page=user/delete_user?id=" . $row["id"]; ?>" class="btn btn-danger">Delete</a>
                                <?php
                                }
                                ?>
                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>