<?php
	require'head.php';
?>
<html>
	<head>
	<title>Sistem pendaftaran mahasiswa baru Universitas Muhammadiyah Tangerang</title>
	</head>
	<body>
	<div align="center">
		<div id="content" align="center" style="height:100%;">
			<img src="gambar/umt-logo.jpg" width="200" height="200"><br><br>
			<form method="post" action="vlogin.php">
				<input type="text" name="username" value="Username" maxlength="32"
				class="input-form" style="padding-left:30px; width:50%;"
				onfocus="if(this.value==this.defaultValue)this.value='';" 
				onblur="if(this.value=='')this.value=this.defaultValue;" ><br>
					
				<input type="text" name="password" value="Password" maxlength="32"
				class="input-form" style="padding-left:30px; width:50%;"
				onclick="this.value='';this.onclick='test';this.style.color='#000'; setAttribute('type', 'password');" 
				onfocus="if(this.value=='Password'){this.value=''; setAttribute('type', 'password');}" 
				onblur="if(this.value=='') {this.value='Password'; setAttribute('type', 'text');}" ><br>
				
				<input type="submit" value="Login" class="menu" style="cursor:pointer; width:50%; height:35px; font-size:20px;">
			</form>
			<div id="footer" >&copy; 2014 Firmansyah </div>
		</div>
	</div>
	</body>
</html>
