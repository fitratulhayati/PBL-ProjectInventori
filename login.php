<?php
    // Memulai sesi untuk menyimpan data pengguna yang telah login
    session_start();

    // Mengarahkan ke halaman login jika tombol login ditekan
    if (isset($_POST['login'])) {
        header("Location: login.php");
    }

    // Memerlukan file koneksi.php untuk menghubungkan ke database
    require 'koneksi.php';

    // Memeriksa apakah formulir login telah dikirim
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        // Query untuk mencari pengguna dengan username dan password tertentu di tabel mahasiswa
        $sql = "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'";
        
        // Query untuk mencari pengguna dengan username dan password tertentu di tabel user
        $sql1 = "SELECT * FROM user WHERE username='$username' AND password='$password'";

        // Eksekusi query
        $result = $db->query($sql);
        $result1 = $db->query($sql1);

        // Mengambil data pengguna dari hasil query
        $data = mysqli_fetch_array($result);
        $data1 = mysqli_fetch_array($result1);

        // Memeriksa apakah pengguna ditemukan di tabel mahasiswa
        if ($result->num_rows > 0 ) {
            // Jika ditemukan, menyimpan informasi pengguna ke sesi dan mengarahkan ke halaman utama
            $_SESSION['username'] = $username;
            $_SESSION['nim'] = $data['nim'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['login'] = TRUE;
            header("Location: index.php");
        } elseif($result1->num_rows > 0){
            // Memeriksa apakah pengguna ditemukan di tabel user
            // Jika ditemukan, menyimpan informasi pengguna ke sesi dan mengarahkan ke halaman utama
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data1['nama'];
            $_SESSION['level'] = $data1['level'];
            $_SESSION['login'] = TRUE;
            header("Location: index.php");
        }
        else {
            // Jika pengguna tidak ditemukan, menampilkan pesan kesalahan
            $gagal_login = "Username/password salah";
        }  
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata dan stylesheet -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="bootstrap.min.css" rel="stylesheet">
    </head>
    <body >
        <div class="container">
            <div class="card shadow-lg border-0  mt-5">
                <div class="row py-4">
                    <!-- Bagian kiri, menampilkan gambar -->
                    <div class="col-6 text-center">
                        <img width="400" src="1.jpg" class="rounded">
                    </div>
                    <!-- Bagian kanan, form login -->
                    <div class="col-5">
                        <div class=""><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                            <!-- Menampilkan pesan kesalahan jika login gagal -->
                            <?php if(isset($gagal_login)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?=$gagal_login?>
                                </div>
                            <?php endif ?>
                            <!-- Form login -->
                            <form class="form" action="" method="post">
                                <div class="row mb-3">
                                    <label for="username1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username1" name="username" required> 
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me </label>
                                </div>
                                <br>
                                <!-- Tombol submit login -->
                                <input type="submit" class="btn btn-warning" name="submit" value=" Login ">
                                <br>
                                <br>
                                <!-- Link untuk pendaftaran akun baru -->
                                <a href="daftar.php" class="link-primary text-end"><p><small>Belum Punya akun? Daftar </small><p></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Script Bootstrap JS -->
        <script src="bootsrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
