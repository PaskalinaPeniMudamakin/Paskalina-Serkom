<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_peserta = $_GET['id'];

    $sql = "DELETE FROM peserta WHERE Id_peserta=$id_peserta";

    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
