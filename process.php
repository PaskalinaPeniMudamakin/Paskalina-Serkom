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

// Process Add Peserta
if(isset($_POST['Kd_skema']) && isset($_POST['Nama_peserta']) && isset($_POST['Jenis_kelamin']) && isset($_POST['alamat']) && isset($_POST['No_hp'])&& isset($_POST['Jurusan'])) {
    $Kd_skema = $_POST['Kd_skema'];
    $Nama_peserta = $_POST['Nama_peserta'];
    $Jenis_kelamin = $_POST['Jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $No_hp = $_POST['No_hp'];
    $Jurusan = $_POST['Jurusan'];


    $sql = "INSERT INTO peserta (Kd_skema, Nama_peserta, Jenis_kelamin, alamat, No_hp, Jurusan) VALUES ('$Kd_skema', '$Nama_peserta', '$Jenis_kelamin', '$alamat', '$No_hp','$Jurusan')";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id_peserta  = $_GET['delete'];

    $sql = "DELETE FROM skema WHERE Id_peserta='$id_peserta'";

    if ($conn->query($sql) === TRUE) {
        header("Location: sertifikasi.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
