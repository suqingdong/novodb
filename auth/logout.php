<?php
session_start();

$_SESSION['login'] = FALSE;

echo '<script>window.location.href="/novodb/";</script>';

?>

