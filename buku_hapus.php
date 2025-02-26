<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku=$id");
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=buku";
</script>