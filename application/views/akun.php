        <div class="container-fluid">
            <div class="block-header">              
                <h2>TABEL AKUN</h2>
                <small>Pengguna telboard berjumlah <?php echo $this->db->count_all_results('tb_akun');?></small>
                <br>
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
                                            <th style="width: auto; margin: 0px auto;">Foto</th>
                                            <th>Nama Siswa</th>
                                            <th>Email Siswa</th>
                                            <th>ID Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($t_akun as $data) {
                                            echo '
                                                <tr class="odd gradeX">
                                                    <td>'.$no.'</td>
                                                    <td><img src="'.$data->foto_akun.'" style="width:100%; text-align:center; margin: 0px auto; border-radius:50px;"></td>
                                                    <td>'.$data->nama_akun.'</td>
                                                    <td>'.$data->email.'</td>
                                                    <td>'.$data->id_akun.'</td>
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

