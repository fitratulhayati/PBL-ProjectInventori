<?php
    session_start();
    include 'koneksi.php';

    if ($_GET['proses'] == 'ajukanpinjam') {
        if (isset($_POST["submit"])) {
            // Periksa apakah kunci 'tgl_pinjam' ada dalam array $_POST
            if (isset($_POST['tgl_pinjam'])) {                
                $nim = $_SESSION['nim'];
                $nama_barang = $_POST['nama_barang'];
                $jumlah = $_POST['jumlah'];
                $tgl_pinjam = $_POST['tgl_pinjam'];
                $tgl_kembali = date("Y-m-d", strtotime("$tgl_pinjam +2 day"));
                $jaminan = $_POST['jaminan'];

                // Perbaiki query dengan parameter yang benar
                $query = mysqli_query($db, "INSERT INTO peminjaman (nama_barang, nim, jumlah, tgl_pinjam, tgl_kembali, jaminan) VALUES ('$nama_barang', '$nim', '$jumlah', '$tgl_pinjam', '$tgl_kembali', '$jaminan')");

                if (!$result) {
                    echo "Error: " . mysqli_error($db);
                }
                if ($query) {
                    header("Location:index.php?page=peminjaman");
                } else {
                    echo "Gagal Insert: " . mysqli_error($db);
                }
            } else {
                echo "Error: Tanggal Peminjaman tidak terdefinisi.";
            }
        }
    }

    //proses monfir peminjaman
    if ($_GET['proses'] == 'konfirmasi') {
        if (isset($_GET['id'])) {

            $id=$_GET['id'];
            $sql = "UPDATE peminjaman SET status = 'Disetujui' WHERE id = $id";
        
            if ($db->query($sql)===TRUE) {
                header("Location: index.php?page=peminjaman&aksi=konfirpinjam");
                exit;
            } else {
                echo "Gagal Update ".$db->error;
            }
        }
    }

    //proses tidak setujui peminjaman
    if ($_GET['proses'] == 'tkonfirmasi') {
        if (isset($_GET['id'])) {

            $id=$_GET['id'];
            $sql = "UPDATE peminjaman SET status = 'Tidak Disetujui' WHERE id = $id";
        
            if ($db->query($sql)===TRUE) {
                header("Location: index.php?page=peminjaman&aksi=konfirpinjam");
                exit;
            } else {
                echo "Gagal Update ".$db->error;
            }
        }
    }

    //proses pengembalian barang
    if ($_GET['proses'] == 'dikembalikan') {
        if (isset($_GET['id'])) {

            $id=$_GET['id'];
            $sql = "UPDATE peminjaman SET status = 'Selesai' WHERE id = $id";
        
            if ($db->query($sql)===TRUE) {
                header("Location: index.php?page=peminjaman&aksi=disetujui");
                exit;
            } else {
                echo "Gagal Update ".$db->error;
            }
        }
    }

?>
