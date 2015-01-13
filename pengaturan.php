<?php
	require 'ceksesion.php';
	require 'database.php';
	$p=$_GET['p'];
	$idm=$_GET['idm'];
	
	if ($p=='hapus' && $idm > 0){
		mysql_query("DELETE FROM `calon_mhs` WHERE `id` = '$idm'");
		mysql_query("DELETE FROM `alamat` WHERE `idm` = '$idm'");
	}
	header ("Location:data.php");
?>