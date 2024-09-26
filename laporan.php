<?php
    // Memerlukan file koneksi.php untuk menghubungkan ke database
    require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata dan stylesheet -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laporan Data Barang Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    </head>
    <body class="container">
        <header style="text-align:center;">
            <!-- Judul Laporan -->
            <h2>Laporan Data Barang Masuk</h2>

            <?php
                // Cek apakah form telah dikirim
                if (isset($_POST['bulan'])) {
                    $bulan = $_POST['bulan'];

                    // Query untuk mengambil data stok barang berdasarkan bulan yang dipilih
                    $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode=barang.kode
                            WHERE DATE_FORMAT(stok.tanggal,'%Y-%m') = '$bulan'";

                    // Eksekusi query
                    $result = $db->query($query);

                    // Cek apakah ada data yang ditemukan
                    if ($result->num_rows > 0) {
                        // Jika ada, tampilkan tabel laporan
                        echo "<div>Bulan : " . $bulan . "</div>";
                        echo "<hr>";

                        echo "<table border='1' class='table table-bordered'>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Jumlah Masuk</th>
                                    <th>Tanggal</th>
                                </tr>";

                        // Tampilkan data dalam bentuk tabel
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['kode'] . "</td>
                                    <td>" . $row['nama'] . "</td>
                                    <td>" . $row['merk'] . "</td>
                                    <td>" . $row['stok'] . "</td>
                                    <td>" . $row['tanggal'] . "</td>
                                </tr>";
                        }

                        echo "</table>";
                    } else {
                        // Jika tidak ada data, berikan pesan
                        echo "<div>Tidak ada data untuk bulan " . $bulan . "</div>";
                    }
                } else {
                    // Jika formulir tidak dikirim dengan benar, berikan pesan
                    echo "<div>Formulir tidak dikirimkan dengan benar.</div>";
                }
            ?>
        </header>

        <!-- Script untuk otomatis mencetak laporan saat halaman dimuat -->
        <script>
            window.onload = function () {
                // Cetak laporan setelah halaman dimuat 
                window.print();
            };
        </script>
    </body>
</html>
