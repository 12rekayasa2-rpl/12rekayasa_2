<?php

    $koneksi = mysqli_connect("localhost","root","","ukk_2026");

    if(isset($_GET['id_siswa'])){
        $id = $_GET['id_siswa'];
        $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = $id");
        $data = mysqli_fetch_assoc($query);
    }

    if(isset($_POST['update'])){
        $id = (int) $_POST['id'];
        $foto_lama = $_POST['foto_lama'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

    if($_FILES['foto']['error'] == 0){
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $error = $_FILES['foto']['error'];

        $ekstensiFoto = explode('.', $foto);
        $ekstensiFoto = end($ekstensiFoto);

        $namaFoto = uniqid() . '.' . $ekstensiFoto;

        move_uploaded_file($tmp, 'siswa/' . $namaFoto);

        $update = mysqli_query($koneksi, "UPDATE `siswa` SET `nis`='$nis',
        `nama`='$nama',`foto`='$namaFoto',`kelas`='$kelas' WHERE id_siswa = $id");
        }
        else{
            $update = mysqli_query($koneksi, "UPDATE `siswa` SET `nis`='$nis',
            `nama`='$nama',`foto`='$foto_lama',`kelas`='$kelas' WHERE id_siswa = $id");
        }
        header("Location:admin.php");
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
  <form action="update.php?id_siswa=<?= $data['id_siswa'] ?>" method="post" enctype="multipart/form-data">
        <h1>Form Udate Data</h1>
        <label>NIS</label>
        <input type="number" name="nis" placeholder="nis" value="<?= $data['nis'] ?>">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="nama" value="<?= $data['nama'] ?>">

        <label>Foto</label>
        <img src="siswa/<?= $data['foto'] ?>" alt="" width="50px">
        <input type="file" name="foto" placeholder="foto" value="<?= $data['foto'] ?>">
        <input type="hidden" name="id" placeholder="foto" value="<?= $data['id_siswa'] ?>">
        <input type="hidden" name="foto_lama" placeholder="foto" value="<?= $data['foto'] ?>">

        <!-- <select name="kelas">
            <option selected disabled>Pilih Kelas</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select> -->
        <input type="text" name="kelas" value="<?= $data['kelas'] ?>">
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>