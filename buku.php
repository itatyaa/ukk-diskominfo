<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Buku</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>ISBN</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM buku");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['judul']?></td>
                        <td><?php echo $data['penulis']?></td>
                        <td><?php echo $data['penerbit']?></td>
                        <td><?php echo $data['tahun_terbit']?></td>
                        <td><?php echo $data['jumlah_halaman']?></td>
                        <td><?php echo $data['isbn']?></td>
                        <td>
                            <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                            <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
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