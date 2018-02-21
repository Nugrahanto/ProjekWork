        <div class="container-fluid">
            <div class="block-header">            
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
                                            <th>Nama Event</th>
                                            <th>Nama Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($suka as $data) {
                                            echo '
                                                <tr class="odd gradeX">
                                                    <td>'.$no.'</td>
                                                    <td>'.$data->nama_event.'</td>
                                                    <td>'.$data->nama_akun.'</td>
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