    <form method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url();?>admin/do_edit/<?php echo $detail_info->id_informasi; ?>">
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
                                EDIT LOMBA
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
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <div class="input-group">
                                                <label>Nama Event :</label>
                                                <div class="form-line">
                                                    <input type="text" id="nama_event" name="nama_event" autofocus class="form-control" value="<?php echo $detail_info->nama_event; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label>Jenis :</label>
                                                <select class="form-control show-tick" name="jenis">
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
                                            <div class="input-group">
                                                <label>Penyelenggara :</label>
                                                <div class="form-line">
                                                    <input type="text" id="penyelenggara" name="penyelenggara" autofocus class="form-control" value="<?php echo $detail_info->penyelenggara; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label>Lokasi :</label>
                                                <div class="form-line">
                                                    <input type="text" id="lokasi" name="lokasi" autofocus class="form-control" value="<?php echo $detail_info->maps; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <div class="input-group">
                                                <label>Tanggal Pelaksanaan :</label>
                                                <div class="form-line">
                                                    <input type="text" id="tanggal" name="tanggal" autofocus class="form-control" value="<?php 
                                                    $tgl = date("d-m-Y", strtotime($detail_info->tanggal));
                                                    echo $tgl;
                                                ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label>Waktu Pelaksanaan :</label>
                                                <div class="form-line">
                                                    <input type="text" id="waktu" name="waktu" autofocus class="form-control" value="<?php echo $detail_info->waktu; ?>" style="padding-left: 2%;"/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label>Biaya :</label>
                                                <br>
                                                <p><?php echo $detail_info->biaya;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Pengirim :</label>
                                                <p><?php echo $detail_info->nama_akun;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Suka dan Lihat :</label>
                                                <p><?php echo $detail_info->suka.' suka, '.$detail_info->lihat;?> lihat</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="input-group deskripsi">
                                                <label>Deskripsi :</label>
                                                <div class="form-line">
                                                    <textarea id="deskripsi" name="deskripsi" rows="1" class="form-control no-resize auto-growth" placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)" style="text-align: justify;"><?php echo $detail_info->deskripsi; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                        <div id="foto-poster">
                                            <img src="<?php echo $detail_info->foto?>">
                                        </div>
                                    </div>
                                    <br>

                                    <!-- LINK KEMBALI KE TABEL DATA LOMBA -->
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
                                        <a href="<?php echo base_url(); ?>admin/informasi" class="btn btn-md btn-primary">Kembali</a>
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