<?php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=peminjaman_tambah" class="btn btn-primary">+ Tambah Peminjaman</a>
                <a href="?page=history_peminjaman" class="btn btn-secondary">History Peminjaman</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                 LEFT JOIN user ON user.id_user = peminjaman.id_user 
                                 LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku
                                 WHERE peminjaman.id_user = " . $_SESSION['user']['id_user'] . " 
                                 AND status_peminjaman != 'dikembalikan'");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <td>
                                <a href="?page=kembalikan_buku&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-success">Kembalikan</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
