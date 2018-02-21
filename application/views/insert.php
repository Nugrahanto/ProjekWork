<!DOCTYPE html>
<html>
<head>
	<title>INSERT</title>
	<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="http://localhost/rest_ci/index.php/conview/tambah">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Info
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                        	<div class="input-group">
                                <label style="width: 150px;">Jenis</label>
                                <select name="jenis" style="width: 100px;">
                                	<option value="1">Lomba</option>
                                	<option value="2">Seminar</option>
                                	<option value="3">Loker</option>
                                </select>
                            </div>
                            <br>
                            <div class="input-group">
                                <label style="width: 150px;">Kategori</label>
                                <input type="" name="kategori">
                            </div>
                            <br>
                            <div class="input-group">
                                <label style="width: 150px;">Akun</label>
                                <input type="" name="akun">
                            </div>
                            <br>
                            <div class="input-group">
                                <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
                                <label style="width: 150px;">Nama Event</label>
                                <input type="" name="nama_event">
                            </div>                           
                            <br>
                            <div class="input-group">
                                <label style="width: 150px;">Penyelenggara</label>
                                <input type="" name="penyelenggara">
                            </div>
                            <br>
                            <div class="input-group">
                            	<label style="width: 150px;">Tanggal</label>
				                <input type="text" id="datepicker" name="tanggal">
							</div>
							<!-- <br>
                            <div class="input-group">
                            	<label style="width: 150px;">Tanggal</label>
                                <input type="" name="tanggal">
							</div> -->
							<br>
                            <div class="input-group">
                            	<label style="width: 150px;">Waktu</label>
                                <!-- <input type="" name="waktu" class="timepicker"> -->
                                <input id="timepicker2" type="" name="waktu">
							</div>
							<br>
                            <div class="input-group">
                            	<label style="width: 150px;">Lokasi</label>
                                <input type="" name="tempat">
							</div>
                            <br>
                            <div class="input-group">
                                <label style="width: 150px;">Deskripsi</label>
                                <textarea name="deskripsi"></textarea>
                            </div>
                            <br>
                            <div class="input-group">
                                <label style="width: 150px;">Foto</label>
                                <input type="file" name="foto">
                            </div>
                            <br>
                            <div class="form-group">
                                <label style="width: 150px;">Berbayar</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="bayar" id="optionsRadios1" value="bayar" checked>YA
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="bayar" id="optionsRadios2" value="gratis">TIDAK
                                                </label>
                                            </div>
                            </div>
                            <div class="daftar-position">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <input type="submit" name="submit" value="Tambah" class="btn btn-block btn-md btn-primary">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <input type="reset" name="reset" value="Reset" class="btn btn-block btn-md btn-danger">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </form>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker2.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM-DD-YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script type="text/javascript">
            $('#timepicker2').timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });
        </script>
</html>