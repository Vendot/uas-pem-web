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

        <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
            <div class="mb-3">
                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                <div class="invalid-feedback">
                    Email is invalid
                </div>
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