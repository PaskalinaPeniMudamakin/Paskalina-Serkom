<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sertifikasi_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch skema data for dropdown
$skemaSql = "SELECT * FROM skema";
$skemaResult = $conn->query($skemaSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran - Sertifikasi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-3">
        <h2>Form Pendaftaran Sertifikasi</h2>

        <!-- Add Form Modal Button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFormModal">
            Tambah Peserta
        </button>

        <!-- Add Form Modal -->
        <div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Form -->
                        <form action="process.php" method="POST">
                            <div class="form-group">
                                <label for="Kd_skema">Kode Skema:</label>
                                <select class="form-control" name="Kd_skema">
                                    <?php
                                    while ($skemaRow = $skemaResult->fetch_assoc()) {
                                        echo "<option value='".$skemaRow['Kd_skema']."'>".$skemaRow['Kd_skema']." - ".$skemaRow['Nm_skema']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Nama_peserta">Nama Peserta:</label>
                                <input type="text" class="form-control" name="Nama_peserta" required>
                            </div>
                            <div class="form-group">
                                <label for="Jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" name="Jenis_kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="No_hp">No. HP:</label>
                                <input type="text" class="form-control" name="No_hp" required>
                                <div class="form-group">
                                <label for="jurusan">Jurusan:</label>
                                <input type="text" class="form-control" name="Jurusan" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
