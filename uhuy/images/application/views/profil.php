    <form method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url();?>admin/do_edit_akun/<?php echo $akun->id_akun; ?>">
        <div class="container-fluid">
            <?php
                    if (!empty($notif)) {
                        echo '<div class="alert alert-warning">'.$notif.'</div>';
                    }
                ?>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA AKUN
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
                            <div class="table-responsive row">
                                <div class="panel-body">
                                    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                            <div class="input-group">
                                                <label>Email :</label>
                                                <div class="form-line">
                                                    <input type="text" id="email" name="email" autofocus class="form-control" value="<?php echo $akun->email; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                            <div class="input-group">
                                                <label>Nama :</label>
                                                <div class="form-line">
                                                    <input type="text" id="nama_akun" name="nama_akun" autofocus class="form-control" value="<?php echo $akun->nama_akun; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                            <div class="input-group">
                                                <label>Password :</label>
                                                <div class="form-line">
                                                    <input type="text" id="password" name="password" autofocus class="form-control" value="<?php echo $akun->password; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                        <div id="foto-poster">
                                            <img src="<?php echo $akun->foto_akun?>">
                                        </div>
                                    </div>

                                    <!-- LINK KEMBALI KE TABEL DATA LOMBA -->
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>