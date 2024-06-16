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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Halaman Pembelian</title>
</head>
<body>

<!-- content here -->
<div class="container">
    <h1 class="mt-4 mb-4">Halaman Pembelian</h1>
<div class="container d-flex">
    <!-- items are alredy pick up -->
    <div class="col-4">

        <div class="card">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar_mobil']); ?>" class="card-img-top" alt="Gambar Mobil" style="width: 180; height: auto;">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo ($row['nama_mobil']); ?></h5>
                <p class="card-text"><?php echo ($row['keterangan']); ?></p>
                <p class="card-text"><?php echo ($row['jenis_mobil']); ?></p>
                <p class="card-text"><?php echo ($row['harga_mobil']); ?></p>
                <p class="card-text"><?php echo ($row['bahan_bakar']); ?></p> 
            </div>
            <div class="card-footer text-center">
                <a href="transaksi.php?id_nama=<?php echo htmlspecialchars($row['id_nama']); ?>"><button class="btn btn-primary">Pemesanan</button></a>
            </div>
        </div>
    </div>
    <!-- form section aside items -->
        <div class="col">
        
            <form action="">
            form pemesanan
            </form>
        
        </div>
    </div>
</div>

<?php include "asset/footer.php"; ?>

</body>
</html>
