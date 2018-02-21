<!DOCTYPE html>
<html>
<head>
<title>Siswa | TELBOARD SMK Telkom Malang</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>uhuy/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>uhuy/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>uhuy/css/css.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="<?php echo base_url(); ?>uhuy/js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>uhuy/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>uhuy/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="<?php echo base_url(); ?>uhuy/css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!-- start-rate-->
<script src="<?php echo base_url(); ?>uhuy/js/jstarbox.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>uhuy/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!--//End-rate-->

</head>
<body>
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 class="redbg"><a href="<?php echo base_url(); ?>user">TEL Board</a><span style="font-size: 9pt;">INFORMASI <a href="www.smktelkom-mlg.sch.id">SMK TELKOM MALANG</a></span></a></h1>
			</div>
			<!-- <div class="head-t">
				<ul class="card">
					<li><a href="wishlist.html" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
					<li><a href="login.html" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="register.html" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					<li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
					<li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
				</ul>	
			</div> -->
			
				<div class="nav-top ">
					<nav class="navbar navbar-default ">
					
					<div class="navbar-header nav_2 ">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav white">
							<li class="active"><a href="<?php echo base_url(); ?>user" class="hyper "><span>Home</span></a></li>	
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Jenis<b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">
										<div class="col-sm-3">
											<ul class="multi-column-dropdown">
											 <?php
					                            foreach ($jenis as $data) {
					                                echo '
					                            <li>
					                                
					                                <a href="'.base_url().'user/event/'.$data->id_jenis.'">'.$data->nama_jenis.'</a>
					                            </li>
					                                ';
					                            }
					                        ?>
											</ul>
										
										</div><!-- 
										<div class="col-sm-3 w3l">
											<a href="kitchen.html"><img src="<?php echo base_url(); ?>uhuy/images/me.png" class="img-responsive" alt=""></a>
										</div> -->
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
							<li class=""><a href="<?php echo base_url(); ?>user/near_event" class="hyper "><span>Acara Terdekat</span></a></li>
						</ul>
					</div>
					</nav>
					<div class="cart" >
					<p><?php echo $this->session->userdata('level')?> | <a href="<?php echo base_url(); ?>user/logout"><span class="fa fa-sign-out my-cart-icon"></span></a></p>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>

<!---->
    <div class="container banner-top">
    </div>
<!--content-->
<div class="content-top ">
	<div class="container ">
		<div class="spec ">
			<h3>INFORMASI</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class="row">
			<?php
				foreach ($all as $data) {
					$tgl = date("d-m-Y", strtotime($data->tanggal));
					echo '
				<div class="col-md-3 m-wthree height top">
				<div class="tanggal"><p><span>'.$tgl.'<br>'.$data->nama_jenis.'</span></p></div>
					<div class="col-m height2">
						<a href="#" data-toggle="modal" data-target="#myModal'.$data->id_informasi.'" class="offer-img">
							<img src="'.$data->foto.'" class="img-responsive" alt="Foto '.$data->nama_event.'" style="height:170px;border:2px solid black;margin-bottom:-10%;">
							<div class="offer"><p><span><i class="glyphicon glyphicon-thumbs-up"></i> '.$data->suka.'</span></p></div>
						</a>
						<div class="mid-1">
							<div class="women judul">
								<h6><a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'">'.$data->nama_event.'</a></h6>
							</div>
							<div class="penyelenggara">
								<p>Oleh : '.$data->penyelenggara.'</p>
								<div class="clearfix"></div>
							</div>
							<div class="add">
							   <a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'"><button class="btn btn-danger my-cart-b">Lihat</button></a>
							</div>
							
						</div>
					</div>
				</div>
					';
			    }
			?>
		</div>
		
	</div>
	</div>
	</div>

<!--content-->
<div class="content-mid">
	<div class="container">
		
		<div class="col-md-4 m-w3ls">
			<div class="col-md1 bg-black thumbnail">
				<a href="/rest_ci/user/event/1">
					<img src="<?php 
					$foto = $jenis[0]->foto_jenis; echo base_url() . 'uploads/' . $foto?>" class="img-responsive img o-gambar" style="height: 100%; width: 100%;" alt="">
					<div class="big-sa">
						<h3>LOM<span>BA </span></h3>
						<p>Ikuti lombanya menangkan hadiahnya </p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls1">
			<div class="col-md bg-black thumbnail">
				<a href="/rest_ci/user/event/2">
					<img src="<?php 
					$foto = $jenis[1]->foto_jenis; echo base_url() . 'uploads/' . $foto?>" class="img-responsive img o-gambar" style="height: 100%; width: 100%;" alt="">
					<div class="big-sale">
						<div class="big-sale1">
							<h3>Sem<span>inar</span></h3>
							<p>Ikuti seminar dengan kualiatas terbaik </p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls">
			<div class="col-md2 bg-black thumbnail2">
				<a href="/rest_ci/user/event/3">
					<img src="<?php 
					$foto = $jenis[2]->foto_jenis; echo base_url() . 'uploads/' . $foto?>" class="img-responsive img1 o-gambar" style="height: 100%; width: 100%;" alt="">
					<div class="big-sale2">
						<h3>Lowongan <span>Pekerjaan</span></h3>
						<p>It is a long established fact that a reader </p>		
					</div>
				</a>
			</div>
			<div class="col-md3 bg-black thumbnail2">
				<a href="/rest_ci/user/event/4">
					<img src="<?php 
					$foto = $jenis[3]->foto_jenis; echo base_url() . 'uploads/' . $foto?>" class="img-responsive img1 o-gambar" style="height: 100%; width: 100%;" alt="">
					<div class="big-sale3">
						<h3>OTH<span>ER</span></h3>
						<p>It is a long established fact that a reader </p>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--content-->
  
<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>POPULER</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l">

						<?php
							foreach ($top as $data) {
								$tgl = date("d-m-Y", strtotime($data->tanggal));
								echo '
							<div class="col-md-3 m-wthree">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal'.$data->id_informasi.'" class="offer-img">
										<img src="'.$data->foto.'" class="img-responsive" alt="Foto '.$data->nama_event.'" style="height:170px;">
										<div class="offer"><p><span><i class="glyphicon glyphicon-thumbs-up"></i> '.$data->suka.'</span></p></div>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6 style="font-size:12pt;"><a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'">'.$data->nama_event.'</a></h6>	
										</div>
										<div class="mid-2">
											<p>Oleh : '.$data->penyelenggara.'</p>
											<div class="block">
												<div><p>'.$data->waktu.' | '.$data->tanggal.'</p></div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="add">
										   <a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'"><button class="btn btn-danger my-cart-btn my-cart-b">Lihat</button></a>
										</div>
										
									</div>
								</div>
							</div>
								';
							}
						?>

							<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<div class="bottom-image">
		<img src="<?php echo base_url(); ?>/uhuy/images/hh.jpg">
	</div>

	<!-- product -->
	<?php
							foreach ($all as $data) {
								date_default_timezone_set("Asia/Bangkok");
								$date = date("Y-m-d");
								$tanggal = date($data->tanggal);
								$tgl = date("d-m-Y", strtotime($data->tanggal));
								echo '
			<div class="modal fade" id="myModal'.$data->id_informasi.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="'.$data->foto.'" class="img-responsive" alt="Foto '.$data->nama_event.'">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3>'.$data->nama_event.'</h3>
									<div class="mid-2">
										<p>'.$data->waktu.' | '.$tgl.' '.(($tanggal<=$date)?'(selesai)':"").'</p>
										<div class="block">
											<div>
												<a href="#">
													<p>'.$data->maps.'</p><i class="glyphicon glyphicon-map-marker"></i>
												</a>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="price_single">
									  <span class="reducedfrom ">Oleh : '.$data->penyelenggara.'</span>
									
									 <div class="clearfix"></div>
									</div>
									<p class="in-para">Posted By : '.$data->nama_akun.'</p>
									 <div class="add-to">
									 <a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'">
										   <button class="btn btn-danger my-cart-btn1">View More</button>
									 </a>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				';
						    }
						?>
