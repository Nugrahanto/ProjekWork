        <div class="container-fluid">
            <div class="block-header">
                
            </div>
            <?php
                if (!empty($notif)) {
                    echo '<div class="alert alert-success">'.$notif.'</div>';
                }
            ?>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                JENIS INFORMASI
                            </h2>
                            <br>
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
                                            <th>ID Jenis</th>
                                            <th>Nama</th>
                                            <th style="width: 50px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($jenis as $data) {
                                            echo '
                                                <tr class="odd gradeX">
                                                    <td>'.$no.'</td>
                                                    <td><img src="'.base_url().'uploads/'.$data->foto_jenis.'" style="width:50%; text-align:center; margin: 0px auto; border:2px solid black"></td>
                                                    <td>'.$data->id_jenis.'</td>
                                                    <td>'.$data->nama_jenis.'</td>
                                                    <td>
                                                        <a href="'.base_url().'admin/edit_jenis/'.$data->id_jenis.'"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil edit" style="font-size: 10pt;"></i> Ganti Foto</button></a>
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
          <h4 class="modal-title">Tambah Jenis</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="tambah_jenis"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_jenis" class="col-sm-2 control-label">Nama Jenis</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_jenis" placeholder="Nama Jenis"
                    name="nama_jenis" value="">
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

      