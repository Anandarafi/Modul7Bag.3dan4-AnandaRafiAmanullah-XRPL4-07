<html>
<?php

include '../connect.php';

$query = "SELECT id_dosen, nama_dosen FROM Dosen";
$result = mysqli_query($connect, $query);

?>

<body>

<form action="create.php" method="POST">
<h1><b>Tambah MataKuliah</b></h1>
Kode            : <input type="number" name="kode"><br>
MataKuliah      : <input type="text" name="nama_matkul"><br>
SKS             : <input type="text" name="sks"><br>
Semester        : <input type="text" name="semester"><br> 
Dosen Pengajar  :   <select name="id_dosen" id="nama_dosen">
                    <option value="-">--Pilih Salah Satu</option>
                    <option value="NULL">Tidak Ada Pengajar</option>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $data['id_dosen']; ?>">
                        <?php echo $data['nama_dosen']; ?>
                        </option>
                        <?php
                    }
                    ?>
                    </select><br>

<button ><input type="submit" name="btnSimpan" value="Simpan"></button>

</html>