<?php
session_start();
?>


<link href="../src/css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
<style>
	#term {
		float: right;
	}
</style>


<div class="signin">
	<div class="signin-head"><img src="images/head_120.png" alt="" class="img-circle"></div>
	<form class="form-signin" role="form" action="" method="post">
		<input name="username" type="text" class="form-control" placeholder="用户名" required autofocus />
		<input name="password" type="password" class="form-control" placeholder="密码" required />
		<button class="btn btn-lg btn-warning btn-block" type="submit">登录</button>
		<div style="margin-top: 10px;">
			<input name="remember-me" type="checkbox"> 记住我
			<a id="term"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"> 请先阅读使用规则</a>
		</div>
	</form>
	<div id="msg" class="text-center" ></div>
</div>

<div id="term_modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title text-center">使用规则</h4>
		</div>
		<div class="modal-body">
			bla bla ...
		</div>
    </div>
  </div>
</div>

<script src="../src/js/jquery.min.js"></script>
<script src="../src/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function () {
		$('#term').click(function () {
			$('#term_modal').modal();
		});
	});
</script>


<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{

	include('../utils/connect_db.php');

	$db = connect('../database/auth.db');

	$sql = sprintf('SELECT `username`,`password` FROM `user` WHERE username="%s"', $_POST['username']);

	$result = $db->query($sql);

	while ( $res = $result->fetchArray() )
	{
			$username = $res['username'];
			$password = $res['password'];
	}

	if ( ! $username )
	{
		$msg = '无此用户: ' . $_POST['username'];
		printf('<script>$("#msg").text("%s");</script>', $msg);
	} else if ( $password != $_POST['password'] ) {
		$msg = '密码错误!';
		printf('<script>$("#msg").text("%s");</script>', $msg);
		printf('<script>$(\'input[name="username"]\').val("%s");</script>', $_POST['username']);
	} else {
		$msg = '登录成功!';
		printf('<script>$("#msg").text("%s");</script>', $msg);
		$_SESSION['login'] = TRUE;
		$_SESSION['username'] = $username;
		// printf('<script>alert("%s");</script>', $_SESSION['login']);
		printf('<script>window.location.href="/novodb/latest/";</script>');
	}

	$db->close();
}
?>