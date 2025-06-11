<?php

if (array_key_exists('logoutAdmin', $_POST)) {
    session_start();
    session_unset();
    session_destroy();
    header("Location:../../admin/auth/login.php");
} else {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../account/auth/login.php");
}
