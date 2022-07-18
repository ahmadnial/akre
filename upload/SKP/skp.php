
<?php
// panggil file 
include '../conn.php';
include "../../template/header.php";

?>
           
                            <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                <div class="col-sm-6">
                                    <!-- <h1 class="m-0"><center>SKP</center></h1> -->
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                   
                                </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                            </div>
                            <!-- /.content-header -->
                            <header>
                                <div class="container bg-success text-white mb-3 col-7 text-center shadow-lg p-2 mb-2 bg-body rounded">
                                    <h1>SASARAN KESELAMATAN PASIEN <b>(SKP)</b></h1>
                                </div>
                            </header>
                        <div class="container">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body row g-2">
                                        <div class="col-md mb-3">
                                        <form action="aksi.php" method="post" enctype="multipart/form-data">
                                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                        <input class="form-control col-sm-4" type="file" name="file" id="formFileMultiple" multiple>
                                        
                                        <label for="exampleFormControlTextarea1" class="form-label mt-3">Keterangan</label>
                                        <textarea class="form-control col-sm-4" name="keterangan" id="exampleFormControlTextarea1" rows="2"></textarea>
                                        <!-- <button type="submit" name="upload" value="Upload" class="btn btn-success mt-2">Upload</button> -->
                                        <input type="submit" class="btn btn-success mt-2" name="upload" value="Upload">
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        
                        
                        <div class="container">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="row">
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Upload</th>
                                                    <!-- <th>Tanggal Revisi</th> -->
                                                    <th>File</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <script>
                        function goToURL() {
                        window.open('files/08-12-21.pdf');
                        }
                        </script> -->
 
                    <?php
                          $sql="SELECT * FROM skp";
                          $no=0;
                          $no++;
                          //eksekusi query menampilkan data dari tabel Mhsw
                          $query=sqlsrv_query($conn,$sql) or die(sqlsrv_errors());;
                          //mengembalikan data row menjadi array dan looping data menggunakan while
                          while ($data=sqlsrv_fetch_array($query)) 
                          {
                          ?>
                  <tr>
                    <td><?=$no++?></td>
                    <td><?php echo $data['tgl_upload']; ?></td>
                    <td><?php echo $data['nm_file']; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" value="View PDF" id="btnShow" onclick="goToURL()" class="btn btn-success">View</button>
                    </div></td>
                  </tr>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <!-- <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">

                                    <embed src="files/08-12-21.pdf"
                                        frameborder="0" width="100%" height="400px">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                    </div>
                  <?php } ?>



<?php
// panggil file koneksi
include '../../template/footer.php';
?>
