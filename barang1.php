<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'barang';
switch ($aksi) {
    case 'barang':
        //list barang
        
            $query = "SELECT * FROM barang" ;
            $result = $db->query($query);

            $no=1; 
            foreach($result as $row): 
        
        ?>
        <main>
            <div class="container">
                <h3 class="display-4"> Data Barang </h3> 
                <br>
                <div class="col-sm-6">
                <?php if($_SESSION['level']=='admin'){?>
                    <button type="button" class="btn btn-warning float-sm-right" data-toggle="modal" data-target="#inputbarang">
                        Tambah Barang
                    </button>
                <?php }?>
                    
                </div>
                <br> 
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Action</th>                                   
                                </tr>
                            </tfoot>
                            <tbody> 
                                <?php 
                                    $query = "SELECT * FROM barang" ;
                                    $result = $db->query($query);

                                    $no=1; 
                                    foreach($result as $row): 
                                ?>                     
                                <tr>   
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['merk'] ?></td>
                                    <td><?= $row['stok'] ?></td>
                                    <td><?= $row['satuan'] ?></td> 
                                    <td>
                                        
                                        <a 
                                            data-toggle="modal" data-target="#edit" title="" class="btn btn-link btn-warning"
                                            data-original-title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm ('Apakah kamu yakin menghapusnya?')" href="prosesbarang.php?proses=hapusbarang&kode=<?=$row['kode']?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-warning"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>

                            
                                                                                                            
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>  

       <!-- Input Barang -->
        <div class="modal fade" id="inputbarang" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputBarangLabel">Input Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <strong>                     
                            <form class="form" action="prosesbarang.php?proses=insertbarang" method="post">   
                                <div class="form-group mt-3 mb-2">
                                    <label for="kode"> Kode Barang </label>
                                    <input type="text" class="form-control" id="kode" name="kode" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="nama"> Nama Barang </label>
                                    <input type="text" class="form-control" id="nama" name="nama" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="merk"> merk Barang </label>
                                    <input type="text" class="form-control" id="merk" name="merk" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="stok"> Stok </label>
                                    <input type="text" class="form-control" id="stok" name="stok" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="satuan"> Satuan </label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" required> 
                                </div>                                   
                                <br>                                         
                                <input type="submit" class="btn btn-primary center" name="submit" value=" Input ">
                                <br><br>  
                            </form>
                        </strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Barang -->
        
        <!-- Edit Barang -->

<div class="modal fade" id="edit<?= $row['kode'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputBarangLabel">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">  
                <form class="form" action="prosesbarang.php?proses=editbarang" method="post">   
                    <input type="hidden" name="kode" value="<?= $row['kode'] ?>">
                    <div class="form-group mt-3 mb-2">
                        <label for="nama"> Nama Barang </label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" required> 
                    </div>
                    <div class="form-group mt-3 mb-2">
                        <label for="merk"> Merk Barang </label>
                        <input type="text" class="form-control" id="merk" name="merk" value="<?= $row['merk'] ?>" required> 
                    </div>
                    <!-- Sisipkan field lain yang perlu diedit -->
                    <br>                                         
                    <input type="submit" class="btn btn-primary center" name="submit" value=" Update ">
                    <br><br>  
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

        
                  
        <?php
    break;

    case 'datastok':
        //list stok
        ?>                           
        <main>      
            <div class="container-fluid px-4">
                <h1 class="mt-4">Stok Barang</h1>  
                <!-- Tombol "Tambah Stok" untuk admin -->             
                <?php if($_SESSION['level']=='admin'){?>                                         
                    <a button type="button-left" class="btn btn-warning" data-toggle="modal" data-target="#inputstok" href="index.php?page=barang&aksi=inputbarang">Tambah Stok</a>
                <?php }?>
                <br> <br>
                <div class="card mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk Barang</th>
                                    <th>Stok</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>
                                    <th>Ruangan</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk Barang</th>
                                    <th>Stok</th>  
                                    <th>Tanggal Masuk</th>
                                    <th>Status</th>                                             
                                    <th>Ruangan</th>
                                </tr>
                            </tfoot>
                            <tbody> 
                                <?php 
                                    $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode" ;
                                    $result = $db->query($query);

                                    $no=1; 
                                    foreach($result as $row): 
                                ?>                     
                                <tr>   
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode'] ?></td>
                                    <td><?= $row['nama'] ?></td>                             
                                    <td><?= $row['merk'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><?= $row['ruangan']?></td>                                          
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main> 

        <!-- Input Stok -->      
        <div class="modal fade" id="inputstok" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputBarangLabel">Input Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                          
                        <form class="form-control" action="prosesbarang.php?proses=insertstok" method="post">
                            <div class="form-group mt-3 mb-2">
                                <label for="exampleInputEmail1" >Nama Barang</label>
                                <select class="form-control" name="kode" name="nama" name="merk"   >                                                
                                    <option value="">--Barang--</option>
                                    <?php 
                                        $data =  $db->query('SELECT * FROM  barang');
                                        foreach($data as $item) :
                                    ?>
                                    <option value="<?= $item['kode'] ?>"  >
                                        <?=$item['kode']?> - <?=$item['nama']?> - <?=$item['merk']?>
                                    </option>
                                    <?php 
                                        endforeach;
                                    ?>
                                </select>                         
                            </div>
                            <div class="form-group mt-3 mb-2">
                                <label for="jumlah"> Stok </label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required> 
                            </div>
                            <div class="form-group mt-3 mb-2">
                                <label for="status" name="status">-- Status -- </label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected>Status</option>
                                    <option value="Disimpan">Disimpan</option>
                                    <option value="Mutasi">Mutasi</option>
                                    
                                </select>                        
                            </div>
                            <div class="form-group mt-3 mb-2">
                                <label for="ruangan" name="ruangan"> Ruangan </label>
                                <select class="form-select" aria-label="Default select example" name="ruangan">
                                    <option selected>-- Ruangan --</option>
                                    <option value="Ruang Teknisi">Ruang Teknisi</option>
                                    <option value="E201">E201</option>
                                    <option value="E202">E202</option>
                                    <option value="E203">E203</option>
                                    <option value="E204">E204</option>
                                    <option value="E205">E205</option>
                                    <option value="E206">E206</option>
                                    <option value="E207">E207</option>
                                    <option value="E208">E208</option>
                                    <option value="E301">E301</option>
                                    <option value="E302">E302</option>
                                    <option value="E303">E303</option>
                                    <option value="E304">E304</option>
                                    <option value="E305">E305</option>
                                    <option value="E306">E306</option>
                                    <option value="E307">E307</option>     
                                </select>                        
                            </div>
                            <br>                                
                            <input type="submit" class="btn btn-primary center" name="submit" value=" Input ">
                        </form>
                    </div>
                </div>
            </div>
        </div>             
        <?php
    break;
       
}
?>

