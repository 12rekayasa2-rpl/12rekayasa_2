<?php

    $koneksi = mysqli_connect("localhost","root","","ukk_2026");

    if(isset($_GET['id_siswa'])){
        $id = $_GET['id_siswa'];
        $query = mysqli_query($koneksi, "DELETE FROM `siswa` WHERE id_siswa = $id");
        header("Location:admin.php");
    }

?>