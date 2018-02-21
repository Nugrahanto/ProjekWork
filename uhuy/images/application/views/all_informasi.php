        <div class="container-fluid">
            <div class="block-header">
                <h2>SEMUA INFORMASI</h2>
                <small>Data informasi telboard berjumlah <?php echo $this->db->count_all_results('tb_informasi');?></small>
                <br>
                <a href="<?php echo base_url(); ?>admin/tambah_informasi" class="btn btn-md btn-success">Tambah</a>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
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
                                                       <!-- <a href="'.base_url().'admin/detail_informasi/'.$data->id_informasi.'"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-fullscreen edit" style="font-size: 10pt;"></button></i></a> -->
                                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#'.$data->id_informasi.'"><i class="glyphicon glyphicon-fullscreen edit" style="font-size: 10pt;"></i></button>
                                                        <button class="btn btn-sm btn-danger hapus-informasi" data-id="'. $data->id_informasi.'"><i class="glyphicon glyphicon-remove" style="font-size: 10pt;"></i></button>
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
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="tambah_jenis"> 
              <div class="box-body">

                <div class="form-group">
                  <label for="id_jenis" class="col-sm-2 control-label">Jenis</label>

                  <div class="col-sm-10">
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
                                <input type="text" class="form-control" placeholder="dd-MM-yyyy" name="tanggal">
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
                                <input type="text" name="waktu" id="waktu" class=" form-control" placeholder="HH.mm">
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
                            <br>
                                <input name="group1" type="radio" class="with-gap" id="radio_3" name="biaya" checked />
                                <label for="radio_3">Ya</label>
                                <input name="group1" type="radio" id="radio_4" class="with-gap" name="biaya" />
                                <label for="radio_4">Tidak</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="maps">Tempat Pelaksanaan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="line">
                                <input type="text" name="maps" id="us2-address maps" class="form-control" placeholder="Tempat Pelaksanaan">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea name="deskripsi" rows="1" class="form-control no-resize auto-growth" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="maps">Tempat Pelaksanaan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="line">
                                <div id="floating-panel">
                                  <input id="address" type="textbox" placeholder="Enter address here" />
                                    <input id="btn" type="button" value="Geocode" class="submit">
                                </div>

                                <div id="map"></div>

                                <div>
                                    <p>Latitude:
                                        <input type="text" id="latitude" readonly />
                                    </p>
                                    <p>Longitude:
                                        <input type="text" id="longitude" readonly />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="foto_jenis" class="col-sm-2 control-label">Foto Jenis</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="foto_jenis"
                    name="foto_jenis" value="">
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
                                <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10">
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
