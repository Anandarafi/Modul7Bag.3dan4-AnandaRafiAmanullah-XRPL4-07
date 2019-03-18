<!DOCTYPE html>

<?php

session_start();
if(!(isset($_SESSION['user'])))
{
    header("location: ../NamaLogin/form-login.php");
}
include '../connect.php';

$query = "SELECT * FROM Dosen";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<body>
<table border = '1'>
<h2>Data Dosen</h2>
<tr>
<th>No.</th>
<th>Nama Dosen</th>
<th>Telepon</th>
<th>Aksi</th>
</tr>
<?php
if($num > 0)
{
    $no = 1;
    while($data = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $data['nama_dosen'] . "</td>";
        echo "<td>" . $data['telp'] . "</td>";
        echo "<td><a href='form-update.php?id_dosen=" . $data['id_dosen'] . "'>Edit</a> | ";
        echo "<td><a href='delete.php?id_dosen=" . $data['id_dosen'] . "' onclick='return confirm(\"Apakah Anda Yakin Ingin Menghapus Data?\")'>Hapus</a></td>";
        echo " </tr>";
        $no++;
    }
}
else{
    echo "<td colspan='3'>Tidak Ada Data</td>";
}
?>
<tr>
<td>
<a href="http://localhost/Modul7/NamaLogin/logout.php"> <input type="submit" name="logout" value="LogOut"></a>
</td>
</tr>
</table>
</body>
</html>