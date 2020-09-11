<div class="sabit">
					 		 <div class="banner">
					 		 	<img src="images/login/avatar.png" class="rounded-circle img-thumbnail" alt="profile" style="width: 150px;margin-top: 20px;">			
					 		 </div>	
 
				 		 	<div class="bilgi">
				 		 				<span><?php 
				 		 				if(isset($_SESSION["login"])) { echo mb_strtoupper($_SESSION["ad"],"UTF-8")." ".mb_strtoupper($_SESSION["soyad"],"UTF-8"); }  
				 		 				else{
				 		 					echo "Lütfen üye olunuz :)";
				 		 				}

				 		 				 ?> </span>
				 						<div>
					 						<span>
					 							<?php
					 								if(isset($_SESSION["login"])) {
					 							?>
					 		 					<button onclick="window.location.href='ayarlar.php'" style="width:auto; background-color:#006400;border-radius: 10px;" class="loginbuton">Ayarlar</button>| 
					 		 					<button onclick="document.getElementById('cikis').style.display='block'" style="width:auto; background-color:#a40000;			border-radius: 10px;" class="loginbuton">ÇIKIŞ</button>	

					 		 					<?php
					 		 						}
					 		 					?>
					 		 				</span>
					 		 			</div>
				 		 	</div>
					 		 <div class="info">
					 		 	 <span>
					 		 	 	<?php
					 								if(isset($_SESSION["login"])) {
					 									echo "Kayıt tarihiniz:".$_SESSION["tarih"];
					 								}
					 				?>
					 		 		  
					 		 				 	 
					 		 	</span>			  	
					 		</div>
</div> 
<!-- ÇIKIŞ EKRANI -->
		<div id="cikis" class="modal">
			  <form class="modal-content animate" action="" method="post">
				    <div class="container">
							<label><b>Çıkış Yapmak İstiyor musunuz?</b></label>
				    </div>

				    <div class="container" style="background-color:#f1f1f1">
				      	<button type="submit" class="cancelbtn loginbuton" style="background-color: green;" name="evet">Evet</button>
				      	<button type="button" onclick="document.getElementById('cikis').style.display='none'" class="cancelbtn loginbuton">Cancel</button>
				    </div>

			  </form>
		</div>
		<?php
			if (isset($_POST["evet"]))
			{	
					session_destroy();
					header("location: index.php");
			}
		?>
<!-- ÇIKIŞ EKRANI -->

<!-- Sabit Alt Reklam 
 <div class="sabit2" style="text-align: center;vertical-align: middle;display: grid;">  
					 		<span style="float:left; font-size:16px; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);font-size: 55px;">REKLAM</span>
					 		<img src="logo/devamsizlik.png" style="max-height:100%;padding:0;min-width:100%;"> resim dive göre uyum sağlıyor
</div>

 -->