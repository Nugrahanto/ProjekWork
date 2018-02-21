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
                                            <th style="width: 20%; margin: 0px auto;">Poster</th>
                                            <th>Nama Event</th>
                                            <th>Jenis</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Penyelenggara</th>
                                            <th>Suka</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($event as $data) {
                                            $tgl = date("d-m-Y", strtotime($data->tanggal));
                                            echo '
                                                <tr class="odd gradeX">
                                                    <td>'.$no.'</td>
                                                    <td><img src="'.$data->foto.'" style="width:50%; text-align:center; margin: 0px auto; border:2px solid black"></td>
                                                    <td>'.$data->nama_event.'</td>
                                                    <td>'.$data->nama_jenis.'</td>
                                                    <td>'.$tgl.', '.$data->waktu.'</td>
                                                    <td>'.$data->penyelenggara.'</td>
                                                    <td>'.$data->suka.'</td>
                                                    <td class="center">
                                                        <a href="'.base_url().'admin/detail_informasi/'.$data->id_informasi.'"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-fullscreen edit" style="font-size: 10pt;"></button></i></a>
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