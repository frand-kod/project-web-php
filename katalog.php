<?php include "asset/header.php"; ?>
<?php include "asset/navbar.php"; ?>
<?php include "controller/conn.php"; ?>

<body>
<div class="container">
    <h2 class="mt-3 mb-3">Temukan Kenyamanan Anda Bersama Kami</h2>
    <p>karena Kenyamanan Adalah <span>Kunci</span></p>
    <br>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php 
        $query = "SELECT * FROM katalog";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col">
                <div class="card">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['gambar_mobil']); ?>" class="card-img-top" alt="Gambar Mobil" width="auto" height="180">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['nama_mobil']; ?></h5>
                        <p class="card-text"><?php echo $row['keterangan']; ?></p>
                        <p class="card-text"><?php echo $row['jenis_mobil']; ?></p>
                        <p class="card-text"><?php echo $row['harga_mobil']; ?></p>
                        <p class="card-text"><?php echo $row['bahan_bakar']; ?></p> 
                    </div>
                    <div class="card-footer">
                        <a href="pemesanan.php?id_nama=<?php echo $row['id_nama']; ?>"><button class="btn btn-primary">Pemesanan</button></a>
                    </div>
                </div>
            </div> 
        <?php 
        } 
        ?>
    </div>
</div>
</body>

<?php include "asset/footer.php"; ?>
