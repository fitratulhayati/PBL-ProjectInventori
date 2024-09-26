<?php
    include 'koneksi.php';
    //proses tambah barang
    if ($_GET['proses'] == 'insertbarang') {
        if (isset($_POST["submit"])) {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $merk = $_POST['merk'];
            $satuan = $_POST['satuan'];
            
            $query =mysqli_query($db, "INSERT INTO barang (kode, nama, merk,  satuan) VALUES ('$kode','$nama','$merk','$satuan')");
            // cara 1
            //$sql = mysqli_query($db, $query);
            if ($query) {
                header("Location:index.php?page=barang");
            } else {
            echo "Gagal Update ".$db->error;
            }           
        }
    }

    //proses edit barang
    if ($_GET['proses'] == 'editbarang') {
        if (isset($_POST['submit'])) {
            $postkode = $_POST['kode'];
            $postnama = $_POST['nama'];
            $postmerk = $_POST['merk'];
            $postsatuan = $_POST['satuan'];
        
            $sql = "UPDATE barang SET nama='$postnama', merk='$postmerk', satuan='$postsatuan' WHERE kode='$postkode'";
        
            //cek apakah query berhasil atau gagal
            if ($db->query($sql)===TRUE) {
            header("Location: index.php?page=barang");
            } else {
                echo "Gagal Update ".$db->error;
            }
        }
    }

    //proses hapus barang
    if ($_GET['proses'] == 'hapusbarang') {
        if (isset($_GET['kode'])) {

            $kode = $_GET['kode'];
            // Kueri untuk menghapus data dari tabel barang
            $sql_barang = "DELETE FROM barang WHERE kode = '$kode'";
            
            // Kueri untuk menghapus data dari tabel stok
            $sql_stok = "DELETE FROM stok WHERE kode = '$kode'";
            
            // Menjalankan kueri untuk menghapus data dari tabel barang
            if ($db->query($sql_barang) === TRUE) {
                // Menjalankan kueri untuk menghapus data dari tabel stok
                $db->query($sql_stok);
                
                header("Location: index.php?page=barang");
                exit;
            } else {
                echo "Gagal Hapus Barang: " . $db->error;
            }
        }
    }

    //proses tambah stok
    if ($_GET['proses'] == 'insertstok') {
        if (isset($_POST["submit"])) {
            $kode = $_POST['kode'];
            $jumlah = $_POST['jumlah'];
            $status = $_POST['status'];
            $ruangan = $_POST['ruangan'];
            

            $query_insert_stok = mysqli_query($db, "INSERT INTO stok (kode, jumlah, status, ruangan) VALUES ('$kode', '$jumlah', '$status','$ruangan')");

            if ($query_insert_stok) {
                // Setelah berhasil insert stok, update stok di barang
                $query_update_barang = mysqli_query($db, "UPDATE barang SET stok = stok + '$jumlah' WHERE kode = '$kode'");

                if ($query_update_barang) {
                    header("Location:index.php?page=barang&aksi=datastok");
                } else {
                    echo "Gagal Update Stok Barang: " . $db->error;
                }
            } else {
                echo "Gagal Update " . $db->error;
            }      
        }
    }

    //proses edit stok
    if ($_GET['proses'] == 'editstok') {
        if (isset($_POST['submit'])) {
            $kode = $_POST['kode'];
            $postjumlah = $_POST['jumlah'];
            
        
            $sql = "UPDATE stok SET jumlah='$postjumlah'  WHERE kode='$postkode'";
        
            //cek apakah query berhasil atau gagal
            if ($db->query($sql)===TRUE) {
            header("Location: index.php?page=barang&aksi=datastok");
            } else {
                echo "Gagal Update ".$db->error;
            }
        }
    }

    //proses hapus stok
    if ($_GET['proses'] == 'hapusstok') {
        if (isset($_GET['kode'])) {

            $kode = $_GET['kode'];
            // Kueri untuk menghapus data dari tabel barang
            $sql_barang = "DELETE FROM stok WHERE kode = '$kode'";
            
            // Menjalankan kueri untuk menghapus data dari tabel barang
            if ($db->query($sql_barang) === TRUE) {
                header("Location: index.php?page=barang");
                exit;
            } else {
                echo "Gagal Hapus Barang: " . $db->error;
            }
        }
    }


?>

