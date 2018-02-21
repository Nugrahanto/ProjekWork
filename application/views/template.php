<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- notif alert delete -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.css">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/customstyle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>uhuy/css/css.css" rel='stylesheet' type='text/css' />

</head>

<body class="theme">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php base_url(); ?>home">ADMINBSB - TEL BOARD</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">INFORMASI TERBARU</li>
                            <li class="body">
                                <ul class="menu">
                                <?php
                                    $info = $this->db->order_by('id_informasi','DESC')
                                                    ->join('tb_jenis','tb_jenis.id_jenis = tb_informasi.id_jenis')
                                                    ->join('tb_akun','tb_akun.id_akun = tb_informasi.id_akun')
                                                    ->get('tb_informasi', 4)
                                                    ->result();
                                foreach ($info as $data) {
                                echo '
                                    <li>
                                        <a href="'.base_url().'index.php/admin/detail_informasi/'.$data->id_informasi.'">
                                        <div>
                                            <div class="col-md-2">
                                                <div class="icon-circle">
                                                    <img src="'.$data->foto.'" style="width:20px;">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="menu-info"">
                                                    <h4>'.$data->nama_event.'</h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> '.$data->tanggal.' | '.$data->nama_jenis.'
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    ';
                                }
                                ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="<?php base_url(); ?>informasi">Lihat Semua Informasi</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" id="notifylink">
                            <i class="material-icons">flag</i>
                            <span class="label-count" id="msg_count">9</span>
                        </a>
                        <ul class="dropdown-menu" id="notificationContainer">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
            <?php 
                $akun = $this->db->where('id_akun', 1)
                                 ->get('tb_akun')
                                 ->row();
            echo '
            <div class="row">
                <div class="col-md-3">
                    <div class="image">
                        <img src="'.$akun->foto_akun.'" width="48" height="48" alt="Admin" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="info-container col-md-7">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$akun->nama_akun.'</div>
                        <div class="email">'.$akun->email.'</div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="/rest_ci/admin/profil"><i class="material-icons">person</i>Profile</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="'.base_url().'admin/logout"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
                ';
                ?>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="/rest_ci/admin/home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Informasi</span>
                        </a>
                        <ul class="ml-menu">
                        <li>
                            <a href="/rest_ci/admin/informasi">Semua Informasi</a>
                        </li>
                        <?php
                            foreach ($jenis as $data) {
                                echo '
                            <li>
                                
                                <a href="'.base_url().'admin/event/'.$data->id_jenis.'">'.$data->nama_jenis.'</a>
                            </li>
                                ';
                            }
                        ?>
                            <!-- <li>
                                <a href="<?php base_url(); ?>seminar">Seminar</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="/rest_ci/admin/jenis">
                            <i class="material-icons">subject</i>
                            <span>Jenis Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rest_ci/admin/waiting">
                            <i class="material-icons">announcement</i>
                            <span>Waiting List</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>OTHER</span>
                        </a>
                        <ul class="ml-menu">
                        <li>
                            <a href="/rest_ci/admin/akun">Tabel Akun</a>
                        </li>
                        <li>
                            <a href="/rest_ci/admin/suka">Tabel Suka</a>
                        </li>
                        <li>
                            <a href="/rest_ci/admin/token">Tabel Token</a>
                        </li>
                        </ul>
                    </li>
                    <li class="active">
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="demo-settings">
                        <p>SMK TELKOM MALANG</p>
                        <ul class="setting-list">
                            <li>
                                <span>VISI :</span>
                                <span style="text-align: justify;">
                                    <ol style="padding: 0px 0px 0px 10px; text-align: left;list-style: none;">
                                        <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Mewujudkan lembaga pendidikan dan pelatihan ICT yang bertaraf internasional sehinggan mampu menghasilkan lulusan yang mandiri, beriman, dan bertakwa.</h6></li>
                                    </ol>
                                </span>
                            </li>
                            <li>
                                <span>MISI :</span>
                                <span>
                                    <ol type="1" style="padding: 0px 0px 0px 10px; text-align: left;">
                                      <!-- <li style="border-top: none;"><h6>Meningkatkan profesionalime lembaga melalui peningkatan sumber daya pendidikan, di semua lini secara berkesinambungan.<h6></li>
                                      <li style="border-top: none;"><h6>Melaksanakan sistem pendidikan dan pelatihan berbasis Sistem Manajemen Mutu ISO 9001:2008.</h6></li>
                                      <li style="border-top: none;"><h6>Meningkatkan kualitas lulusan melalui sertifikasi profesi.</h6></li>
                                      <li style="border-top: none;"><h6>Meningkatkan peran serta masyarakat dan alumni dalam penyelenggaraan pendidikan dan pelatihan.</h6></li>
                                      <li style="border-top: none;"><h6>Menciptakan suasana pendidikan dan pelatihan yang berwawasan lingkungan.</h6></li> -->
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Meningkatkan profesionalime lembaga melalui peningkatan sumber daya pendidikan, di semua lini secara berkesinambungan.</h6></li>
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Melaksanakan sistem pendidikan dan pelatihan berbasis Sistem Manajemen Mutu ISO 9001:2008.</h6></li>
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Meningkatkan kualitas lulusan melalui sertifikasi profesi.</h6></li>
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Meningkatkan peran serta masyarakat dan alumni dalam penyelenggaraan pendidikan dan pelatihan.</h6></li>
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Meningkatkan peran serta masyarakat dan alumni dalam penyelenggaraan pendidikan dan pelatihan.</h6></li>
                                      <li style="padding: 0px 5px 0px 5px; border-top: none;"><h6>Menciptakan suasana pendidikan dan pelatihan yang berwawasan lingkungan.</h6></li>
                                    </ol>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">

        <?php 
            $this->load->view($main_view);
        ?>

    </section>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi6QzPmGh8sZntFyfao3vi3k8sTJ7EAno&callback=initMap">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/pages/index.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    <!-- notif alert delete -->
    <script src="<?php echo base_url();?>assets/plugins/sweetalert/sweetalert.min.js"></script>
        <?php 
            $notif = $this->session->set_flashdata('success');
            if ($notif == 'success') {
             echo '
              <script types="text/javascript\">
                  $(document).ready(function(){
                      swal({
                      title: "Good job!",
                      text: "You clicked the button!",
                      icon: "success",
                    });
                  });
                </script>
             ';
           } 
        ?>
    <script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
          type:"post",
          cache:false,
          dataType: "json"
        })

        $(document).on("click",".hapus-informasi",function(){
          var id_informasi=$(this).attr("data-id");
          swal({
            title:"Hapus Informasi",
            text:"Yakin akan menghapus informasi ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
            confirmButtonColor: '#F75A5A'
          },
            function(){
             $.ajax({
              url:"<?php echo base_url('admin/delete_info'); ?>",
              data:{id_informasi:id_informasi},
              success: function(response){
                if (response == "1") {
                    $("tr[data-id='"+id_informasi+"']").fadeOut("fast",function(){
                      $(this).remove();
                    });
                    swal("Success!", "Informasi Telah Dihapus", "success")
                    window.setTimeout(function(){ window.location = "/admin/informasi"; },3000);
                } else {
                    console.log("error");
                }
              }
             });
          });
        });
    });
    
</script>

<script type="text/javascript">
  $(document).ready(function()
{
$("#notifylink").click(function()    // onclick function for notification
{
$("#notificationContainer").fadeToggle(300);   // show notification div
$("#msg_count").fadeOut("slow");
return false;
});
 
//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();     // hide notification div
});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});
 
});

</script>

</body>

</html>