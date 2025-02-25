<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $status_peminjaman = $_POST['status_peminjaman'];

                        $cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                                                   WHERE id_buku = '$id_buku' 
                                                                   AND status_peminjaman = 'dipinjam'");
                        if (mysqli_num_rows($cek_peminjaman) > 0) {
                            echo '<script>alert("Buku ini sedang dipinjam dan belum dikembalikan!");</script>';
                        } else {
                            $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) 
                                                             VALUES ('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");
                            if ($query) {
                                echo '<script>alert("Peminjaman Berhasil!"); window.location.href="?page=peminjaman";</script>';
                            } else {
                                echo '<script>alert("Peminjaman Gagal!");</script>';
                            }
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku NOT IN 
                                                                (SELECT id_buku FROM peminjaman WHERE status_peminjaman = 'dipinjam')");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8"><input type="date" class="form-control" name="tanggal_peminjaman" required></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8"><input type="date" class="form-control" name="tanggal_pengembalian" required></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                        <input type="hidden" name="status_peminjaman" value="dipinjam">
                        <input type="text" class="form-control" value="Dipinjam" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
