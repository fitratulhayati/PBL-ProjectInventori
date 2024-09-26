<?php
    // Mulai sesi
    session_start();
    
    // Sertakan file koneksi.php untuk menghubungkan ke database
    require 'koneksi.php';

    // Cek apakah form telah disubmit
    if (isset($_POST["submit"])) {
        // Ambil data dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nohp = $_POST['nohp'];
        $password = md5($_POST['password']);
        
        // Query untuk memasukkan data ke tabel mahasiswa
        $query = "INSERT INTO mahasiswa (nim, nama, username, tgl_lahir, jenis_kelamin, nohp, password) 
                  VALUES ('$nim','$nama', '$username', '$tgl_lahir' , '$jenis_kelamin', '$nohp', '$password')";
            
        // Eksekusi query menggunakan metode ke-1 atau ke-2
        $sql = $db->query($query);

        // Cek apakah query berhasil dijalankan
        if ($sql) {
            // Redirect ke halaman login jika berhasil
            header("Location:login.php");
        } else {
            // Tampilkan pesan kesalahan jika query gagal dijalankan
            echo "Gagal Update ".$db->error;
        }     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <!-- Sertakan file CSS Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body class="">
    <!-- Kontainer utama -->
    <div class="container-sm">
        <!-- Baris untuk meletakkan elemen di tengah halaman -->
        <div class="row justify-content-center">
            <!-- Kartu sebagai wadah utama -->
            <div class="card shadow-lg border-0  mt-5">
                <!-- Baris untuk menampilkan judul form -->
                <div class="row py-4">
                    <!-- Bagian judul form -->
                    <div class=""><h3><p class="text-center font-weight-light my-4"><strong>Daftar Akun</strong></p></h3></div>
                    <!-- Tombol Close Modal -->
                    <div class="card-body">
                        <!-- Form pendaftaran akun -->
                        <form class="form" action="" method="post">
                            <!-- Bagian kontainer untuk elemen formulir -->
                            <div class="container">
                                <!-- Baris untuk elemen formulir NIM -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nim</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="nim" required>
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir Nama -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nama" required>
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir Username -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="username" required>
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir Tanggal Lahir -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_lahir" required>
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir Jenis Kelamin -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir No HP -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="nohp" required>
                                    </div> 
                                </div>

                                <!-- Baris untuk elemen formulir Password -->
                                <div class="row mb-2">
                                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" required>
                                    </div> 
                                </div>
                                <br>   
                                <!-- Tombol untuk mengirimkan formulir pendaftaran -->
                                <input type="submit" class="btn btn-warning btn-center" name="submit" value=" Daftar ">
                                <br>
                                <br>
                                <!-- Tautan untuk login jika sudah memiliki akun -->
                                <a href="login.php" class="link-primary text-end"><p><small>Sudah Punya Akun? Login</small><p></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sertakan file JS Bootstrap -->
    <script src="bootsrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
