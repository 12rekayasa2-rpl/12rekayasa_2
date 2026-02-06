<?php
    session_start();
    $koneksi = mysqli_connect("localhost","root","","ukk_2026");
    if(!$koneksi){
        die("Gagal terkoneksi ke database");
    }
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $qury = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
        $validasi = mysqli_num_rows($qury);
        
        if($validasi > 0){
            $data = mysqli_fetch_assoc($qury);
            $_SESSION['login'] = true;
            $_SESSION['email'] = $data['email'];
            echo '<script>
            alert("Anda  berhasil login")
             location.href="admin.php"
             </script>';
        }else{
            echo '<script>
            alert("Gagal login periksa username atau password anda!")
             location.href="login.php"
             </script>';
        }
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
     <main class="flex items-center justify-center h-screen">
        <form action="login.php"
         method="post" class="flex flex-col gap-2 w-100 border p-5">
            <h1 class="text-center">Login Akun</h1>
            <label>Email</label>
            <input type="email" name="email" class="border border-lg p-2" placeholder="email" 
            required>
            <label>Password</label>
            <input type="password" name="password" class="border border-lg p-2" placeholder="password" 
            required>
            <div class="button flex gap-5">
            <button type="submit" name="login"
            class="bg-blue-600 rounded-lg px-3 py-2 text-white hover:bg-blue-500">Login</button>
            <button type="reset" name="batal" 
            class="bg-blue-600 rounded-lg px-3 py-2 text-white hover:bg-blue-500">Batal</button>
            </div>
        </form>
    </main>
</body>
</html>