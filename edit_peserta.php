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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_peserta = $_POST['id_peserta'];
    $kd_skema = $_POST['kd_skema'];
    $nama_peserta = $_POST['nama_peserta'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $Jurusan = $_POST['Jurusan'];



    $sql = "UPDATE peserta SET Kd_skema='$kd_skema', Nama_peserta='$nama_peserta', Jenis_kelamin='$jenis_kelamin', Jenis_kelamin='$jenis_kelamin', alamat='$alamat', No_hp='$no_hp' WHERE Id_peserta=$id_peserta";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
