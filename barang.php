<?php
    $aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'barang';
    switch ($aksi) {
        case 'barang':
            //list barang
            if (isset($_GET['edit_kode_barang'])) {
                //Jika ada parameter edit_kode_barang, ambil data barang yang akan diedit
                $edit_kode_barang = $_GET['kode'];
                $query = "SELECT * FROM barang WHERE kode = '$edit_kode_barang'";
                $result = $db->query($query);
                $row = $result->fetch_assoc();
            }
            ?>
            
            <main>
                <div class="container">
                    <h1 class="mt-4"> Data Barang </h1> 
                    <!-- Button Tambah barang Untuk Admin -->
                    <?php if($_SESSION['level']=='admin'){?>                                         
                        <div style="text-align: right;">
                            <a button type="button-left" class="btn btn-warning" data-toggle="modal" data-target="#inputbarang" href="index.php?page=barang&aksi=inputbarang"><i class="fas fa-plus"></i>Tambah Barang</a> 
                        </div>
                    <?php }?>
                    <br> 
                    <!-- Tabel Barang -->
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
                                        //mengambil nilai pada tabel barang di database
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
                                                style="margin-left: 20px;" data-toggle="modal" data-target="#edit<?= $row['kode'] ?>" title="Edit" 
                                                data-original-title="Edit">
                                                <i class="fa fa-edit" style="color: #CC0000; font-size: 20px;"></i>
                                            </a>
                                            <a onclick="return confirm ('Apakah kamu yakin menghapusnya?')" href="prosesbarang.php?proses=hapusbarang&kode=<?=$row['kode']?>"
                                                style="margin-left: 20px;" data-toggle="tooltip" title="Remove" 
                                                data-original-title="Remove">
                                                <i class="fa fa-times" style="color: #FFB700; font-size: 24px;"></i>
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

            <!-- Model Input Barang -->
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
                                    <label for="satuan"> Satuan </label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" required> 
                                </div>                                   
                                <br>                                         
                                <input type="submit" class="btn btn-primary center" name="submit" value=" Input ">
                                <br><br>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Barang -->
            <?php
                //mengambil nilai tabel barang di database
                $query = "SELECT * FROM barang";
                $result = $db->query($query);

                foreach ($result as $row) :
            ?>
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
                                    <label for="kode"> Kode Barang </label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $row['kode'] ?>" readonly> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="nama"> Nama Barang </label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="merk"> Merk Barang </label>
                                    <input type="text" class="form-control" id="merk" name="merk" value="<?= $row['merk'] ?>" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="satuan"> Satuan </label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $row['satuan'] ?>" required> 
                                </div>
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
                <h1 class="mt-4"> Barang Masuk </h1> 
                    <!-- Tombol Tambah Stok dan Cetak Barang untuk admin -->             
                    <?php if($_SESSION['level']=='admin'){?>                                         
                        <div style="text-align: right;">
                            <!-- Button Tambah Stok -->
                            <a button type="button-left" class="btn btn-warning" data-toggle="modal" data-target="#inputstok" href="index.php?page=barang&aksi=inputbarang"><i class="fas fa-plus"></i>Tambah Stok</a>
                            <!-- Button Cetak Barang -->
                            <a button type="button-left" class="btn btn-warning" data-toggle="modal" data-target="#cetak" href="index.php?page=barang&aksi=inputbarang"><i class="fas fa-download"></i> Cetak Laporan</a>
                        </div>
                    <?php }?>
                    <br>
                    <!-- Tabel Stok -->
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
                                    //mengambil nilai stok dari tabel stok dan berelasi dengan tabel barang
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

            <!-- Modal Input Stok -->
            <div class="modal fade" id="inputstok" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="inputBarangLabel">Input Barang</h5>
                            <!-- Tombol Close Modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!-- Form untuk Input Stok -->
                            <form class="form-control" action="prosesbarang.php?proses=insertstok" method="post">
                                <!-- Pilihan Nama Barang dari Database -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="exampleInputEmail1">Nama Barang</label>
                                    <select class="form-control" name="kode" name="nama" name="merk">
                                        <option value="">--Barang--</option>
                                        <?php
                                        // Ambil data barang dari database
                                        $data = $db->query('SELECT * FROM  barang');
                                        foreach ($data as $item) :
                                        ?>
                                            <!-- Opsi untuk Setiap Barang -->
                                            <option value="<?= $item['kode'] ?>">
                                                <?= $item['kode'] ?> - <?= $item['nama'] ?> - <?= $item['merk'] ?>
                                            </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>

                                <!-- Input Jumlah Stok -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="jumlah">Stok</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                </div>

                                <!-- Pilihan Status -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="status" name="status">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected>-- Status --</option>
                                        <option value="Disimpan">Disimpan</option>
                                        <option value="Mutasi">Mutasi</option>
                                    </select>
                                </div>

                                <!-- Pilihan Ruangan -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="ruangan" name="ruangan">Ruangan</label>
                                    <select class="form-select" aria-label="Default select example" name="ruangan">
                                        <option selected>-- Ruangan --</option>
                                        <!-- Daftar Ruangan -->
                                        <option value="Ruang Teknisi">Ruang Teknisi</option>
                                        <option value="E201">E201</option>
                                        <!-- Tambahkan pilihan ruangan lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                                <br>

                                <!-- Tombol Submit -->
                                <input type="submit" class="btn btn-primary center" name="submit" value="Input">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
  
            
            <!-- Edit Stok -->
            <?php
                // Query untuk mendapatkan data stok dari tabel stok yang di-join dengan tabel barang
                $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode";
                $result = $db->query($query);

                // Loop melalui hasil query untuk setiap baris data stok
                foreach ($result as $row) :
            ?>

            <!-- Modal Edit Stok untuk Setiap Barang -->
            <div class="modal fade" id="editstok<?= $row['kode'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="inputBarangLabel">Edit Barang</h5>
                            <!-- Tombol Close Modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!-- Form untuk Edit Stok -->
                            <form class="form" action="prosesbarang.php?proses=editstok" method="post">
                                <!-- Input Kode Barang (Hidden) -->
                                <input type="hidden" name="kode" value="<?= $row['kode'] ?>">

                                <!-- Pilihan Nama Barang (Tidak dapat diubah) -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="exampleInputEmail1">Nama Barang</label>
                                    <select class="form-control" name="kode" id="kode" disabled>
                                        <option value="">-- Barang --</option>
                                        <?php
                                            // Ambil data barang dari database
                                            $data = $db->query('SELECT * FROM barang');
                                            while ($stok = mysqli_fetch_array($data)) {
                                                // Tentukan opsi yang terpilih sesuai dengan data stok saat ini
                                                $selected = ($stok['kode'] == $row['kode'] ? 'selected' : '');
                                                echo "<option value=".$stok['kode']." $selected>".$stok['kode']." - ".$stok['nama']." - ".$stok['merk']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <!-- Input Jumlah Stok -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="stok">Stok</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $row['jumlah'] ?>" required>
                                </div>

                                <!-- Input Status (Tidak dapat diubah) -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="status">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?= $row['status'] ?>" disabled>
                                </div>

                                <!-- Input Ruangan (Tidak dapat diubah) -->
                                <div class="form-group mt-3 mb-2">
                                    <label for="ruangan">Ruangan</label>
                                    <input type="text" class="form-control" id="ruangan" name="ruangan" value="<?= $row['ruangan'] ?>" disabled>
                                </div>
                                <br>

                                <!-- Tombol Submit untuk Mengupdate Stok -->
                                <input type="submit" class="btn btn-primary center" name="submit" value="Update">
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>


            <!-- Modal Cetak Barang -->
            <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold">
                                    CETAK</span>
                                <!-- <span class="fw-light">
                                    Data
                                </span> -->
                            </h5>
                            <!-- Tombol Close Modal -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!-- Form untuk Cetak Laporan Barang -->
                            <form action='laporan.php' method="post">
                                <!-- Input Pilihan Bulan -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Bulan</label>
                                        <div class="form-group form-group-default">
                                            <!-- Input untuk Memilih Bulan -->
                                            <input id="addName" type="month" name="bulan" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Footer (No Border) -->
                                <div class="modal-footer no-bd">
                                    <!-- Tombol untuk Mengirimkan Form Cetak -->
                                    <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        break;    
    }
?>

