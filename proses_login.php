<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']); // Pastikan password di database juga md5

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $_SESSION['user'] = mysqli_fetch_array($query);
        echo "<div class='alert alert-success'>Login Berhasil! Anda akan dialihkan...</div>";
        echo "<script>setTimeout(function(){ window.location.href='dashboard.php'; }, 2000);</script>";
    } else {
        echo "<div class='alert alert-danger'>Username atau Password salah!</div>";
    }
}
?>
