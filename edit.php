<?php
	$idm=$_GET['idm'];
		if ($idm < 1){header ("Location:.");}
	require 'ceksesion.php';
	require 'database.php';
	require 'head.php';
	$query=@mysql_query("SELECT * FROM calon_mhs WHERE id = '$idm' LIMIT 1");
		$id=@mysql_result($query,0,0);
		$nama=@mysql_result($query,0,1);
		$jk=@mysql_result($query,0,2);
		$tl=@mysql_result($query,0,3);
		$tgll1=@mysql_result($query,0,4);
		$tgll2=date("d M Y",strtotime($tgll1));
		$agama=@mysql_result($query,0,5);
		$th=@mysql_result($query,0,6);
		$jurusan=@mysql_result($query,0,7);
		$no=@mysql_result($query,0,8);
		$sp=@mysql_result($query,0,9);
		$nm_peru=@mysql_result($query,0,10);
		$nm_skl=@mysql_result($query,0,11);
		$thnlls=@mysql_result($query,0,12);
		$nmayah=@mysql_result($query,0,13);
		$nmibu=@mysql_result($query,0,14);
		$pekayah=@mysql_result($query,0,15);
		$pekibu=@mysql_result($query,0,16);
		$bk=@mysql_result($query,0,17);
		$tgl1=@mysql_result($query,0,18);
		$tgl2=date("d M Y",strtotime($tgl1));
	$query2=@mysql_query("SELECT * FROM Agama");
	$query3=@mysql_query("SELECT * FROM jurusan");
	$query4=@mysql_query("SELECT * FROM alamat WHERE idm = '$idm' AND id_a = 'm'");
		$alamatm=@mysql_result($query4,0,2);
		$kdposm=@mysql_result($query4,0,3);
		$telpm=@mysql_result($query4,0,4);
		$hpm=@mysql_result($query4,0,5);
	$query5=@mysql_query("SELECT * FROM alamat WHERE idm = '$idm' AND id_a = 'p'");
		$alamatp=@mysql_result($query5,0,2);
		$kdposp=@mysql_result($query5,0,3);
		$telpp=@mysql_result($query5,0,4);
		$hpp=@mysql_result($query5,0,5);
	$query6=@mysql_query("SELECT * FROM alamat WHERE idm = '$idm' AND id_a = 'o'");
		$alamato=@mysql_result($query6,0,2);
		$kdposo=@mysql_result($query6,0,3);
		$telpo=@mysql_result($query6,0,4);
		$hpo=@mysql_result($query6,0,5);
?>
<html>
	<head>
	<title>Sistem pendaftaran mahasiswa baru Universitas Muhammadiyah Tangerang</title>
	<script>
		$(function() {
		$( "#tgp" ).datepicker({ dateFormat: "dd MM yy", changeYear: true, yearRange : '-40:-16'});
		});
		$( document ).ready(function() {
			$('.k').on('click', function () {
				return confirm('Jika dihapus data ini akan hilang?');
			});
		});
	</script>
	</head>
	<body>
	<div align="center">
		<div id="content" align="left" >
			<img src="gambar/a.jpg">
			<hr>
			<div style="float:left; width:60%;">Tanggal Pendaftaran : <?php echo $tgl2; ?></div>
			<div style="float:right; border:1px solid #666666; width:35%; padding-left:5px;">
			Tahun Akademik : <?php echo $th."/"; echo $th+1; ?><br>
			No Pendaftaran : <?php echo $no; ?>
			</div><br><br><hr>

			<form method="post" action="verify.php">
				<input type="hidden" name="pengaturan" value="edit">
				<input type="hidden" name="idm" value="<?php echo $id; ?>">
				<table width="100%" border="0" cellpadding="0" cellspacing="3">
					<tr>
				  	<td colspan="3" bgcolor="#CCCCCC"><b>Data Calon Mahasiswa</b></td>
				  </tr>
				  <tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="nama" value="<?php echo $nama; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td width="75%">
						<input type="radio" name="jk" value="l" <?php if ($jk == "l"){echo "checked";} ?>>Laki - Laki 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="jk" value="p" <?php if ($jk == "p"){echo "checked";} ?>>Perempuan
					</td>
				  </tr>
				  <tr>
					<td>Tempat / Tanggal lahir</td>
					<td>:</td>
					<td width="75%">
						<input type="text"  name="tl" style="width:62.3%;" value="<?php echo $tl; ?>"> / 			
						<input type="text" name="tgll" id="tgp" value="<?php echo $tgll2; ?>"><br>
					</td>
				  </tr>
				  <tr>
					<td>Agama</td>
					<td>:</td>
					<td width="75%">
					<select name="agama" style="width:100%;">
						<option selected disabled> </option>
						<?php
							while ($hasil=mysql_fetch_array($query2)){
								if($hasil[0]==$agama){
									echo "<option selected value='".$hasil[0]."'>".$hasil[1]."</option>";
								}
								else{
								echo "<option value='".$hasil[0]."'>".$hasil[1]."</option>";
								}
							}
						?>
					</select>
					</td>
				  </tr>
				  <tr>
					<td>Status pekerjaan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="spek" maxlength="40" value="<?php echo $sp; ?>" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Alamat rumah</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatm" style="height:70px; width:100%;"><?php echo $alamatm; ?></textarea><br>
					Kode Pos <input type="text" name="kdposm" style="width:15%;" maxlength="5" value="<?php echo $kdposm; ?>">
					Telp <input type="text" name="telpm" style="width:25%;" maxlength="12" value="<?php echo $telpm; ?>">
					Hp <input type="text" name="hpm" style="width:30%;" maxlength="12" value="<?php echo $hpm; ?>">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Nama Perusahaan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="namaper" maxlength="40" value="<?php echo $nm_peru; ?>" style="width:100%;"><br>
					</td>
				  </tr>
				   <tr>
					<td>Alamat Perusahaan</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatp" style="height:70px; width:100%;"><?php echo $alamatp; ?></textarea><br>
					Kode Pos <input type="text" name="kdposp" style="width:15%;" maxlength="5" value="<?php echo $kdposp; ?>">
					Telp <input type="text" name="telpp" style="width:25%;" maxlength="12" value="<?php echo $telpp; ?>">
					Hp <input type="text" name="hpp" style="width:30%;" maxlength="12" value="<?php echo $hpp; ?>">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="aslsk" value="<?php echo $nm_skl; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Tahun Kelulusan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="thnlls" maxlength="4" value="<?php echo $thnlls; ?>" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3">&nbsp;</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC"><b>Data orang tua</b></td>
				  </tr>
				  <tr>
					<td>Nama Ayah</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="namaayah" value="<?php echo $nmayah; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Nama Ibu</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="namaibu" value="<?php echo $nmibu; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Pekerjaan Ayah</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="pekayah" value="<?php echo $pekayah; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Pekerjaan Ibu</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="pekibu" value="<?php echo $pekibu; ?>" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				   <tr>
					<td>Alamat rumah</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatot" style="height:70px; width:100%;"><?php echo $alamato; ?></textarea><br>
					Kode Pos <input type="text" name="kdposot" style="width:15%;" maxlength="5" value="<?php echo $kdposo; ?>">
					Telp <input type="text" name="telpot" style="width:25%;" maxlength="12" value="<?php echo $telpo; ?>">
					Hp <input type="text" name="hpot" style="width:30%;" maxlength="12" value="<?php echo $hpo; ?>">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Pembiayaan Kuliah</td>
					<td>:</td>
					<td width="75%">
						<input type="radio" name="bk" value="s"<?php if ($bk == "s"){echo "checked";} ?>>Sendiri
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="bk" value="ot" <?php if ($bk == "ot"){echo "checked";} ?>>Orang Tua
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="bk" value="bs" <?php if ($bk == "bs"){echo "checked";} ?>>Bea Siswa
					</td>
				  </tr>

				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC" align="center"><b>Pilihan Jurusan / Program Studi</b></td>
				  </tr>
				  <tr>
					<td>Jurusan</td>
					<td>:</td>
					<td width="75%">
					<select name="jurusan" style="width:100%;">
						<option selected disabled> </option>
							<?php
								while ($hasil=mysql_fetch_array($query3)){
									if($hasil[0]==$jurusan){
										echo "<option selected value='".$hasil[0]."'>".$hasil[1]."</option>";
									}
									else{
									echo "<option value='".$hasil[0]."'>".$hasil[1]."</option>";
									}
								}
							?>
					</select>
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3">&nbsp;</td>
				  </tr>
				</table>
				<div align="center">
					<input type="submit" value="Simpan"  style="cursor:pointer;">
					<a href=".">
					<div style="width:80px; border:1px solid #333333; border-radius:3px; float:right;"> Kembali </div>
					</a>
					<a class="k" href="pengaturan.php?p=hapus&idm=<?php echo $id; ?>">
					<div style="width:80px; border:1px solid #333333; border-radius:3px; float:right; margin-right:10px;"> Hapus </div>
					</a>
				</div>
			</form>
			<hr>
			<div id="footer" align="center">&copy; 2014 Firmansyah </div>
		</div>	
	</div>
	</body>
</html>
