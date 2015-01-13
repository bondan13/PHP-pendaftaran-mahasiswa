<?php
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ($username =='admin' and $password =='1234'){ 
		unset ($_POST);
		$_SESSION['username']='admin';
		header ("location:.");
	}
	else{
		$konfirmasi = "Gagal Login";
		header ("location:login.php?konfirmasi=".$konfirmasi);
	}
?>