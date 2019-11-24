<?php
session_start();

if (isset($_GET['loggedin'])) {
    $_SESSION['loggedin'] = $_GET['loggedin'];
}
