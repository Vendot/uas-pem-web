<?php
    include_once("function/helper.php");

    session_start();

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fikri Al Jauzi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="overflow-x-hidden mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pemograman Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . "index.php"; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . "index.php?page=kontak"; ?>">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . "index.php?page=latihan"; ?>">Latihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . "index.php?page=database"; ?>">Database 1</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row pt-2">
        <div class="col-3">
            <div class="list-group">
                <a href="?page=home" class="list-group-item list-group-item-action">Home</a>
                <a href="?page=kontak" class="list-group-item list-group-item-action">Kontak</a>
                <a href="?page=latihan" class="list-group-item list-group-item-action">Latihan</a>
                <a href="?page=database" class="list-group-item list-group-item-action">Database 1</a>
            </div>
        </div>

        <div class="col-6 border h-100">
            <div id="content">
                <?php
                $filename = "$page.php";

                if (file_exists($filename)) {
                    include_once($filename);
                } else {
                    include_once("main.php");
                }
                ?>
            </div>
        </div>

        <div class="col-3">
            <div class="container">
                <div class="row gap-2">
                    <?php
                    if (!$user_id) {
                    ?>
                        <div class="d-flex flex-row mb-4">
                            <div class="col">
                                <button type="button" class="btn btn-warning w-100" onclick="showLogin()">
                                    Login
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary w-100" onclick="showRegister()">
                                    Register
                                </button>
                            </div>
                        </div>

                        <div id="login" style="display: none;">
                            <?php include_once("auth/login.php"); ?>
                        </div>

                        <div id="register" style="display: none;">
                            <?php include_once("auth/register.php"); ?>
                        </div>
                    <?php
                    } else {
                    ?>
                        <h3 class="text-center">Selamat datang, <?php echo $nama; ?></h3>

                        <a href="<?php echo BASE_URL . "auth/logout.php"; ?>" class="btn btn-primary">Logout</a>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer></footer>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>

    <script>
        var login = document.getElementById('login');
        var register = document.getElementById('register');
        var logout = document.getElementById('logout');

        function showLogin() {
            login.style.display = 'block';
            register.style.display = 'none';
            logout.style.display = 'none';
        }

        function showRegister() {
            login.style.display = 'none';
            register.style.display = 'block';
            logout.style.display = 'none';
        }

        function showLogout() {
            login.style.display = 'none';
            register.style.display = 'none';
            logout.style.display = 'block';
        }
    </script>
</body>

</html>