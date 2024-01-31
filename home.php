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

// Fetch peserta data
$sql = "SELECT * FROM peserta";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sertifikasi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Include Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="container mt-3">
        <h2>Data Peserta</h2>

        <!-- Search Form -->
        <form action="home.php" method="GET">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cari Peserta" name="search">
            </div>
        </form>

        <?php
        // Handle Search
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM peserta WHERE Nama_peserta LIKE '%$search%'";
        
            $result = $conn->query($sql);
        }

        // Display Peserta Data
        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th>ID Peserta</th>
                            <th>Kode Skema</th>
                            <th>Nama Peserta</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Id_peserta']}</td>
                        <td>{$row['Kd_skema']}</td>
                        <td>{$row['Nama_peserta']}</td>
                        <td>{$row['Jenis_kelamin']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['No_hp']}</td>
                        <td>{$row['Jurusan']}</td>
                        <td>
                            <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editModal{$row['Id_peserta']}'>Edit</button>
                            <a href='delete_peserta.php?id={$row['Id_peserta']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>";
        
                // Modal Edit
                echo "<div class='modal fade' id='editModal{$row['Id_peserta']}' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='editModalLabel'>Edit Data Peserta</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <form action='edit_peserta.php' method='post'>
                                        <input type='hidden' name='id_peserta' value='{$row['Id_peserta']}'>
                                        <div class='form-group'>
                                            <label for='kd_skema'>Kode Skema:</label>
                                            <input type='text' class='form-control' name='kd_skema' value='{$row['Kd_skema']}' required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='nama_peserta'>Nama Peserta:</label>
                                            <input type='text' class='form-control' name='nama_peserta' value='{$row['Nama_peserta']}' required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='jenis_kelamin'>Jenis Kelamin:</label>
                                            <select class='form-control' name='jenis_kelamin' required>
                                                <option value='Laki-laki' " . (($row['Jenis_kelamin'] == 'Laki-laki') ? 'selected' : '') . ">Laki-laki</option>
                                                <option value='Perempuan' " . (($row['Jenis_kelamin'] == 'Perempuan') ? 'selected' : '') . ">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alamat'>Alamat:</label>
                                            <input type='text' class='form-control' name='alamat' value='{$row['alamat']}' required>
                                        </div>
                                        <div class='form-group'>
                                            <label for='no_hp'>No. HP:</label>
                                            <input type='text' class='form-control' name='no_hp' value='{$row['No_hp']}' required>
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
        
        

        $conn->close();
        ?>

        <!-- Include Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
