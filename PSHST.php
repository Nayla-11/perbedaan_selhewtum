<?php require 'fgnfggg.php' ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PERBEDAAN SEL TUMBUHAN DAN HEWAN</title>
        <link href="styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
            <img src="kumpulanhewan.jpg" width="200" height="200"/>
            <img src="kumpulantumbuhan.jpg" width="200" height="200"/>

    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">PERBEDAAN SEL TUMBUHAN DAN HEWAN</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">SEL TUMBUHAN</th>
                                    <th class="text-center">JENIS PERBEDAAN</th>
                                    <th class="text-center">SEL HEWAN</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                $Datasel = mysqli_query($conn,"select * from no");
                                while($data=mysqli_fetch_array($Datasel)){
                                    $i = 1;
                                    $NO = $data["NO"];  
                                    $SELTUM = $data["SELTUM"];
                                    $PERBEDAAN = $data["JP"];
                                    $SELWAN = $data["SELWAN"];
                                
                            ?>
                                    <tr>
                                        <td><?= $NO; ?></td>
                                        <td><?= $SELTUM; ?></td>
                                        <td><?= $PERBEDAAN; ?></td>
                                        <td><?= $SELWAN; ?></td>
                                    
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data<?= $NO; ?>">
                                                Tambah
                                            </button>
                                            <?php if ($NO !== null):?>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-data<?=$NO;?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-data<?=$NO;?>">
                                                    Delete
                                                </button>
                                            <?php endif ?>       
                                        </td>
                                    </tr>



                        <!-- The Modal -->
                        <div class="modal fade" id="tambah-data<?= $NO; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="SELTUM" placeholder="sel tumbuhan" class="form-control">
                                                        <br />
                                                        <input type="text" name="JP" placeholder="jenis perbedaan" class="form-control">
                                                        <br />
                                                        <input type="text" name="SELWAN" placeholder="sel hewan" class="form-control"/> 
                                                        <button type="submit" class="btn btn-primary" name="addnewdata">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="edit-data<?= $NO; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                    <input type="text" name="SELTUM" placeholder="sel tumbuhan" class="form-control">
                                                        <br />
                                                        <input type="text" name="JP" placeholder="jenis perbedaan" class="form-control">
                                                        <br />
                                                        <input type="text" name="SELWAN" placeholder="sel hewan" class="form-control"/>
                                                        <input type="hidden" name="NO" value="<?=$NO;?>"/> 
                                                        <button type="submit" class="btn btn-primary" name="editdata">Submit</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="delete-data<?=$NO;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                        
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete Data?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus data yang masuk ? 
                                                        <input type="hidden" name="NO" value="<?=$NO;?>"/>
                                                        <br/>
                                                        <br/>
                                                        <button type="submit" class="btn btn-danger" name="hapusdata">Hapus</button>
                                                    </div>
                                                </form>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php
                                };

                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>