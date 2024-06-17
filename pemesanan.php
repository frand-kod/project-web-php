<?php include "asset/header.php"; ?>
<?php include "asset/navbar.php"; ?>
<?php include "controller/conn.php"; ?>

<?php
if (isset($_GET['id_nama'])) {
    $id = $_GET['id_nama'];
    $query = "SELECT * FROM katalog WHERE id_nama = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<body>
    <!-- content here -->
    <div class="container">
        <h1 class="border-bottom mb-4 mt-4 pb-2 pt-2">Halaman Pembelian</h1>
        <p>Silahkan di isi dengan sebenar benarna. Kesalahan Inputan merupakan tanggung jawab pembeli.</p>
        <div class="container d-flex ">
            <!-- items are alredy pick up -->
            <div class="col-3">
                <div class="card mt-4">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar_mobil']); ?>" class="card-img-center" alt="Gambar Mobil" style="width: 180; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo ($row['nama_mobil']); ?></h5>
                        <p class="card-text"><?php echo ($row['keterangan']); ?></p>
                        <p class="card-text"><?php echo ($row['jenis_mobil']); ?></p>
                        <p class="card-text"><?php echo ($row['harga_mobil']); ?></p>
                        <p class="card-text"><?php echo ($row['bahan_bakar']); ?></p>
                    </div>
                </div>
            </div>
            <!-- form section aside items -->
            <div class="col-9 p-4">

                <form action="aksipemesanan.php" method="post">
                    <div class="">
                        <h3 class="mb-4">Detail Pesanan</h3>
                        <p>isikan data anda pada form di bawah ini</p>

                        <table>
                            <tr>
                                <td><label for="buyer-name">Nama Pembeli</label></td>
                                <td><input type="text" name="buyer-name" id="buyer"></td>
                            </tr>
                            <tr>
                                <td><label for="adreess"></label></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                </form>

            </div>
        </div>
    </div>    
</body>
<?php include "asset/footer.php"; ?>
</html>
