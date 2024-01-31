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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kd_skema = $_POST['kd_skema'];

// Process Add Skema
if (isset($_POST['nm_skema'])) {
    // Proses edit
    $nm_skema = $_POST['nm_skema'];
    $jenis = $_POST['jenis'];
    $jml_unit = $_POST['jml_unit'];

    $sql = "UPDATE skema SET Nm_skema='$nm_skema', jenis='$jenis', Jml_unit='$jml_unit' WHERE Kd_skema='$kd_skema'";
} else if(isset($_POST['Nm_skema']) && isset($_POST['jenis']) && isset($_POST['Jml_unit'])) {
    $Kd_skema = $_POST['Kd_skema'];
    $Nm_skema = $_POST['Nm_skema'];
    $jenis = $_POST['jenis'];
    $Jml_unit = $_POST['Jml_unit'];

    $sql = "INSERT INTO skema (Kd_skema,Nm_skema, jenis, Jml_unit) VALUES ('$Kd_skema','$Nm_skema', '$jenis', '$Jml_unit')";

}
    if ($conn->query($sql) === TRUE) {
        header("Location: sertifikasi.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Proses delete
if (isset($_GET['delete'])) {
    $kd_skema = $_GET['delete'];

    $sql = "DELETE FROM skema WHERE Kd_skema='$kd_skema'";

    if ($conn->query($sql) === TRUE) {
        header("Location: sertifikasi.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
