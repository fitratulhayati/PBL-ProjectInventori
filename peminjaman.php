<?php
    $aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'ajukanpinjam';
    switch ($aksi) {
        case 'ajukanpinjam':
            //list barang
            ?>
            <main>
                <div class="container">
                    <h1 class="mt-4"> Data Barang </h1> 
                    <div style="text-align: right;">
                            <a button type="button-left" class="btn btn-warning" data-toggle="modal" data-target="#ajukanpinjam" href="index.php?page=barang&aksi=inputbarang"><i class="fas fa-plus"></i>Ajukan Peminjaman</a>
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>  
                    
            <!-- Ajukan Pinjaman -->   
            <div class="modal fade" id="ajukanpinjam" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inputBarangLabel">Input Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                          
                            <form action="prosespeminjaman.php?proses=ajukanpinjam" method="POST">                                                  
                                <div class="form-group mt-3 mb-2">
                                    <label for="search">Nama Barang: </label>
                                    <select class="form-control" name="nama_barang" >                                                
                                        <option value="">--Barang--</option>
                                        <?php 
                                            $data =  $db->query('SELECT * FROM  barang');
                                            foreach($data as $item) :
                                        ?>
                                        <option value="<?= $item['nama'] ?>"  >
                                            <?=$item['kode']?> - <?=$item['nama']?> - <?=$item['merk']?>
                                        </option>
                                        <?php 
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="stok"> Jumlah: </label>
                                    <input type="text" class="form-control" id="stok" name="jumlah" required> 
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="tgl_pinjam">Tanggal Peminjaman :</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam">
                                </div>
                                <div class="form-group mt-3 mb-2">
                                    <label for="jaminan"> Jaminan </label>
                                    <input type="text" class="form-control" id="jaminan" name="jaminan" required> 
                                </div>                                 
                                <br>                                         
                                <input type="submit" class="btn btn-primary center" name="submit" value=" Input ">
                                <br><br>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        break;

        case 'konfirpinjam':
            ?>
            <main>
                <div class="container">
                <h1 class="mt-4"> Konfirmasi Peminjaman </h1>  
                    <br> 
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th> </th>                                  
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th> </th>                                   
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM peminjaman LEFT JOIN mahasiswa ON peminjaman.nim=mahasiswa.nim WHERE peminjaman.status='Menunggu Konfirmasi'" ;
                                        $result = $db->query($query);

                                        $no=1; 
                                        foreach($result as $row): 
                                    ?>                     
                                    <tr>   
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_kembali'] ?></td>                                                                            
                                        <td><?= $row['jaminan'] ?></td>  
                                        <td>
                                            <a button type="button" class="btn btn-warning" href="prosespeminjaman.php?proses=konfirmasi&id=<?=$row['id']?>">Konfirmasi</a>                                   
                                            <a button type="button" class="btn btn-warning" href="prosespeminjaman.php?proses=tkonfirmasi&id=<?=$row['id']?>">Tidak</a>                                   
                                        </td>                                                                          
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        break;

        case 'disetujui':
            ?>
            <main>
                <div class="container">
                <h1 class="mt-4"> Daftar Barang yang Dipinjam </h1>  
                    <br> 
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th> </th>                                  
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th> </th>                                   
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM peminjaman LEFT JOIN mahasiswa ON peminjaman.nim=mahasiswa.nim WHERE peminjaman.status='Disetujui'" ;

                                        $result = $db->query($query);

                                        $no=1; 
                                        foreach($result as $row): 
                                    ?>                     
                                    <tr>   
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_kembali'] ?></td>                                                                            
                                        <td><?= $row['jaminan'] ?></td>  
                                        <td>
                                            <a button type="button" class="btn btn-warning" href="prosespeminjaman.php?proses=dikembalikan&id=<?=$row['id']?>">Dikembalikan</a>  
                                        </td>                                                                          
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        break;

        case 'dikembalikan':
            ?>
            <main>
                <div class="container">
                    <h1 class="mt-4"> Daftar Barang yang Telah Dikembalikan </h1> 
                    <br> 
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                                                            
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM peminjaman LEFT JOIN mahasiswa ON peminjaman.nim=mahasiswa.nim WHERE peminjaman.status='Selesai'" ;

                                        $result = $db->query($query);

                                        $no=1; 
                                        foreach($result as $row): 
                                    ?>                     
                                    <tr>   
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_kembali'] ?></td>                                                                            
                                        <td><?= $row['jaminan'] ?></td>                                                                                                            
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        break;

        case 'daftar':
            ?>
            <main>
                <div class="container">
                <h1 class="mt-4"> Daftar Peminjaman Barang </h1>  
                    <br> 
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th>Status</th>                                 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jaminan</th> 
                                        <th>Status</th>                                    
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    <?php
                                        $nama = $_SESSION['nama'];                             
                                        $query = "SELECT * FROM peminjaman LEFT JOIN mahasiswa ON peminjaman.nim=mahasiswa.nim WHERE mahasiswa.nama ='$nama' AND status='Selesai' " ;
                                        $result = $db->query($query);

                                        $no=1; 
                                        foreach($result as $row): 
                                    ?>                     
                                    <tr>   
                                        <td><?= $no++ ?></td>
                                        
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_kembali'] ?></td>                                                                            
                                        <td><?= $row['jaminan'] ?></td>                                                                                                            
                                        <td><?= $row['status'] ?></td>                                                                                                            
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        break;  
    }
?>

