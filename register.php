<!-- kita masuk ke proses registerasi akun! -->
 <?php
    // koneksi ke database  
    $koneksi = mysqli_connect("localhost","root","","ukk_2026");

    // ini boleh di tulis boleh nggak!
    if(!$koneksi){
        die("koneksi gagal");
    }

    // logika input data ke  database
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  $_POST['password'];

        $query = mysqli_query($koneksi, "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')");
        header("Location:login.php");
        exit();
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
        <form action="register.php"
         method="post" class="flex flex-col gap-2 w-100 border p-5">
            <h1 class="text-center">Register Akun</h1>
            <label>Username</label>
            <input type="text" name="username"  class="border border-lg p-2" required
            placeholder="username">
               <label>Email</label>
            <input type="email" name="email" class="border border-lg p-2" placeholder="email" 
            required>
            <label>Password</label>
            <input type="password" name="password" class="border border-lg p-2" placeholder="password" 
            required>
            <div class="button flex gap-5">
            <button type="submit" name="register"
            class="bg-blue-600 rounded-lg px-3 py-2 text-white hover:bg-blue-500">Register</button>
            <button type="reset" name="batal" 
            class="bg-blue-600 rounded-lg px-3 py-2 text-white hover:bg-blue-500">Batal</button>
            </div>
        </form>
    </main>
</body>
</html>