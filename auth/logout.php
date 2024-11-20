<?php
    include_once("../function/helper.php");

    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['nama']);
    unset($_SESSION['role']);

    header("location: " . BASE_URL . "index.php?page=login");
