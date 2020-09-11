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
		
		button .close {
			font-size: 34px;
		} 
		.list-group-item:last-child{
			border-bottom:none!important;
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
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 sol-1"> <!-- SOL-1 -->
								<div class="row">
								 	<div class="col arka-plan">AYARLAR</div>	
								</div>
						 
						 		<form class="form" action="" method="post">
						 			 <fieldset>
   										 <legend>Hesap Bilgileri</legend>	
						 			 <fieldset>

									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label" >Ad</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control"   name="ad" required value="<?php echo $_SESSION['ad']; ?>" maxlength="25">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Soyad</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control"   name="soyad" required value="<?php echo $_SESSION['soyad']; ?>" maxlength="15">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Telefon</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control"   name="telefon" required value="<?php echo $_SESSION['tel']; ?>" maxlength="14">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Mail</label>
									    <div class="col-sm-10">
									      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="mail" required value="<?php echo $_SESSION['mail']; ?>" maxlength="25">
									    </div>
									  </div>			  
									  <div class="form-group row" >
									    <div class="col-sm-10">
									      <button type="submit" class="btn btn-primary id" name="guncelle">Güncelle</button>						        
									    </div>
									  </div>
								</form>
								<?php
									if(isset($_POST["guncelle"]))
									{
									/*	unset($_SESSION["ad"]);
										unset($_SESSION["soyad"]);
										unset($_SESSION["telefon"]);
										unset($_SESSION["mail"]); */
										 $sql_guncelle="update uyeler set ad='".$_POST["ad"]."',soyad='".$_POST["soyad"]."',telefon='".$_POST["telefon"]."',mail='".$_POST["mail"]."' where id='".$_SESSION["id"]."'";
										 $sonuc=mysqli_query($baglan,$sql_guncelle);
											 if ($sonuc) {
											 		 $_SESSION["ad"]=$_POST["ad"];
													 $_SESSION["soyad"]=$_POST["soyad"];
													 $_SESSION["tel"]=$_POST["telefon"];
													 $_SESSION["mail"]=$_POST["mail"];
							 			 	 		 echo "<script>window.onload = function() {
															   		document.getElementById('b').style.display='block';
															   			}
															   	</script>";
							 			 	 		  header("Refresh:1,url=ayarlar.php");
							 			 	 }
							 			 	 else
							 			 	 {
												     echo "<script>alert('hata oluştu tekrar deneyiniz');</script>";

							 			 	 }
									}
								?>						 
					</div>
				</div>
				<div class="basarili" id="b">
						<div class="basarili-icerik">
							 <div class="container">
							      <label for="uname"><b>İşlem Başarılı</b></label>
							      <button type="submit" class="loginbuton" name="giris" onclick="document.getElementById('a').style.display='none'">Bilgiler Güncellendi.</button>
						    </div>
						</div>
				</div>
 				<div class="row">
					<div class="col-md-12 sol-1"> <!-- SOL-2 -->
								<div class="row">
								 	<div class="col arka-plan">ŞİFRE</div>	
								</div>
						 
						 		<form class="form" action="" method="post" >
						 			 <fieldset>
   										 <legend>Şifre Güncelle</legend>	
						 			 <fieldset>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Eski Şifreniz</label>
									    <div class="col-sm-10">
									      <input type="password" class="form-control"   name="eski" required maxlength="15">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Yeni Şifre</label>
									    <div class="col-sm-10">
									      <input type="password" class="form-control"   name="yeni" required maxlength="15">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Yeni Şifre(tekrar)</label>
									    <div class="col-sm-10">
									      <input type="password" class="form-control"   name="yenitekrar" required maxlength="15">
									    </div>
									  </div>			  
									  <div class="form-group row" >
									    <div class="col-sm-10">
									      <button type="submit" class="btn btn-primary id" name="sifreguncelle">Güncelle</button>			
									    </div>
									  </div>
								</form>
 						 		<?php
									if(isset($_POST["sifreguncelle"]))
									{
 										if($_POST["eski"]!=$_SESSION["sifre"])
 										{

 											echo "<span style='color:red;font-weight:bold;'>Eski Şifreniz doğru değildir.<span>";
 											 

 										}
										else
										{	
												if($_POST["yeni"]!=$_POST["yenitekrar"])
												{
													echo "<span style='color:red;font-weight:bold;'>Şifre ile Şifre tekrar uyuşmadı...<span>";
												}	
												else
												{
													$sql_guncelle_sifre="update uyeler set sifre='".$_POST["yeni"]."' where id='".$_SESSION["id"]."'";
													 $sonuc=mysqli_query($baglan,$sql_guncelle_sifre);
														 if ($sonuc) 
														 {
														 		 $_SESSION["sifre"]=$_POST["yeni"];
										 			 	 		  echo "<script>window.onload = function() {
															   		document.getElementById('c').style.display='block';
															   			}
															   	</script>";
										 			 	 		  header("Refresh:1,url=ayarlar.php");
										 			 	 }
										 			 	 else
										 			 	 {
															     echo "<script>alert('hata oluştu tekrar deneyiniz');</script>";

										 			 	 }
												} 
								 		}
									}
								?>
					</div>
				</div>
				<div class="basarili" id="c">
						<div class="basarili-icerik">
							 <div class="container">
							      <label for="uname"><b>İşlem Başarılı</b></label>
							      <button type="submit" class="loginbuton" name="giris" onclick="document.getElementById('a').style.display='none'">Şifre Güncellendi.</button>
						    </div>
						</div>
				</div>
				<div class="row">
					<div class="col-md-12 sol-1" id="dersayar"> <!-- SOL-3 -->
								<div class="row">
								 	<div class="col arka-plan">DERSLER <span style="float: right;">İşlemler(sil)</span></div>	
								</div>
						 		<?php
						 			$sql1="select * from dersler where uye_no='".$_SESSION["id"]."'";
										$result=mysqli_query($baglan,$sql1);
						 			if (mysqli_num_rows($result) == 0) {
										    echo "<span>Kayıtlı dersiniz bulunmamaktadır.</span>";
										    
										}

						 		?>	
						 		 <ul class="list-group list-group-flush">
						 		 	<?php
										$sql="select * from dersler where uye_no='".$_SESSION["id"]."'";
										$sorgu=mysqli_query($baglan,$sql);
										while($sonuc=mysqli_fetch_assoc($sorgu))
										{
									?>
								  <li class="list-group-item" style="background-color: transparent;    border-bottom: groove;"><?php echo $sonuc["ders_adi"] ?> 
								  		<button type="button" class="close" aria-label="Close" onclick="window.location.href = 'ayarlar.php?id=<?php echo $sonuc['id']; ?>'" style="margin-right: -20px;color: red;font-size: 35px;">
										  <span aria-hidden="true">&times;</span> 
										</button>
								  </li> 
								  <?php

								  	}
									if($_GET)
											{
										 
														$sql = "DELETE from dersler where id='".$_GET["id"]."'";
														$sonuc= mysqli_query($baglan,$sql);
														if($sonuc>0) 
														{ 			
															echo "<script>window.onload = function() {
															   		document.getElementById('a').style.display='block';
															   			}
															   	</script>";
															header("refresh:1,url=ayarlar.php#dersayar");													
														}
														else
														{

															echo "Bir problem oluştu, verileri kontrol ediniz";
														}	
											 	
											}
								
								  ?>
								</ul>
					</div>
				</div>
				<!-- ders silindikten sonra -->
					<div class="basarili" id="a">
						<div class="basarili-icerik">
							 <div class="container">
							      <label for="uname"><b>İşlem Başarılı</b></label>
							      <button type="submit" class="loginbuton" name="giris" onclick="document.getElementById('a').style.display='none'">Ders Silinmiştir.</button>
						    </div>
						</div>
					</div>
			</div>
			
			<!-- SABİT ALAN (sağ taraf) -->
			<div class="col-md-4">
				 	<?php
						include "sabit-profil.php";
					?>
			</div>	
			<!-- SABİT ALAN (sağ taraf) -->	
		</div>
	</div>


			<!-- FOOTER -->
					<?php
						include "footer.php";
					?>
			<!-- FOOTER -->


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