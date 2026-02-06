<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","ukk_2026");
$query = mysqli_query($koneksi,"SELECT * FROM siswa");

if(isset($_GET['cari'])){
    $cari = $_GET['search'];
    $query = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nama LIKE '%$cari%'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
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
                <li><a href="upload.php">Upload</a></li>
                <li><a href="register.php">Browser</a></li>
            </ul>
        </nav>
    </header>
    <main class="flex justify-center text-center mt-20 flex-col p-10">
        <h1 class="text-4xl">HALAMAN ADMIN</h1>
        <br>
        <hr class="h-px border">
        <br>
        <!-- buat pencarian! -->
        <form method="get" class="p-5">
        <input type="text" name="search" class="border px-3 py-2 rounded-lg" placeholder="cari data">
        <button type="submit" name="cari" class="cursor-pointer border rounded-lg px-3 py-2">
            cari
        </button>
        </form>
        <table class="border">
            <thead>
                <tr>
                    <th class="border">No</th>
                    <th class="border">NIS</th>
                    <th class="border">Nama</th>
                    <th class="border">Foto</th>
                    <th class="border">Kelas</th>
                    <th class="border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;  while($data = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td class="border"><?= $no ?></td>
                    <td class="border"><?= $data['nis'] ?></td>
                    <td class="border"><?= $data['nama'] ?></td>
                    <td class="border p-2 w-55"><img src="siswa/<?= $data['foto'] ?>"
                    alt="foto siswa"
                    class="w-32"></td>
                    <td class="border"><?= $data['kelas'] ?></td>
                    <td class="flex gap-2 justify-center h-45 items-center">

                    <!-- fungsi delete -->
                    <a href="hapus.php?id_siswa=<?= $data['id_siswa'] ?>"
                    class="px-3 py-2 border hover:bg-green-600 
                    rounded-xl hover:text-white" onclick="return confirm('yakin ingin menghapus data!')">
                    delete
                    </a>

                    <!-- fungsi update -->
                    <a href="update.php?id_siswa=<?= $data['id_siswa'] ?>" 
                    class="px-3 py-2 border hover:bg-green-600 rounded-xl hover:text-white">
                    update</a>

                    </td>
                </tr>
                <?php $no +=1; endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
