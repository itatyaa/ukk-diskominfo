<?php
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
    
    $query = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'dikembalikan' WHERE id_peminjaman = '$id_peminjaman'");

    if ($query) {
        echo '<script>alert("Buku berhasil dikembalikan!"); window.location.href="?page=peminjaman";</script>';
    } else {
        echo '<script>alert("Gagal mengembalikan buku!"); window.location.href="?page=peminjaman";</script>';
    }
}
?>
