<?php
session_start();

if ( ! isset($_SESSION['login']) )
{
    printf('<script>window.location.href="login.php";</script>');
}

exit();

include('../utils/connect_db.php');

$db = connect('../database/auth.db');

$sql = 'SELECT * FROM `user`';

$result = $db->query($sql);

if ( ! $result )
{
    printf('[error] %s', $db->lastErrorMsg());
    exit(1);
}

while ( $res = $result->fetchArray() )
{
    $username = $res['username'];
    $password = $res['password'];
}

?>
<title>Login | NovoZhonghua</title>