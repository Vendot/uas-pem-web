<?php
    include_once("function/koneksi.php");

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