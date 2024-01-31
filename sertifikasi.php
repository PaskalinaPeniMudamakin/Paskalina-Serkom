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

// Fetch skema data
$sql = "SELECT * FROM skema";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi - Sertifikasi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-3">
        <h2>Data Skema Sertifikasi</h2>

        <!-- Add Skema Form Modal Button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSkemaModal">
            Tambah Skema
        </button>

        <!-- Add Skema Form Modal -->
        <div class="modal fade" id="addSkemaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Skema Sertifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Skema Form -->
                        <form action="process_skema.php" method="POST">
                            <div class="form-group">
                                    <label for="Kd_skema">Kode Skema:</label>
                                    <input type="text" class="form-control" name="Kd_skema" required>
                                </div>
                            <div class="form-group">
                                <label for="Nm_skema">Nama Skema:</label>
                                <input type="text" class="form-control" name="Nm_skema" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <input type="text" class="form-control" name="jenis" required>
                            </div>
                            <div class="form-group">
                                <label for="Jml_unit">Jumlah Unit:</label>
                                <input type="text" class="form-control" name="Jml_unit" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $sql = "SELECT * FROM skema";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Kode Skema</th>
                                <th>Nama Skema</th>
                                <th>Jenis</th>
                                <th>Jumlah Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['Kd_skema']}</td>
                            <td>{$row['Nm_skema']}</td>
                            <td>{$row['jenis']}</td>
                            <td>{$row['Jml_unit']}</td>
                            <td>
                                <a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal{$row['Kd_skema']}'>Edit</a>
                                <a href='process_skema.php?delete={$row['Kd_skema']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";

                    // Modal Edit
                    echo "<div class='modal fade' id='editModal{$row['Kd_skema']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='editModalLabel'>Edit Skema Sertifikasi</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <form action='process_skema.php' method='post'>
                                            <div class='form-group'>
                                                <label for='kd_skema'>Kode Skema:</label>
                                                <input type='text' class='form-control' name='kd_skema' value='{$row['Kd_skema']}' readonly>
                                            </div>
                                            <!-- Tambahan input untuk data skema -->
                                            <div class='form-group'>
                                                <label for='nm_skema'>Nama Skema:</label>
                                                <input type='text' class='form-control' name='nm_skema' value='{$row['Nm_skema']}' required>
                                            </div>
                                            <div class='form-group'>
                                                <label for='jenis'>Jenis:</label>
                                                <input type='text' class='form-control' name='jenis' value='{$row['jenis']}' required>
                                            </div>
                                            <div class='form-group'>
                                                <label for='jml_unit'>Jumlah Unit:</label>
                                                <input type='number' class='form-control' name='jml_unit' value='{$row['Jml_unit']}' required>
                                            </div>
                                            <button type='submit' class='btn btn-primary'>Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }

                echo "</tbody></table>";
            } else {
                echo "0 results";
            }
        ?>

        <!-- Include Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
