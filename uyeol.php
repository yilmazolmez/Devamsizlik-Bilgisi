<?php
include "baglanti.php";
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="UTF-8">
	<title>Devamsızlık Bilgisi</title>
	<?php
		include "css.php";

	?>
	<style type="text/css">
		/* Full-width input fields */
			input[type=text], input[type=password] {
			  width: 100%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  box-sizing: border-box;
			}

 
			/* Modal Content/Box */
			.modal-content1 {
			  margin: 5% auto 10% auto; 
			  background-color: #fefefe;
			  border: 1px solid #888;
			  width: 40%!important; /* Could be more or less, depending on screen size */
      
 			 box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);

			}
  
			 .modal-content1:hover {
			  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
			}
			/* Add Zoom Animation */
			.animate {
			  -webkit-animation: animatezoom 0.6s;
			  animation: animatezoom 0.6s
			}

			@-webkit-keyframes animatezoom {
			  from {-webkit-transform: scale(0)} 
			  to {-webkit-transform: scale(1)}
			}
			  
			@keyframes animatezoom {
			  from {transform: scale(0)} 
			  to {transform: scale(1)}
			}
	</style>
</head>
<body style="background-color: #d9dce6;">
	<!-- HEADER -->
		<?php
			include "menu.php";
		?>
	<!-- HEADER -->

	<div class="container-fluid icerik">
		<div class="row">
			<div class="col-md-12">
					  <form class="modal-content1 animate" action="" method="post">
						    <div class="imgcontainer">
 						      <label for="uname"><b>Üye Ol</b></label>
						    </div>

						    <div class="container">
						      <label ><b>Ad</b></label>
						      <input type="text" placeholder="İsim Giriniz" name="ad" required maxlength="25">

						      <label ><b>Soyad</b></label>
						      <input type="text" placeholder="Soyisim Giriniz" name="soyad" required maxlength="15">
						      
						      <label ><b>Telefon</b></label>
						      <input type="text" placeholder="Telefon Giriniz" name="tel" required maxlength="14">

						      <label ><b>E-Mail</b></label>
						      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-Mail Giriniz" name="mail" required maxlength="25">
						      
						      <label ><b>Şifre</b></label>
						      <input type="password" placeholder="Şifre Giriniz" name="sifre" required maxlength="15">

						      <label ><b>Şifre(tekrar)</b></label>
						      <input type="password" placeholder="Şifre Giriniz(tekrar)" name="sifre_tekrar" required maxlength="15">    

						      <button type="submit" class="loginbuton" name="uyeol" onclick="uyeol()">Üye Ol</button>
						    </div>
 
					  </form>
			</div>
		</div>
	</div>
		 	<?php
		 		if (isset($_POST["uyeol"])) 
		 		{
		 			 if($_POST["sifre"]==$_POST["sifre_tekrar"])
		 			 {
		 			 	 $sql="INSERT INTO uyeler(ad,soyad,telefon,mail,sifre) VALUES ('".$_POST["ad"]."','".$_POST["soyad"]."','".$_POST["tel"]."','".$_POST["mail"]."','".$_POST["sifre"]."')";
		 			 	 $sonuc=mysqli_query($baglan,$sql);
		 			 	 if ($sonuc) {
 

		 			 	 		  echo "<script>document.getElementById('id01').style.display='block';document.getElementById('giris').style.display='block';</script>";
		 			 	 }
		 			 	 else
		 			 	 {
							     echo "<script>alert('hata oluştu tekrar deneyiniz');</script>";

		 			 	 }
		 			 }
		 			 else
		 			 {
							     					 echo "<script>window.onload = function() {
												   		document.getElementById('a1').style.display='block';
												   			}
												   	</script>";
		 			 }
		 		}

		 	?>
 
		 	<div class="basarili" id="a1">
					<div class="basarili-icerik">
						 <div class="container">
						      <label for="uname"><b>İşlem Başarısız</b></label>
						      <button type="submit" class="loginbuton" name="giris" onclick="document.getElementById('a1').style.display='none'" style="background-color: red;">Şifreler uyuşmuyor.</button>
					    </div>
					</div>
			</div>
			<!-- SCRIPT -->
					<?php
						include "script.php";
					?>
			<!-- SCRIPT -->
</body>
</html>

<?php 
 ob_end_flush();
mysqli_close($baglan);
?>