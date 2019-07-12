 <!--=	===============Home Banner Area =================-->
        <section class="home_banner_area" id="home">
            <div class="banner_inner">
				<div class="container">
					<div class="row ">
						<div class="col-lg-9" style="margin-top: 50px;">
							<div class="banner_content">
								<h2>Pilih Sekolah</h2>
							</div>
							<form action="<?php echo site_url().'/beranda/main' ?>" method="post" style="width: 500px; ">
								<select class="wide" style="width: 50px;" name="id_sekolah">
									<option data-display="Pilih Sekolah" value="0">Pilih Sekolah</option>
									<?php 
										foreach ($sekolah->result() as $key ) { ?>
											<option value="<?php echo $key->id_sekolah ?>">
												<?php echo $key->nama_sekolah ?>
													
												</option>
									<?php 	}
									?>
								</select>
								<div class="input-group" style="padding-top: 10px;">
										<label style="margin-right: 10px; font-size: 15px; color: white; font-family: verdana; ">Pin Sekolah </label>	
                                        <input name="password" required="" type="password" style="border-radius: 5px;  padding-left: 10px;">
                                        	
                                </div>	
                                <?php 
								if (isset($salah_pin)) { ?>
									<label style="color: pink;"><?php echo $salah_pin; ?></label>
								<?php }
							?>
								<br>
								<button class="banner_btn" style="font-family: cooper; font-size: 15px;">Pilih</button>
							</form>
							
							<!-- <a class="banner_btn" href="#">Explore Now</a> -->
						</div>
						<div class="col-lg-3">
							<div class="banner_map_img">
								<img class="img-fluid" src="<?php echo base_url('front/img/banner/right-mobile-sori.png') ?>" alt="">
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
       


       