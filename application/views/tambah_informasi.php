<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Informasi</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/customstyle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>uhuy/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url(); ?>uhuy/css/css.css" rel='stylesheet' type='text/css' />
  </head>
  <body>    
            <?php
                if (!empty($notif)) {
                    echo '<div class="alert alert-danger">'.$notif.'<br>Klik tombol refresh dibawah</div>';
                }
            ?>
        <div class="content-top ">
            <div class="container ">
                <div class="spec ">
                    <h3>TAMBAH INFORMASI</h3>
                    <div class="ser-t">
                        <b></b>
                        <span><i></i></span>
                        <b class="line"></b>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-sm-12">
                      <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url();?>admin/insert_info"> 
                          <div class="box-body">

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="id_jenis">Jenis</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            <select class="form-control show-tick" name="id_jenis">
                                    <option value="">-- Please select --</option>
                                    <?php 
                                        $jenis = $this->db->query("SELECT id_jenis, nama_jenis FROM tb_jenis")
                                                                                        ->result();

                                        if (!empty($jenis)) {
                                            foreach ($jenis as $data) {
                                                echo "<option value='".$data->id_jenis."' >".$data->nama_jenis."</option>";
                                            }
                                        }
                                    ?>  
                                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama_event">Nama</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            <input type="text" name="nama_event" id="nama_event" class="form-control" placeholder="Nama Informasi">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="penyelenggara">Penyelenggara</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" placeholder="Penyelenggara">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tanggal">Tanggal</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            <input type="text" class="form-control" placeholder="dd-mm-YYYY" name="tanggal">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="waktu">Waktu</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            <input type="text" name="waktu" id="waktu" class="form-control" placeholder="HH.mm">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="biaya">Berbayar</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="demo-radio-button">
                                            <input type="radio" class="with-gap" id="radio_3" name="biaya" checked value="Ya" />
                                            <label for="radio_3">Ya</label>
                                            <input type="radio" id="radio_4" class="with-gap" name="biaya" value="Tidak" />
                                            <label for="radio_4">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!-- <div id="map" style="width: 50%;"></div> -->
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="maps">Tempat Pelaksanaan</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="line">
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input id="address" type="textbox" placeholder="Lokasi Tempat Pelaksanaan" class="form-control" name="maps" />
                                                    <input id="btn" type="button" value="Cari Lokasi" class="submit btn btn-md btn-primary margin-top">    
                                                    <input type="text" id="latitude" readonly class="form-control margin-top" placeholder="Latitude" name="lat" />
                                                    <input type="text" id="longitude" readonly class="form-control margin-top" placeholder="Longitude" name="long" />
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-map">
                                                        <div id="map"></div>
                                                    </div>
                                                </div>
                                            </div>

<!--                                             <div id="floating-panel">
                                                <input id="address" type="textbox" placeholder="Lokasi Tempat Pelaksanaan" class="form-control" style="width: 50%;" name="maps" />
                                                <input id="btn" type="button" value="Cari Lokasi" class="submit btn btn-md btn-primary" style="margin-top: 1%;">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="deskripsi" rows="4" class="form-control no-resize auto-growth" placeholder="Deskripsi"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="foto">Foto Jenis</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" id="foto_jenis"
                                name="foto" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <input type="submit" name="submit" class="btn btn-success btn-md" value="Tambah"> 
                            <!-- <a href="<?php echo base_url(); ?>admin/tambah_informasi" class="btn btn-md btn-primary">
                            Refresh</a> -->
                            <a href="<?php echo base_url(); ?>admin/informasi" class="btn btn-md btn-warning">Kembali</a>
                          </div>
                          <!-- /.box-body -->
                        </form>
                    </div>
                </div>
                <br>
        </div>
    </div>

    <!-- <div id="map"></div> -->

    <!-- <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script> -->
    <script>
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -7.976830000000001, lng: 112.658957999999998}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('btn').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

        function showResult(result) {
        document.getElementById('latitude').value = result.geometry.location.lat();
        document.getElementById('longitude').value = result.geometry.location.lng();
    }

    function getLatitudeLongitude(callback, address) {
        // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
        address = address || 'Ferrol, Galicia, Spain';
        // Initialize the Geocoder
        geocoder = new google.maps.Geocoder();
        if (geocoder) {
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    callback(results[0]);
                }
            });
        }
    }

    var button = document.getElementById('btn');

    button.addEventListener("click", function () {
        var address = document.getElementById('address').value;
        getLatitudeLongitude(showResult, address)
    });
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi6QzPmGh8sZntFyfao3vi3k8sTJ7EAno&callback=initMap">
    </script>
  </body>
</html>