<?php
session_start();
if(!(isset($_SESSION['user']))){
    header("location: ../login/form-login.php");
}
include '../connect.php';

$nama_dosen = $_POST['nama_dosen'];
$telp = $_POST['telp'];

$query = "INSERT INTO Dosen (nama_dosen, telp)
VALUES ('$nama_dosen', '$telp')";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if($num > 0)
{
    echo "Berhasil Tambah Data";
}else{
    echo " Gagal Tambah Data";
}

echo "<a href='read.php'>Lihat Data</a>";

?>