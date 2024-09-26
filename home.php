<?php
// Mengambil jumlah total barang dari tabel 'barang'
$query = $db->query("SELECT COUNT(*) as kode FROM barang");

// Mengambil jumlah total peminjaman dengan status 'Disetujui'
$query1 = $db->query("SELECT COUNT(*) as kode FROM peminjaman WHERE status = 'Disetujui'");

// Mengambil nama dari sesi pengguna
$nama = $_SESSION['nama'];

// Mengambil jumlah total peminjaman dengan nama pengguna dan status 'Selesai'
$query2 = $db->query("SELECT COUNT(*) as kode FROM peminjaman LEFT JOIN mahasiswa ON peminjaman.nim=mahasiswa.nim WHERE mahasiswa.nama ='$nama' AND peminjaman.status = 'Selesai'");

// Mengambil jumlah total peminjaman dengan status 'Menunggu Konfirmasi'
$query3 = $db->query("SELECT COUNT(*) as kode FROM peminjaman WHERE status = 'Menunggu Konfirmasi'");

// Menyimpan hasil query dalam array asosiatif
$barang = mysqli_fetch_assoc($query);
$barang1 = mysqli_fetch_assoc($query1);
$barang2 = mysqli_fetch_assoc($query2);
$barang3 = mysqli_fetch_assoc($query3);
?>
<br>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <!-- Teks Selamat Datang -->
                <h3 class="card-title text-dark">Selamat Datang</h3><br>
                <p class="mb-4">
                  Di Web Inventori <br> Jurusan Teknologi Informasi
                </p>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <!-- Gambar Pengguna -->
                <img
                  src="man-with-laptop-light.png"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="man-with-laptop-dark.png"
                  data-app-light-img="man-with-laptop-light.png" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php if($_SESSION['level']=='admin'){?> 
          <div class="col-lg-4 col-md-4 " >
            <div class="row">
              <div class="col-lg-6  col-6 mb-4" >
                <div class="card" style="background-color: #84E2C4;">
                  <div class="card-body">
                    <!-- Kard Banyak Barang -->
                    <h6><span>Banyak Barang</span></h6>
                    <h3 class="card-title text-nowrap mb-1"></h3>
                    <i class="bx bx-up-arrow-alt"></i> <?= $barang['kode']?>
                  </div>
                  <!-- Link Banyak Barang -->
                  <a href="index.php?page=barang" class="link-light text-end"><small> More <i class="fas fa-arrow-circle-right"></i></small></a><br>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card" style="background-color: #F2BCC4;">
                  <div class="card-body">
                    <!-- Kard Barang Dipinjam -->
                    <h6><span>Barang Dipinjam</span></h6>
                    <h3 class="card-title text-nowrap mb-1"></h3>
                    <i class="bx bx-up-arrow-alt"></i> <?= $barang1['kode']?>
                  </div>
                  <!-- Link Barang Dipinjam -->
                  <a href="index.php?page=peminjaman&aksi=disetujui" class="link-light text-end"><small> More <i class="fas fa-arrow-circle-right"></i></small></a><br>
                </div>
              </div>
            </div>
          </div>
        <?php }?>

        <?php if($_SESSION['level']=='pimpinan'){?> 
          <div class="col-lg-4 col-md-4 " >
            <div class="row">
              <div class=" col-md-12 col-6 mb-4">
                <div class="card" style="background-color: #84E2C4;">
                  <div class="card-body">
                    <!-- Kard Banyak Barang (Pimpinan) -->
                    <h5><span>Banyak Barang</span></h5> <br>
                    <h3 class="card-title text-nowrap mb-1"></h3>
                    <div class="container">
                      <i class="bx bx-up-arrow-alt"></i> <?= $barang['kode']?>
                    </div>
                  </div>
                  <!-- Link Banyak Barang (Pimpinan) -->
                  <a href="index.php?page=barang" class="link-light text-end"><small> More <i class="fas fa-arrow-circle-right"></i></small></a><br>
                </div>
              </div>
            </div>
          </div>
        <?php }?>

        <?php if($_SESSION['level']=='user'){?> 
          <div class="col-lg-4 col-md-4 " >
            <div class="row">
              <div class=" col-md-12 col-6 mb-4">
                <div class="card" style="background-color: #F2BCC4;">
                  <div class="card-body">
                    <!-- Kard Daftar Peminjaman Barang -->
                    <h5><span>Daftar Peminjaman Barang</span></h5>
                    <h3 class="card-title text-nowrap mb-1"></h3>
                    <i class="bx bx-up-arrow-alt"></i> <?= $barang2['kode']?>
                  </div>
                  <!-- Link Daftar Peminjaman Barang -->
                  <a href="index.php?page=peminjaman&aksi=daftar" class="link-light text-end"><small> More <i class="fas fa-arrow-circle-right"></i></small></a><br>
                </div>
              </div>
            </div>
          </div>
        <?php }?>

        <!-- Tabel Data Barang -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
          <div class="card">
            <div class="row row-bordered g-0">
              <div class="col-md-8">
                <!-- Judul Data Barang -->
                <h5 class="m-0 me-2 pb-3">Data Barang</h5>
                <!-- Chart Total Pendapatan -->
                <div id="totalRevenueChart" class="px-2"></div>
              </div>
              <main>
                <div class="container">
                  <div class="card mb-4">
                      <div class="card-body">
                          <!-- Tabel Daftar Barang -->
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
                                      // Mengambil data barang dari database
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
            </div>
          </div>
        </div>

      <?php if($_SESSION['level']=='admin'){?>
        <!-- Kard Konfirmasi Pinjaman (Admin) -->
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
          <div class="row">
            <div class="col-6 mb-4">
              <div class="card"  style="background-color: #C7CCA9;">
                <div class="card-body">
                  <span class="d-block mb-1">Konfirmasi Pinjaman</span>
                  <h3 class="card-title text-nowrap mb-2"></h3>
                  <i class="bx bx-up-arrow-alt"></i> <?= $barang3['kode']?>
                </div>
                <!-- Link Konfirmasi Pinjaman -->
                <a href="index.php?page=peminjaman&aksi=konfirpinjam" class="link-light text-end"><small> More <i class="fas fa-arrow-circle-right"></i></small></a><br>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
</div>
