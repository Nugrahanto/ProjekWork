        <div class="container-fluid">
            <div class="block-header">
               <!-- <h2>DASHBOARD</h2> -->
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">LOMBA</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                <?php 
                                    $lomba = 1;
                                    echo $this->db->where('id_jenis', $lomba)->count_all_results('tb_informasi');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">SEMINAR</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                                <?php 
                                    $seminar = 2;
                                    echo $this->db->where('id_jenis', $seminar)->count_all_results('tb_informasi');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">LOWONGAN KERJA</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                <?php 
                                    $loker = 3;
                                    echo $this->db->where('id_jenis', $loker)->count_all_results('tb_informasi');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">OTHER</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                <?php 
                                    $other = 4;
                                    echo $this->db->where('id_jenis', $other)->count_all_results('tb_informasi');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="container-fluid">
                <div class="block-header">
                    <h2>INFORMASI TERDEKAT</h2>
                    <small>Data informasi terdekat sebelum tanggal <?php 
                       $date = date("d M Y");
                       echo $date; ?>
                    </small>
                </div>
                <!-- Basic Examples -->
                <div class="row clearfix">
                    
                    <?php
                    foreach ($all as $data) {
                        $tgl = date("d-m-Y", strtotime($data->tanggal));
                        echo '
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box bg-light-grey" style="height: auto;">
                                    <div class="content">
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                            <p style="font-size: 12pt;text-align:right"><i class="glyphicon glyphicon-thumbs-up" style="font-size: 10pt;"></i> '.$data->suka.'</p>
                                        </div>
                                        <div>
                                            <img src="'.$data->foto.'" style="width: 100%; height:250px;">
                                            <a href="'.base_url().'index.php/admin/detail_informasi/'.$data->id_informasi.'">
                                                <div style="height:40px;">
                                                    <h4>'.$data->nama_event.'</h4>
                                                </div>
                                            </a>
                                            <p style="font-size:9pt;color:red;">'.$tgl.' | '.$data->waktu.'<span style="padding:4px;color:white;float:right;background-color:#B7292D;">'.$data->nama_jenis.'</span></p>
                                            <div style="height:40px;">
                                                <p>Oleh : '.$data->penyelenggara.'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    ';
                    }
                    ?>
                </div>
            </div>
        </div>

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
    