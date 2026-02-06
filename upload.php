<?php

    session_start();
    $koneksi = mysqli_connect("localhost","root","","ukk_2026");

    if(isset($_POST['upload'])){
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error'];

        $ekstensiFoto = explode('.', $foto);
        $ekstensiFoto = end($ekstensiFoto);

        $namaFoto = uniqid() . '.' . $ekstensiFoto;

        move_uploaded_file($tmp, 'siswa/' . $namaFoto);

        $query = mysqli_query($koneksi, "INSERT INTO siswa (nis, nama, foto, kelas)
        VALUES ('$nis','$nama','$namaFoto','$kelas')");
         exit();
         
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h1>Form Upload Data</h1>
        <label>NIS</label>
        <input type="number" name="nis" placeholder="nis">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="nama">
        <label>Foto</label>
        <input type="file" name="foto" placeholder="foto">
        <select name="kelas">
            <option selected disabled>Pilih Kelas</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html> 