<?php
session_start();

$auth = $_SESSION['auth'] ?? null;

if (isset($_POST['logout'])) {
session_destroy();
}

if (isset($_POST['logout'])) {
    $auth = false;
}
