        <div class="container-fluid">
            <div class="block-header">
                <?php
                    if (!empty($notif)) {
                        echo '<div class="alert alert-success">'.$notif.'</div>';
                    }
                ?>                    
            </div>

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SEMUA INFORMASI
                            </h2>
                            <br>
                            <a href="<?php echo base_url(); ?>admin/tambah_informasi" class="btn btn-md btn-success">Tambah</a>
                            <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">TAMBAH</button> -->
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 20%; margin: 0px auto;">Poster</th>
                                            <th>Jenis Acara</th>
                                            <th>Nama Acara</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Penyelenggara</th>
                                            <th>Suka</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($all as $data) {
                                            $tgl = date("d-m-Y", strtotime($data->tanggal));
                                            echo '
                                                <tr class="odd gradeX" data-id='.$data->id_informasi.'>
                                                    <td>'.$no.'</td>
                                                    <td><img src="'.$data->foto.'" style="width:50%; text-align:center; margin: 0px auto; border:2px solid black"></td>
                                                    <td>'.$data->nama_jenis.'</td>
                                                    <td>'.$data->nama_event.'</td>
                                                    <td>'.$tgl.', '.$data->waktu.'</td>
                                                    <td>'.$data->penyelenggara.'</td>
                                                    <td>'.$data->suka.'</td>
                                                    <td class="center">
                                                        <!-- <a href="'.base_url().'admin/detail_informasi/'.$data->id_informasi.'"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-fullscreen edit" style="font-size: 13pt;"></button></i></a> -->
                                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#'.$data->id_informasi.'"><i class="glyphicon glyphicon-fullscreen edit" style="font-size: 13pt;"></button></i>
                                                        <button class="btn btn-sm btn-danger hapus-informasi" data-id="'. $data->id_informasi.'"><i class="glyphicon glyphicon-remove" style="font-size: 13pt;"></i></button>
                                                    </td>
                                                </tr>                                                                                                         
                                                ';
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Informasi</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="insert_info"> 
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
                
                <input type="submit" name="submit" class="btn btn-info" value="Tambah"> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>  
          
        </div>
      </div>

    <?php
        foreach ($all as $data) {
          echo '

      <div class="modal fade" id="'.$data->id_informasi.'" role="dialog">
      <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Informasi</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="'.base_url().'admin/edit_informasi/'.$data->id_informasi.'"> 
              <div class="box-body">
                            <div class="row clearfix" style="text-align:center">
                                <div class="col-lg-12 col-md-12 col-sm-10 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <img src="'.$data->foto.'" style="width: 25%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="id_jenis">Jenis Informasi</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="nama_event" id="nama_event" class="form-control" value="'.$data->nama_jenis.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama_event">Nama Informasi</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="nama_event" id="nama_event" class="form-control" value="'.$data->nama_event.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="penyelenggara">Penyelenggara</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="'.$data->penyelenggara.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="maps">Tempat Pelaksanaan</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="maps" id="maos" class="form-control" value="'.$data->maps.'" readonly>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="biaya">Berbayar</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="biaya" id="biaya" class="form-control" value="'.$data->biaya.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                        </div>
                        <div class="col-md-6">

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tanggal">Tanggal Pelaksanaan</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" class="form-control" name="tanggal" value="'.$tgl = date("d-m-Y", strtotime($data->tanggal)).'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="waktu">Waktu Pelaksanaan</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="waktu" id="waktu" class="form-control" value="'.$data->waktu.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="biaya">Pengirim</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="biaya" id="biaya" class="form-control" value="'.$data->nama_akun.'" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="maps">Suka</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="maps" id="maos" class="form-control" value="'.$data->suka.'" readonly>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-5 form-control-label">
                                    <label for="maps">Lihat</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <input type="text" name="maps" id="maos" class="form-control" value="'.$data->lihat.'" readonly>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                        <div>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div>
                                            <textarea name="deskripsi" rows="4" class="form-control no-resize auto-growth" readonly>'.$data->deskripsi.'</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
              <!-- <input type="submit" name="submit" class="btn btn-info" value="EDIT"> -->
              <a href="'.base_url().'admin/edit_informasi/'.$data->id_informasi.'"><button class="btn btn-primary btn-lg">EDIT</button></a>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>  
          
        </div>
      </div>


    ';}
  ?>

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

