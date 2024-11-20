<?php
// get data user by id
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
    <div class="row">
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
                    <th scope="col">Aksi</th>
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
                        if ($role == "admin") {
                        ?>
                            <td>
                                <a href="<?php echo BASE_URL . "auth/proses_delete.php?id=" . $row["id"]; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        <?php
                        } else if ($role == "mahasiswa") {
                        ?>
                            <td>
                                <a href="<?php echo BASE_URL . "index.php?page=detail&id=" . $row["id"]; ?>" class="btn btn-primary">Detail</a>
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