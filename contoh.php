<!-- <div><a href="./cetak/cetakbarangmasuk.php" class="btn btn-danger mb-2">Cetak</a></div> -->
<button class="btn btn-danger btn-sm ml-auto mb-2" data-toggle="modal" data-target="#cetak">
                        <i class="fa fa-plus"></i>
                        Cetak
                    </button>

                <!-- Modal -->
                <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        CETAK</span>
                                    <!-- <span class="fw-light">
                                        Data
                                    </span> -->
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action='./cetak/cetakbarangmasuk.php' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Bulan</label>
                                            <div class="form-group form-group-default">
                                                <input id="addName" type="month" name="bulan"
                                                    class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <body>
    <header style="text-align:center;">
        DATA BARANG MASUK
        <?php


        $bulan = $_POST['bulan'];

        $query = "SELECT * FROM stok LEFT JOIN barang ON stok.kode_barang=barang.kode
    WHERE DATE_FORMAT(stok.tanggal,'%Y-%m') = '$bulan'";

        $result = $db->query($query);

        $item = mysqli_fetch_assoc($result);
        ?>
        <div class="">
            Bulan : <?= $bulan; ?>
            <?= isset($item['tanggal']) ? date('F', strtotime($item['tanggal'])) : ''; ?>

        </div>
    </header>
    <hr>
    <script>
        window.print()

    </script>
</body>