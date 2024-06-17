<?php
//file include
include("./asset/header.php");
include("./asset/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>

<body>
    <div class="container ">
        <div class="header">
            <h2 class="border-bottom mb-4 mt-4 pb-2 pt-2">Contact Us</h2>
            <p>Anda bisa menghubungi kami kapan saja .. silahkan isi detail data diri anda untuk mendapatkan informasi yang lebih baik</p>
        </div>

        <form action="kontak.php" method="post">

            <div class="mb-3">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">

            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

            </div>
            <div class="mb-3">

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" required>
            </div>

            <div class="mb-3">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <div class="mb-3">
                <label for="complaint_id">Complaint Type:</label>
                <select id="complaint_id" name="complaint_id" required>
            </div>

            <?php
            // Menghubungkan ke database
            require "./controller/conn.php";

            // Mengambil data keluhan dari tabel complaints
            $sql = "SELECT id, complaint_type FROM complaints";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data dari setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["complaint_type"] . "</option>";
                }
            } else {
                echo "<option value=''>No complaints available</option>";
            }
            ?>
            <div class="mt-3">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Mengambil data dari formulir
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $message = $_POST['message'];
                $complaint_id = $_POST['complaint_id'];

                // Menyiapkan dan menjalankan pernyataan SQL
                $stmt = $conn->prepare("INSERT INTO contact_form (first_name, last_name, email, phone_number, message, complaint_id) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone_number, $message, $complaint_id);

                if ($stmt->execute()) {
                    echo '<p class="mt-2 mb-2 text-success">Komplain Berhasil di Ajukan</p>';
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
            ?>
        </form>
    </div>
</body>
<?php include("./asset/footer.php") ?>

</html>