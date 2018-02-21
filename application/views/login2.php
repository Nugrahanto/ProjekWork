
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login | TELBOARD SMK Telkom Malang</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/customcss.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
	
	
	<div class="card1">
		<div class="ok">
		
		<div class="row" style="margin-bottom:0 !important;padding-top:0 !important;">
			<div class="col-md-4 text-danger text-center" style="font-size:80px;line-height:0px">
				<span class="glyphicon glyphicon-bullhorn"></span>
			</div>
		    <div class="col-md-8">
				<div class="logo">
		            <a href="javascript:void(0);"  style="font-size: 30pt;">TEL<span>BOARD</span></a>
		            <small>Tempat Informasi<br>SMK TELKOM MALANG (ADMIN)</small>
				</div>
			</div>
		</div>
		
		</div>
	</div>
	
        <div class="card">
            <div class="body">
                <form action="/rest_ci/admin/login" method="post" entype="multipart/form-data">
                    <div class="msg">Silahkan masukan Nama dan kata sandi.</div>
                    <?php
	                    if (!empty($notifError)) {
	                        echo '<div class="alert alert-danger">'.$notifError.'</div>';
	                    } else if (!empty($notifSuccess)) {
                            echo '<div class="alert alert-success">'.$notifSuccess.'</div>';
                        }
	                ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama_akun" placeholder="Nama" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            
                        </div>
                        <div class="col-xs-4">
                            <input class="btn btn-block bg-red waves-effect" type="submit" id="masuk" name="submit" value="MASUK">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-in.js"></script>
</body>
</html>