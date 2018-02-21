    <div class="container-fluid">
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
                                EDIT JENIS
                            </h2>
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
                            <form method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url();?>admin/do_edit_event/<?php echo $e_jenis->id_jenis; ?>">
                                <div class="table-responsive row">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <div class="input-group">
                                                    <label>Foto Jenis :</label>
                                                    <input type="file" class="form-control" id="foto_jenis" name="foto_jenis" required>
                                                </div>
                                                <div class="input-group">
                                                    <label><?php echo $e_jenis->nama_jenis;?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                            <div id="foto-poster">
                                                <img src="<?php echo base_url();?>uploads/<?php echo $e_jenis->foto_jenis?>">
                                            </div>
                                        </div>
                                        <br>

                                        <!-- LINK KEMBALI KE TABEL DATA LOMBA -->
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <a href="<?php echo base_url(); ?>admin/jenis" class="btn btn-md btn-primary">Kembali</a>
                                            <input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>