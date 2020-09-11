<?php
include "baglanti.php";
error_reporting(0); //hataları görmezden gelmek için
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="UTF-8">
	<title>Devamsızlık Bilgisi</title>
	<?php
		include "css.php";

	?>
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
								 	<div class="col arka-plan">ANASAYFA</div>	
								</div>
						 
						 		<form class="form" action="" method="post">
						 			 <fieldset>
   										 <legend>Ders Kaydet</legend>	
						 			 <fieldset>

									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Ders Adı</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control"   placeholder="Ders Adı" name="ders" required maxlength="35">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label  class="col-sm-2 col-form-label">Devamsızlık Hakkı</label>
									    <div class="col-sm-10">
									      <input type="text" class="form-control"   placeholder="Devamsızlık Sayısı" name="devamsizlik" required maxlength="2">
									    </div>
									  </div>
									  
									  <div class="form-group row" >
									    <div class="col-sm-10">
									    	<?php
									    		if (isset($_SESSION["login"])) {
									    			# code...
									    	
									    	?>
									      <button type="submit" class="btn btn-primary id" name="ekle">Ders Ekle</button>
									     	<?php
									      		}
									      		else
									      		{
									        ?>
									      <button type="submit" class="btn btn-primary id" name="ekle" disabled title="Lütfen giriş yapınız.." style="cursor: pointer;">Ders Ekle</button>
									      <span>Ders ekleme yapmak için giriş yapınız... :)</span>
									      <?php
									      	}
									      ?>									        
									    </div>
									  </div>
								</form>
								<?php 

									if (isset($_POST["ekle"]))
									{
										 	 	 $sqlekle="INSERT INTO dersler(ders_adi,ders_devamsizlik,uye_no) VALUES ('".$_POST["ders"]."','".$_POST["devamsizlik"]."','".$_SESSION["id"]."')";

												 $sonuc=mysqli_query($baglan,$sqlekle);
												 if ($sonuc==0){
												     echo "<script>alert('Hata Oluştu...Tekrar Deneyiniz');</script>";
												 }
												else{
												   echo "<script>window.onload = function() {
												   		document.getElementById('a2').style.display='block';
												   			}
												   	</script>";
												   	header("refresh:2,url=index.php#derstakip");
												   //  echo "<script>alert('".$_POST['ders']." dersiniz eklenmiştir.');</script>";
												}
										 										 
									}

								 ?>
										 
								 
								
						 
					</div>
				</div>								        	   
				<!-- ders başarılı bir şekilde eklenirse gözüksün -->
				<div class="basarili" id="a2">
					<div class="basarili-icerik">
						 <div class="container">
						      <label for="uname"><b>İşlem Başarılı</b></label>
						      <button type="submit" class="loginbuton" name="giris" onclick="document.getElementById('a2').style.display='none'">Ders Eklenmiştir.</button>
					    </div>
					</div>
				</div>
				<div class="row" id="derstakip"> <!-- SOL-2 -->
					<div class="col-md-12 sol-2"> 
						<div class="row">
						 	<div class="col arka-plan">Ders Takip Et 
						 				<?php
					 								if(isset($_SESSION["login"])) {
					 					?>
					 					<span style="float: right;"><a href="ayarlar.php#dersayar">Ayarlar</a></span>
					 					<?php
					 						}
					 					?>
					 		</div>
						 </div>
						 <div class="dersler"  style="word-wrap: break-word;">
						 	<div class="row">
						 		 <div class="col-md-1"></div>
						 		 <div class="col-md-5"><strong>Dersler</strong></div>
						 		 <div class="col-md-3"><strong>Devamsızlık</strong></div>
						 		 <div class="col-md-3"><strong>Arttır/Eksilt</strong></div>
						 	</div>
						 	<?php
						 			$sql1="select * from dersler where uye_no='".$_SESSION["id"]."'";
										$result=mysqli_query($baglan,$sql1);
						 			if (mysqli_num_rows($result) == 0) {
										    echo "<tr><td colspan=5><span>Takip edebileceğiniz ders bulunmamaktadır.Lütfen ders ekleyiniz.</span></td><tr>";
										    
										}

						 			?>
								  	<?php
								  	 if(isset($_SESSION["login"]))
								  	 {
											$sql="SELECT * FROM dersler where uye_no='".$_SESSION["id"]."'";
											$sorgu=mysqli_query($baglan,$sql);
											$a=1;
											while( $sonuc=mysqli_fetch_assoc($sorgu) )
											{
											  
										           
									?>
									   <div class="row">
									   	
									   
									     	 <div class="col-md-1"><strong><?php  echo $a; ?></strong></div>
									     	 <div class="col-md-5"><?php echo  $sonuc["ders_adi"]; ?><br>(<?php  echo $sonuc["ders_devamsizlik"]-$sonuc["durum"]." hak kaldı"; ?>)</div>	

									 		 <div class="col-md-3">Şuanda <?php echo $sonuc["durum"] ?> devamsızlığınız var. 
									 		 	<br> 
									 		 		<?php 
									 		 			if(($sonuc["ders_devamsizlik"]-$sonuc["durum"])>0 && ($sonuc["ders_devamsizlik"]-$sonuc["durum"])<=2)
									 		 			{
									 		 				echo "<span style='font-size: 10px;color: red;font-weight:bold;'>Tehlike yaklaşıyor aman dikkat -_-</span>";
									 		 			}
									 		 			else if(($sonuc["ders_devamsizlik"]-$sonuc["durum"])>2)
									 		 			{
									 		 				echo "<span style='font-size: 10px;color: green;font-weight:bold;'> Şuanda güvendesiniz :) </span>";
									 		 			}
									 		 			else if(($sonuc["ders_devamsizlik"]-$sonuc["durum"])==0 || ($sonuc["ders_devamsizlik"]-$sonuc["durum"])<0)
									 		 			{
									 		 				echo "<span style='font-size: 10px;background-color:red;font-weight:bold;'> Devamsızlık Hakkınız Dolmuştur :( </span>";
									 		 			}							 		 			 
									 		 		?>
									 		 </div>
 
									 		 <!--
													echo "<a href=index.php?durum=1&id=".$sonuc['id']." class='btn btn-primary disabled' > +1 </a> 
									 		 					/ 
									 		 			  <a href=index.php?durum=0&id=".$sonuc['id']." class='btn btn-danger'> -1 </a>";
									 		 -->
									 		 <div class="col-md-3">
									 		 	<?php  
									 		 		if($sonuc["ders_devamsizlik"]==$sonuc["durum"] && $sonuc["ders_devamsizlik"]-$sonuc["durum"]==$sonuc["ders_devamsizlik"])
									 		 		{
									 		 			echo "<a href=index.php?durum=1&id=".$sonuc['id']." class='btn btn-primary disabled' > +1 </a> / ";
									 		 			echo "<a href=index.php?durum=0&id=".$sonuc['id']." class='btn btn-danger disabled'> -1 </a>";
									 		 		}
									 		 		else if($sonuc["ders_devamsizlik"]==$sonuc["durum"] && $sonuc["ders_devamsizlik"]-$sonuc["durum"]!=$sonuc["ders_devamsizlik"])
									 		 		{
									 		 			echo "<a href=index.php?durum=1&id=".$sonuc['id']." class='btn btn-primary disabled' > +1 </a> / ";
									 		 			echo "<a href=index.php?durum=0&id=".$sonuc['id']." class='btn btn-danger'> -1 </a>";
									 		 		}
									 		 		else if($sonuc["ders_devamsizlik"]!=$sonuc["durum"] && $sonuc["ders_devamsizlik"]-$sonuc["durum"]==$sonuc["ders_devamsizlik"])
									 		 		{
									 		 			echo "<a href=index.php?durum=1&id=".$sonuc['id']." class='btn btn-primary' > +1 </a> / ";
									 		 			echo "<a href=index.php?durum=0&id=".$sonuc['id']." class='btn btn-danger disabled'> -1 </a>";
									 		 		}
									 		 		 else
									 		 		 {
									 		 		 	echo "<a href=index.php?durum=1&id=".$sonuc['id']." class='btn btn-primary' > +1 </a> / ";
									 		 			echo "<a href=index.php?durum=0&id=".$sonuc['id']." class='btn btn-danger'> -1 </a>";
									 		 		 }
									 		 	?>
									 		 </div>
									 		 		
									    </div>
 										<hr>
									    <?php 
									    	$a++;
											} //while bitiş parantezi
										}

										?>
							  
										<?php //Burada Devamsızlığı arttırıp eksiltiyoruz
											if($_GET)
											{
												if ($_GET["durum"]==1) 
												{
														$sql = "UPDATE dersler SET durum=durum+1 WHERE id='".$_GET["id"]."'";
														$sonuc= mysqli_query($baglan,$sql);
														if($sonuc>0) 
														{ 			
															header("Location:index.php#derstakip");													
														}
														else
														{

															echo "Bir problem oluştu, verileri kontrol ediniz";
														}	
												}
												elseif ($_GET["durum"]==0) 
												{
														$sql = "UPDATE dersler SET durum=durum-1 WHERE id='".$_GET["id"]."'";
														$sonuc= mysqli_query($baglan,$sql);
														if($sonuc>0) 
														{ 			
															header("Location:index.php#derstakip");													
														}
														else
														{

															echo "Bir problem oluştu, verileri kontrol ediniz";
														} 
												}	
											}

										?>
						 </div>
						
					</div>
				</div>
				<div class="row"> <!-- REKLAM-AŞAĞI-->
					<div class="col-md-12 sol-3"> 
						<img src="images/indir.jpg"   alt="Responsive image" style="width: 100%;height: 200px;">
					</div>
				</div>			<!-- REKLAM-AŞAĞI-->	
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