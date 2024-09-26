<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        // Redirect ke halaman login jika pengguna belum login
        header("Location: login.php");
        exit();
    }
    // Membutuhkan file koneksi.php untuk menghubungkan ke database
    require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Informasi-informasi meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- Judul halaman -->
        <title>PBL </title>
        <!-- Pemanggilan stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Pemanggilan ikon Font Awesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Pemanggilan library jsPDF untuk membuat file PDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

        <!-- Gaya CSS dalam tag style -->
        <style>
            header {
                background-color: #007bff;
                color: #fff;
                padding: 15px;
                text-align: center;
            }

            .dashboard-container {
                display: flex;
                justify-content: space-between;
                padding: 20px;
            }

            .card {
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin-bottom: 20px;
                flex: 1;
            }

            .card h2 {
                color: #007bff;
            }

            .chart-container {
                width: 100%;
                max-width: 600px;
                margin: 20px auto;
            }
            .icon-background {
                background-image: url('4.png'); /* Ganti path sesuai dengan lokasi ikon Anda */
                background-size: cover; /* Sesuaikan ukuran gambar background */
                width: 100px; /* Sesuaikan lebar elemen */
                height: 100px; /* Sesuaikan tinggi elemen */
                display: inline-block; /* Membuat elemen berupa inline-block */
            }
            .mt-4 {
                font-family: 'Roboto', sans-serif; /* Ganti 'Poppins' dengan font yang diinginkan */
                font-weight: 500; /* Sesuaikan ketebalan font sesuai keinginan */
                color: #333; /* Ubah warna font sesuai kebutuhan */
            }      
        </style>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">
                <img width="160" src="3.png" class="center">
            </a>
            <!-- Sidebar Toggle Button -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                    
            <!-- Navbar Right Section -->
			<ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">   
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#!"><h5><strong><?php echo $_SESSION['nama']; ?></strong></h5></a></li>
						<li><a class="dropdown-item" href="#!"><small><?php echo $_SESSION['level']; ?></a></li>
						<li><hr class="dropdown-divider" /></li>
						<!-- Logout Link -->
						<li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
        </nav>

        <!-- Layout Sidenav -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- Sidebar Navigation -->
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <!-- Home Link -->
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>

                            <!-- Admin Menu Links -->
                            <?php if($_SESSION['level']=='admin'){?>           
                                <!-- Barang Links -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Barang
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Data Barang Link -->
                                        <a class="nav-link" href="index.php?page=barang">Data Barang</a>
                                        <!-- Barang Masuk Link -->
                                        <a class="nav-link" href="index.php?page=barang&aksi=datastok ">Barang Masuk</a>
                                    </nav>
                                </div>
                                
                                <!-- Mutasi Links -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Mutasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Gedung E Lantai 2 Link -->
                                        <a class="nav-link" href="index.php?page=mutasi">Gedung E Lantai 2</a>
                                        <!-- Gedung E Lantai 3 Link -->
                                        <a class="nav-link" href="index.php?page=mutasi&aksi=labor ">Gedung E Lantai 3</a>
                                    </nav>
                                </div>

                                <!-- Peminjaman Links -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouta" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Peminjaman
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouta" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Konfirmasi Peminjaman Link -->
                                        <a class="nav-link" href="index.php?page=peminjaman&aksi=konfirpinjam">Konfirmasi Peminjaman</a>
                                        <!-- Daftar Peminjaman Link -->
                                        <a class="nav-link" href="index.php?page=peminjaman&aksi=disetujui ">Daftar Peminjaman</a>
                                        <!-- Daftar Pengembalian Link -->
                                        <a class="nav-link" href="index.php?page=peminjaman&aksi=dikembalikan">Daftar Pengembalian</a>
                                    </nav>
                                </div>
                            <?php }?>

                            <!-- Pimpinan Menu Links -->
                            <?php if($_SESSION['level'] =='pimpinan'){?>           
                                <!-- Barang Links -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Barang
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Data Barang Link -->
                                        <a class="nav-link" href="index.php?page=barang">Data Barang</a>
                                        <!-- Barang Masuk Link -->
                                        <a class="nav-link" href="index.php?page=barang&aksi=datastok ">Barang Masuk</a>
                                    </nav>
                                </div>
                                <!-- Mutasi Links -->
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayout" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Mutasi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Gedung E Lantai 2 Link -->
                                        <a class="nav-link" href="index.php?page=mutasi">Gedung E Lantai 2</a>
                                        <!-- Gedung E Lantai 3 Link -->
                                        <a class="nav-link" href="index.php?page=mutasi&aksi=labor ">Gedung E Lantai 3</a>
                                    </nav>
                                </div>
                            <?php }?>

                            <!-- User Menu Links -->
                            <?php if($_SESSION['level'] == 'user'){?>    
                                <!-- Peminjaman Barang Link -->
                                <a class="nav-link" href="index.php?page=peminjaman">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Peminjaman Barang
                                </a>
                                <!-- Pengembalian Barang Link -->
                                <a class="nav-link" href="index.php?page=peminjaman&aksi=daftar">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Pengembalian Barang
                                </a>
                            <?php }?>
                        </div>
                    </div>
                    <!-- Informasi Logged in as -->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['nama']; ?>
                    </div>
                </nav>
            </div>

            <!-- Layout Sidenav Content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                        // Menentukan halaman yang akan dimuat sesuai dengan parameter GET
                        $p= isset($_GET['page']) ? $_GET['page'] : 'home'; //ternary
                        if ($p=='home') include 'home.php';
                        if ($p=='barang') include 'barang.php';
                        if ($p=='peminjaman') include 'peminjaman.php';
                        if ($p=='mutasi') include 'mutasi.php';
                        if ($p=='laporan') include 'laporan.php';
                        ?>  
                    </div>
                </main>
                <!-- Footer Section -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <!-- Copyright Information -->
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <!-- Privacy Policy and Terms & Conditions Links -->
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>


        <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

            <script >
                $(document).ready(function() {
                    $('#basic-datatables').DataTable({
                    });

                    $('#multi-filter-select').DataTable( {
                        "pageLength": 5,
                        initComplete: function () {
                            this.api().columns().every( function () {
                                var column = this;
                                var select = $('<select class="form-control"><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                        );

                                    column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                                } );

                                column.data().unique().sort().each( function ( d, j ) {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                } );
                            } );
                        }
                    });

                    // Add Row
                    $('#add-row').DataTable({
                        "pageLength": 5,
                    });

                    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

                    $('#addRowButton').click(function() {
                        $('#add-row').dataTable().fnAddData([
                            $("#addName").val(),
                            $("#addPosition").val(),
                            $("#addOffice").val(),
                            action
                            ]);
                        $('#addRowModal').modal('hide');

                    });
                });
	        </script>

    </body>
</html>
