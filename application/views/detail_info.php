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
                                DETAIL LOMBA
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
                                                <p><?php echo $detail_info->nama_event;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Jenis :</label>
                                                <p><?php echo $detail_info->nama_jenis;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Penyelenggara :</label>
                                                <p><?php echo $detail_info->penyelenggara;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Lokasi :</label>
                                                <p><?php echo $detail_info->maps;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Berbayar :</label>
                                                <p><?php echo $detail_info->biaya;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <div class="input-group">
                                                <label>Tanggal Pelaksanaan :</label>
                                                <p>
                                                <?php 
                                                    $tgl = date("d-m-Y", strtotime($detail_info->tanggal));
                                                    echo $tgl;
                                                ?>
                                                </p>
                                            </div>
                                            <div class="input-group">
                                                <label>Waktu Pelaksanaan :</label>
                                                <p><?php echo $detail_info->waktu;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Pengirim :</label>
                                                <p><?php echo $detail_info->nama_akun;?></p>
                                            </div>
                                            <div class="input-group">
                                                <label>Suka :</label>
                                                <p><?php echo $detail_info->suka?> suka</p>
                                            </div>
                                            <div class="input-group">
                                                <label>Lihat :</label>
                                                <p><?php echo $detail_info->lihat?> lihat</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="input-group deskripsi">
                                                <label>Deskripsi :</label>
                                                <p><?php echo $detail_info->deskripsi;?></p>
                                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget augue facilisis, vulputate urna varius, vestibulum ante. Vestibulum ultricies congue dolor, ac dapibus leo tincidunt id. Donec nec porta augue. Cras vitae mauris eu sapien sollicitudin posuere. Morbi sed urna ullamcorper, tempus libero cursus, rutrum libero. Aliquam erat volutpat. Mauris et lorem ornare dolor congue condimentum quis in lacus. Morbi bibendum congue ligula, et tincidunt felis tincidunt ac. Duis ac laoreet ex. Vivamus eu finibus mi. Nullam sed sollicitudin tortor. Nam faucibus lectus tortor, laoreet eleifend diam iaculis eget. Praesent ultrices eu elit vitae efficitur. Sed non nunc consequat, malesuada felis sed, semper odio. Ut et arcu eget magna luctus rhoncus eleifend vitae elit. Aliquam ut orci pulvinar, finibus dolor sit amet, gravida lectus. Nam vitae magna venenatis leo iaculis pulvinar. Mauris tincidunt fringilla lacus, nec pellentesque sapien molestie lobortis. Sed consequat, quam congue condimentum cursus, tellus arcu feugiat ligula, sit amet tristique enim neque nec eros. Curabitur commodo placerat erat sagittis consectetur. Donec sed eleifend lacus. Aenean purus velit, molestie et quam at, maximus egestas magna. Fusce volutpat iaculis lobortis. Proin eu volutpat augue. Donec ac lacus pulvinar, dignissim mi ac, commodo justo. Vestibulum congue pellentesque ex, eget accumsan felis iaculis at. Morbi accumsan purus fermentum, elementum odio sit amet, euismod quam. Vivamus ut augue nec arcu tincidunt efficitur at sit amet metus. Quisque ultrices rutrum euismod.</p> -->
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
                                        <a href="<?php echo base_url(); ?>admin/edit_informasi/<?php echo $detail_info->id_informasi?>" class="btn btn-md btn-warning">Edit</a>
                                        <!-- <a href="<?php echo base_url(); ?>admin/hapus_informasi/<?php echo $detail_info->id_informasi?>" class="btn btn-md btn-danger hapus-karyawan">Hapus</a> -->
                                        <!-- <button class="btn btn-sm btn-danger hapus-karyawan" data-id="<?php echo $detail_info->id_informasi?>"><i class="glyphicon glyphicon-remove"></i></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>