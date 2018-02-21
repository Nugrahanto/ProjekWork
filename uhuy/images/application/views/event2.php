<!DOCTYPE html>
<html>
<head>
<title>Siswa | TELBOARD SMK Telkom Malang</title>
<!-- Favicon-->
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/tb.png">
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
							<li class=""><a href="<?php echo base_url(); ?>user" class="hyper "><span>Home</span></a></li>	
							
							<li class="dropdown active">
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

<div class="banner-top">
	<div class="container">
		<div class="clearfix"> </div>
	</div>
</div>
<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>
					INFORMASI
				</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l">

			<?php
				foreach ($event as $data) {
					date_default_timezone_set("Asia/Bangkok");
					$date = date("Y-m-d");
					$tanggal = date($data->tanggal);
					$tgl = date("d-m-Y", strtotime($data->tanggal));
					echo '
					<div class="col-md-3 m-w3ls">
						<div class="col-md2 box2">
							<a href="'.base_url().'user/detail_informasi/'.$data->id_informasi.'">
								<div class="box">
									<img src="'.$data->foto.'" class="img-responsive img1" alt="" style="border:2px solid black;height:250px;width:100%;">
								</div>
								<div class="big-sale2">
									<h3><span>'.$data->nama_event.'</span></h3>
									<p>'.$data->nama_jenis.'</p>
									<p>'.$tgl.' '.(($tanggal<=$date)?'(selesai)':"").'</p>
									<p>Oleh : '.$data->penyelenggara.'</p>
									<div class="like"><p><span><i class="glyphicon glyphicon-thumbs-up"></i> '.$data->suka.'</span></p></div>
								</div>
							</a>
						</div>
					</div>
					';
				}
			?>

							<div class="clearfix"></div>
				</div>
		</div>
	</div>

	<!-- product -->

	<div class="bottom-image">
		<img src="<?php echo base_url(); ?>/uhuy/images/hh.jpg">
	</div>