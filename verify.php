<?php
	require 'ceksesion.php';
	require 'database.php';
	$pengaturan=$_POST['pengaturan'];
	
	if ($pengaturan=='tambah'){
		$no=$_POST['no'];
		$tahun=date("Y");
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$tl=$_POST['tl'];
		$tgll=date("Y-m-d",strtotime($_POST['tgll']));
		$agama=$_POST['agama'];
		$namaper=$_POST['namaper'];
		$spek=$_POST['spek'];
		$aslsk=$_POST['aslsk'];
		$thnlls=$_POST['thnlls'];
		$jurusan=$_POST['jurusan'];
		$namaayah=$_POST['namaayah'];
		$namaibu=$_POST['namaibu'];
		$pekayah=$_POST['pekayah'];
		$pekibu=$_POST['pekibu'];
		$bk=$_POST['bk'];
		$alamatm=$_POST['alamatm'];
		$kdposm=$_POST['kdposm'];
		$telpm=$_POST['telpm'];
		$hpm=$_POST['hpm'];
		$alamatp=$_POST['alamatp'];
		$kdposp=$_POST['kdposp'];
		$telpp=$_POST['telpp'];
		$hpp=$_POST['hpp'];
		$alamatot=$_POST['alamatot'];
		$kdposot=$_POST['kdposot'];
		$telpot=$_POST['telpot'];
		$hpot=$_POST['hpot'];
		
		if ($nama != ''){
				mysql_query
					("INSERT INTO `calon_mhs` 
						(`id`, `nama`, `jk`, `t_lhr`, `tgl_lhr`, 
						`agama`, `th`, `jurusan`, `no`, `status_p`, 
						`nm_perusahaan`, `nm_sekolah`, `thn_lls`, `nm_ayah`, 
						`nm_ibu`, `p_ayah`, `p_ibu`, `biaya_k`,`tgl`) 
					VALUES 
						(NULL, '$nama', '$jk', '$tl', 
						'$tgll', '$agama', '$tahun', '$jurusan', '$no', '$spek', 
						'$namaper', '$aslsk', '$thnlls', '$namaayah', 
						'$namaibu', '$pekayah', '$pekibu', '$bk', CURDATE())");
				$idm=mysql_insert_id();
				mysql_query
				("INSERT INTO `alamat` 
					(`id`, `idm`, `alamat`, `kodepos`, `telp`, `hp`, `id_a`) 
				VALUES 
					(NULL, '$idm', '$alamatm', '$kdposm', '$telpm', '$hpm', 'm')");
				mysql_query
				("INSERT INTO `alamat` 
					(`id`, `idm`, `alamat`, `kodepos`, `telp`, `hp`, `id_a`) 
				VALUES 
					(NULL, '$idm', '$alamatp', '$kdposp', '$telpp', '$hpp', 'p')");
				mysql_query
				("INSERT INTO `alamat` 
					(`id`, `idm`, `alamat`, `kodepos`, `telp`, `hp`, `id_a`) 
				VALUES 
					(NULL, '$idm', '$alamatot', '$kdposot', '$telpot', '$hpot', 'o')");
				}
				
				
	}
	
	if ($pengaturan=='edit'){
		$idm=$_POST['idm'];
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$tl=$_POST['tl'];
		$tgll=date("Y-m-d",strtotime($_POST['tgll']));
		$agama=$_POST['agama'];
		$namaper=$_POST['namaper'];
		$spek=$_POST['spek'];
		$aslsk=$_POST['aslsk'];
		$thnlls=$_POST['thnlls'];
		$jurusan=$_POST['jurusan'];
		$namaayah=$_POST['namaayah'];
		$namaibu=$_POST['namaibu'];
		$pekayah=$_POST['pekayah'];
		$pekibu=$_POST['pekibu'];
		$bk=$_POST['bk'];
		$alamatm=$_POST['alamatm'];
		$kdposm=$_POST['kdposm'];
		$telpm=$_POST['telpm'];
		$hpm=$_POST['hpm'];
		$alamatp=$_POST['alamatp'];
		$kdposp=$_POST['kdposp'];
		$telpp=$_POST['telpp'];
		$hpp=$_POST['hpp'];
		$alamatot=$_POST['alamatot'];
		$kdposot=$_POST['kdposot'];
		$telpot=$_POST['telpot'];
		$hpot=$_POST['hpot'];
		
		if ($nama != ''){
			mysql_query("
			UPDATE `calon_mhs` SET 
				`nama` = '$nama',
				`jk` = '$jk',
				`t_lhr` = '$tl',
				`tgl_lhr` = '$tgll',
				`agama` = '$agama',
				`jurusan` = '$jurusan',
				`status_p` = '$spek',
				`nm_perusahaan` = '$namaper',
				`nm_sekolah` = '$aslsk',
				`thn_lls` = '$thnlls',
				`nm_ayah` = '$namaayah',
				`nm_ibu` = '$namaibu',
				`p_ayah` = '$pekayah',
				`p_ibu` = '$pekibu',
				`biaya_k` = '$bk' 
			WHERE `id` ='$idm'");
			mysql_query("
			UPDATE `alamat` 
			SET `alamat` = '$alamatm',`kodepos` = '$kdposm',
				`telp` = '$telpm',
				`hp` = '$hpm' 
			WHERE `idm` ='$idm' AND id_a = 'm'");
			mysql_query("
			UPDATE `alamat` 
			SET `alamat` = '$alamatp',`kodepos` = '$kdposp',
				`telp` = '$telpp',
				`hp` = '$hpp' 
			WHERE `idm` ='$idm' AND id_a = 'p'");
			mysql_query("
			UPDATE `alamat` 
			SET `alamat` = '$alamatot',`kodepos` = '$kdposot',
				`telp` = '$telpot',
				`hp` = '$hpot' 
			WHERE `idm` ='$idm' AND id_a = 'o'");
			}
	}
	header ("Location:data.php");
?>