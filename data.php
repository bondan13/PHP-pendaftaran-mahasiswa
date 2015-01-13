<?php
	require'ceksesion.php';
	require "database.php";
	require'head.php';
	//=====================================================================halaman
	$itemperpage=10;
	if (isset($_GET['h'])){
		$hal=$_GET['h'];
		$posisi=($hal-1)*$itemperpage;}
	else if (empty($_GET['h'])){
		$hal=1;
		$posisi=0;}
	//=====================================================================halaman

	if (isset($_GET['nama'])){
		$cari=$_GET['nama'];
		$query=mysql_query("SELECT calon_mhs.id,calon_mhs.nama,calon_mhs.jk,calon_mhs.th,jurusan.jurusan 
			FROM calon_mhs LEFT JOIN jurusan 
			ON calon_mhs.jurusan = jurusan.id WHERE nama LIKE '%$cari%' LIMIT $posisi,$itemperpage");
		$jumlahdata=@mysql_num_rows(mysql_query("SELECT * FROM calon_mhs WHERE nama LIKE '%$cari%'"));
		$link="nama=".$cari."&";}
	else {
		$query=mysql_query("SELECT calon_mhs.id,calon_mhs.nama,calon_mhs.jk,calon_mhs.th,jurusan.jurusan 
			FROM calon_mhs LEFT JOIN jurusan 
			ON calon_mhs.jurusan = jurusan.id ORDER BY no desc, th desc LIMIT $posisi,$itemperpage");
		$jumlahdata=@mysql_num_rows(mysql_query("SELECT * FROM calon_mhs"));}

	//=====================================================================halaman
	$jumlahhalaman=ceil($jumlahdata/$itemperpage);
	//=====================================================================halaman	
		
	?>
<html>
	<head>
	<title>Sistem pendaftaran mahasiswa baru Universitas Muhammadiyah Tangerang</title>
	</head>
	
	<body>
	<div align="center">
		<div id="content" align="center" style="height:100%;">
			<div class="menu" style="margin-bottom:20px"> <a href='index.php'>
			<img src="gambar/back.png" height="25" width="30"> </a> Data Calon mahasiswa</div>
					<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
					<thead>
						<tr>
							<th width="40">No</th>
							<th >Nama</th>
							<th width="100">Jenis Kelamin</th>
							<th width="150">Jurusan</th>
							<th width="30">Tahun </th>
							
						</tr>
					</thead>
						<tbody>	
							<?php while ($baris=mysql_fetch_array($query)){
								echo "<tr><td>".$baris[0]."</td>";
								echo "<td><a href ='edit.php?idm=".$baris[0]."'>".$baris[1]."</a></td>";
								if ($baris[2] == 'l'){
								echo "<td>Laki-Laki</td>";}
								else {
								echo "<td>Perempuan</td>";}
								echo "<td>".$baris[4]."</td>";
								echo "<td>".$baris[3]."</td></tr>";}
							?>
						</tbody>
					</table>
					
					<?php
//=====================================================================halaman				
				echo "<div align='center' style='width:100%; float:inherit; margin-top:10px;'>";
				if ($hal<=3){
					$blockhal=1;}
					else if ($hal==$jumlahhalaman-1 && $jumlahhalaman>5){
					$blockhal=$hal-3;}
					else if ($hal==$jumlahhalaman && $jumlahhalaman>5){
					$blockhal=$hal-4;}
					else {
					$blockhal=$hal-2;}
					
					
				if ($jumlahhalaman<=3){
					$itemblok=$jumlahhalaman;}
					else if ($hal==$jumlahhalaman-1){
					$itemblok=$hal+1;}
					else if ($hal==$jumlahhalaman){
					$itemblok=$hal;}
					else if ($jumlahhalaman==4){
					$itemblok=4;}
					else if ($hal <=3 && $jumlahhalaman>4){
					$itemblok=5;}
					else{
					$itemblok=$hal+2;}
					
				echo "<div class='paging'>";
				
				if ($hal>3){
					echo "<a href='".$_SERVER['HTTP_SERVER']."/daftar/data.php?".$link."'>first</a>";}
					
				if ($jumlahhalaman>1){
					for ($i=$blockhal; $i<=$itemblok; $i++){
						echo "<a class='paging' href='".$_SERVER['HTTP_SERVER'].
						"/daftar/data.php?".$link."h=".$i."'>".$i."</a>";}
					}
						
				if ($jumlahhalaman>5 && $jumlahhalaman-2 > $hal){
					echo "<a href='".$_SERVER['HTTP_SERVER'].
					"/daftar/data.php?".$link."h=".$jumlahhalaman."'>last</a>";}
							
				echo "</div></div><br>";	
//=====================================================================halaman
?>
			<div align="center">
				<form method="get" action="data.php">
					<input type="text" name="nama" value="Cari berdasarkan nama" 
					style=" border:1px solid #666666; color:#666666; padding-left:5px; padding-right:50px; 
					border-radius:5px; height:28px; width:250px;"
						onfocus="if(this.value==this.defaultValue)this.value='';" 
						onblur="if(this.value=='')this.value=this.defaultValue;" >
					<input type="submit" value="cari" style="position:relative; left:-52px;" >
				</form>
			</div>
			<div id="footer" >&copy; 2014 Firmansyah </div>
		</div>	
	</div>
	</body>
</html>