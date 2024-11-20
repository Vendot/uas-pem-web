<div class="card shadow-lg">
    <div class="card-body p-5">
        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>

        <?php
        $notif = isset($_GET["notif"]) ? $_GET["notif"] : false;

        if ($notif == "success") {
            echo "<div class='alert alert-success'>Register success</div>";
        } elseif ($notif == "error") {
            echo "<div class='alert alert-danger'>Terjadi kesalahan sistem</div>";
        }
        ?>

        <form method="POST" action="<?php echo BASE_URL . "auth/proses_login.php"; ?>" class="needs-validation" novalidate="" autocomplete="off">
            <div class="mb-3">
                <label class="mb-2 text-muted" for="nim">NIM</label>
                <input id="nim" type="nim" class="form-control" name="nim" required autofocus>
            </div>

            <div class="mb-3">
                <div class="mb-2 w-100">
                    <label class="text-muted" for="password">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary ms-auto">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>