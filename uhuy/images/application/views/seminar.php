        <div class="container-fluid">
            <div class="block-header">
                
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SEMINAR
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 20%; margin: 0px auto;">Poster</th>
                                            <th>Nama Seminar</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Penyelenggara</th>
                                            <th>Suka</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($seminar as $data) {
                                            $tgl = date("d-m-Y", strtotime($data->tanggal));
                                            echo '
                                                <tr class="odd gradeX">
                                                    <td>'.$no.'</td>
                                                    <td><img src="'.$data->foto.'" style="width:50%; text-align:center; margin: 0px auto; border:2px solid black"></td>
                                                    <td>'.$data->nama_event.'</td>
                                                    <td>'.$tgl.', '.$data->waktu.'</td>
                                                    <td>'.$data->penyelenggara.'</td>
                                                    <td>'.$data->suka.'</td>
                                                    <td class="center">
                                                        <a href="'.base_url().'index.php/admin/detail_informasi/'.$data->id_informasi.'"><i class="glyphicon glyphicon-fullscreen edit"></i></a>
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