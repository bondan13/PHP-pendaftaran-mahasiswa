<?php
	require 'ceksesion.php';
	require 'database.php';
	require 'head.php';
	$query=@mysql_query("SELECT no FROM calon_mhs ORDER BY no DESC LIMIT 1");
	$hasil=@mysql_result($query,0,0);
		if ($hasil <1){
			$no =1;}
		else {
			$no = $hasil+1;}
	$query2=@mysql_query("SELECT * FROM Agama");
	$query3=@mysql_query("SELECT * FROM jurusan");
?>
<html>
	<head>
	<title>Sistem pendaftaran mahasiswa baru Universitas Muhammadiyah Tangerang</title>
	<script>
		$(function() {
		$( "#tgp" ).datepicker({ dateFormat: "dd MM yy", changeYear: true, yearRange : '-40:-16'});
		});
	</script>
	<style>
	textarea{
		text-decoration:none;
		font-family:Arial, Helvetica, sans-serif;
		}
	</style>
	</head>
	
	<body>
	<div align="center">
		<div id="content" align="left" >
			<img src="gambar/a.jpg">
			<hr>
			<div style="float:left; width:60%;">Tanggal Pendaftaran : <?php echo date("d M Y"); ?></div>
			<div style="float:right; border:1px solid #666666; width:35%; padding-left:5px;">
			Tahun Akademik : <?php echo date("Y")."/"; echo date("Y")+1; ?><br>
			No Pendaftaran : <?php echo $no; ?>
			</div><br><br><hr>

			<form method="post" action="verify.php">
				<input type="hidden" name="pengaturan" value="tambah">
				<input type="hidden" name="no" value="<?php echo $no; ?>">
				<table width="100%" border="0" cellpadding="0" cellspacing="3">
					<tr>
				  	<td colspan="3" bgcolor="#CCCCCC"><b>Data Calon Mahasiswa</b></td>
				  </tr>
				  <tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="nama" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td width="75%">
						<input type="radio" name="jk" value="l" >Laki - Laki 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="jk" value="p">Perempuan
					</td>
				  </tr>
				  <tr>
					<td>Tempat / Tanggal lahir</td>
					<td>:</td>
					<td width="75%">
						<input type="text"  name="tl" style="width:62.3%;"> / 			
						<input type="text" name="tgll" id="tgp"><br>
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
								echo "<option value='".$hasil[0]."'>".$hasil[1]."</option>";
								}
						?>
					</select>
					</td>
				  </tr>
				  <tr>
					<td>Status pekerjaan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="spek" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Alamat rumah</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatm" style="height:70px; width:100%;"></textarea><br>
					Kode Pos <input type="text" name="kdposm" style="width:15%;" maxlength="5">
					Telp <input type="text" name="telpm" style="width:25%;" maxlength="12">
					Hp <input type="text" name="hpm" style="width:30%;" maxlength="12">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Nama Perusahaan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="namaper" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				   <tr>
					<td>Alamat Perusahaan</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatp" style="height:70px; width:100%;"></textarea><br>
					Kode Pos <input type="text" name="kdposp" style="width:15%;" maxlength="5">
					Telp <input type="text" name="telpp" style="width:25%;" maxlength="12">
					Hp <input type="text" name="hpp" style="width:30%;" maxlength="12">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="aslsk" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Tahun Kelulusan</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="thnlls" maxlength="4" style="width:100%;"><br>
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
						<input type="text" name="namaayah" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Nama Ibu</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="namaibu" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Pekerjaan Ayah</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="pekayah" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				  <tr>
					<td>Pekerjaan Ibu</td>
					<td>:</td>
					<td width="75%">
						<input type="text" name="pekibu" maxlength="40" style="width:100%;"><br>
					</td>
				  </tr>
				   <tr>
					<td>Alamat rumah</td>
					<td>:</td>
					<td width="75%">
					<textarea name="alamatot" style="height:70px; width:100%;"></textarea><br>
					Kode Pos <input type="text" name="kdposot" style="width:15%;" maxlength="5">
					Telp <input type="text" name="telpot" style="width:25%;" maxlength="12">
					Hp <input type="text" name="hpot" style="width:30%;" maxlength="12">
					</td>
				  </tr>
				  <tr>
				  	<td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
				  </tr>
				  <tr>
					<td>Pembiayaan Kuliah</td>
					<td>:</td>
					<td width="75%">
						<input type="radio" name="bk" value="s" >Sendiri
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="bk" value="ot">Orang Tua
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="bk" value="bs">Bea Siswa
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
								echo "<option value='".$hasil[0]."'>".$hasil[1]." (S1)</option>";
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
					<a href="."><div style="width:50px; border:1px solid #333333; border-radius:3px; float:right;"> Batal </div></a>
				</div>
			</form>
			<hr>
			<div id="footer" align="center">&copy; 2014 Firmansyah </div>
		</div>	
	</div>
	</body>
</html>
