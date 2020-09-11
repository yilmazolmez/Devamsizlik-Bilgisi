<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 logo">
					 
				         <a href="index.php"> 
				         	<img src="logo/devamsizlik.png" alt="">
				         </a>
				   	 
				</div>
				<div class="col-md-8 menu navbar navbar-expand-lg   navbar-light">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						          <span class="navbar-toggler-icon"></span>
						    </button>
						    <div class="collapse navbar-collapse" id="navbarResponsive">
							      <ul class="navbar-nav  ml-auto">
								        <li class="nav-item active ">
								          <a class="nav-link" href="index.php"   style="color:green!important;	">AnaSayfa
								                <span class="sr-only">(current)</span>
								           </a>
								        </li>
								        <li class="nav-item">
								         	 <a class="nav-link" href="index.php#derstakip">Devamsızlık Takip</a>
								        </li>
								         <li class="nav-item">
								         	 <a class="nav-link" href="iletisim.php">İletişim</a>
								        </li>
								        <?php
					 								if(!isset($_SESSION["login"])) {
					 					?>
								        <li class="nav-item">
								        	  <button style="width:auto;" class="loginbuton" onclick="window.location.href = 'uyeol.php';">Üye Ol</button> 
								        </li>
								         <li class="nav-item">
								        	  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="loginbuton">Üye Giriş</button>

								        </li>
								        <?php
								        	}
								        ?>
							      </ul>
						    </div>

				</div>
			</div>
		</div>
	</header>
<!-- Üye Giriş -->
<div id="id01" class="modal">
	  <form class="modal-content animate" action="" method="post">
		    <div class="imgcontainer">
		      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		      <img src="images/login/avatar.png" alt="Avatar" class="avatar">
		    </div>

		    <div class="container">
		      <label for="uname"><b>E-Mail</b></label>
		      <input type="text" placeholder="E-mail giriniz" name="mail" required>

		      <label for="psw"><b>Şifre</b></label>
		      <input type="password" placeholder="Şifrenizi giriniz" name="sifre" required>
		        
		      <button type="submit" class="loginbuton" name="giris">Giriş</button>
		    </div>

		    <div class="container" style="background-color:#f1f1f1">
			    <div class="row">
			    	<div class="col-md-3">
				      	<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn loginbuton">Cancel</button> 
				     </div>
				   	<div class='col-md-6'>
				      									       	<?php

																 		if (isset($_POST["giris"])) 
																 		{
																 			 
																 			$sql="select * from uyeler where mail='".$_POST["mail"]."' and sifre='".$_POST["sifre"]."'";
																 			$result=mysqli_query($baglan,$sql);
																			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

																 			if(mysqli_num_rows($result) == 1)
																 			{
																 				 $_SESSION["login"]="true";
																 				 $_SESSION["id"]=$row["id"];
																 				 $_SESSION["ad"]=$row["ad"];
																 				 $_SESSION["soyad"]=$row["soyad"];
																 				 $_SESSION["tel"]=$row["telefon"];
																 				 $_SESSION["mail"]=$row["mail"];
																 				 $_SESSION["sifre"]=$row["sifre"];
																 				 $_SESSION["tarih"]=$row["acilis_tarih"];
																 				header("Location:index.php");												 				 
																 			} 
																 			else
																 			{
																 				 
		 																		echo "<script>window.onload = function() {
																			   		document.getElementById('id01').style.display='block';
																			   			}
																			   	</script>";
																			   	echo "<span style='color:red;' id='sifrekontrol'>Mail veya şifreyi kontrol ediniz...</span>";
																 			}
																 		}
																 		
																 	 	echo "<span style='color:green;display:none;float:lef;font-size:15px;' id='giris'>Üye kayıt başarılı.Giriş yapınız.</span></div>";
																?>	
				   
				    <div class="col-md-3">
				     	 <span class="psw"> <a href="#"> Şifremi unuttum</a></span>
			   		</div>
			   	</div>
		    </div>
	  </form>
</div>

<!-- Üye Giriş -->

 