<?php

session_start();
$koneksi = mysqli_connect("localhost","root","","ukk_2026");
$query = mysqli_query($koneksi,"SELECT * FROM siswa");

if(isset($_GET['cari'])){
    $cari = $_GET['search'];
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama LIKE '%$cari%'" );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">x
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ambil di taillwindcss -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<style>
    main{
        background:url(OIP.jpg);
        background-position: center;
        background-size: cover;
        height: 100vh;
        object-fit: cover;
    }
</style>
<body>
    <header class="p-5 shadow-md flex items-center">
        <!-- tambahkan w-full di nav-nya!!  -->
        <!-- tampilannya nggak perlu persis sama  yang penting fungsi! -->
        <nav class="flex justify-between p-5 w-full"> 
            <div class="logo">
                <h1>Logo</h1>
            </div>
            <ul class="flex gap-5">
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Faq</a></li>
            </ul>
            <ul class="flex gap-5">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section 
        class="text-center 
        mt-10 p-10">
            <h1 class="text-3xl
             font-extrabold">
                Sistem Infomasi  Siswa
            </h1>
            <br>
            <form method="get">
                <input type="text" name="search" placeholder="cari" class="border p-2">
                <button type="submit" name="cari" class="p-2 border">Cari</button>
            </form>
            <br>
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="border border-2">No</th>
                        <th class="border border-2">NIS</th>
                        <th class="border border-2">Nama</th>
                        <th class="border border-2">Foto</th>
                        <th class="border border-2">Kelas</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th class="border border-2">No</th>
                        <th class="border border-2">NIS</th>
                        <th class="border border-2">Nama</th>
                        <th class="border border-2">Foto</th>
                        <th class="border border-2">Kelas</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1; while($data=mysqli_fetch_assoc($query)): ?>
                    <tr>
                        <td class="border border-2"><?= $no ?></td>
                        <td class="border border-2"><?= $data['nis'] ?></td>
                        <td class="border border-2"><?= $data['nama'] ?></td>
                        <td class="border w-80 border-2"><img src="siswa/<?= $data['foto'] ?>" alt="" width="100px"></td>
                        <td class="border border-2"><?= $data['kelas'] ?></td>
                    </tr>
                    <?php $no+=1; endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>