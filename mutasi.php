<?php
    $aksi=isset($_GET['aksi']) ? $_GET['aksi']: 'mutasi';
    switch ($aksi) {
        case 'mutasi':
            //list stok
            ?>                           
            <main>      
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Barang Mutasi</h1> 
                    <br>
                    <h5><p>Ruang 201</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E201'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 202</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E202'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 203</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E203'" ;
                                        
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
                                         
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 204</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E204'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 205</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E205'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 206</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E206'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 207</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th> 
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E207'" ;
                                        
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
                                          
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 208</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E208'" ;
                                        
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

        case 'labor':
            //list stok
            ?>                           
            <main>      
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Barang Mutasi</h1> 
                    <br>
                    <h5><p>Ruang 301</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E301'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 302</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th> 
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E302'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 303</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E303'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 304</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th> 
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E304'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 305</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>   
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E305'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 306</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th> 
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E306'" ;
                                        
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5><p>Ruang 307</p></h5>
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Stok</th>  
                                    </tr>
                                </thead>
                                
                                <tbody> 
                                    <?php 
                                        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode WHERE stok.status = 'mutasi' and stok.ruangan='E307'" ;
                                        
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