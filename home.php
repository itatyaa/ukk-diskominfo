<?php 

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$total_buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku"))['total'];

$total_user = ($_SESSION['user']['level'] == 'admin') 
    ? mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM user"))['total'] 
    : 0;

$buku_dipinjam = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman WHERE status_peminjaman = 'dipinjam'"))['total'];

$buku_tersedia = $total_buku - $buku_dipinjam;

$id_user = $_SESSION['user']['id_user'];
$buku_dipinjam_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM peminjaman WHERE id_user = '$id_user' AND status_peminjaman = 'dipinjam'"))['total'];
?>

<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total Buku</div>
            <h2 class="text-center"><?= $total_buku; ?></h2>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <?php if ($_SESSION['user']['level'] == 'admin') { ?>
                    <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <?php } else { ?>
                    <span class="small text-muted">No Access</span>
                <?php } ?>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <?php if ($_SESSION['user']['level'] == 'admin') { ?>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">Total User</div>
            <h2 class="text-center"><?= $total_user; ?></h2>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">Buku yang Anda Pinjam</div>
            <h2 class="text-center"><?= $buku_dipinjam_user; ?></h2>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=peminjaman">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Buku Tersedia</div>
            <h2 class="text-center"><?= $buku_tersedia; ?></h2>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <?php if ($_SESSION['user']['level'] == 'admin') { ?>
                    <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <?php } else { ?>
                    <span class="small text-muted">No Access</span>
                <?php } ?>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td width="150"><b>Nama</b></td>
                <td width="1">:</td>
                <td><?= $_SESSION['user']['nama']; ?></td>
            </tr>
            <tr>
                <td width="150"><b>Level User</b></td>
                <td width="1">:</td>
                <td><?= $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="150"><b>Tanggal Login</b></td>
                <td width="1">:</td>
                <td><?= date('d-m-Y'); ?></td>
            </tr>
        </table>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header"><b>Daftar Buku</b></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT buku.id_buku, buku.judul, buku.penulis, 
                        IF(peminjaman.id_buku IS NULL, 'Tersedia', 'Sedang Dipinjam') AS status_buku
                        FROM buku 
                        LEFT JOIN peminjaman ON buku.id_buku = peminjaman.id_buku 
                        AND peminjaman.status_peminjaman = 'dipinjam'");

            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['penulis']; ?></td>
                <td>
                    <?php if ($data['status_buku'] == "Sedang Dipinjam") { ?>
                        <span class="badge bg-danger"><?= $data['status_buku']; ?></span>
                    <?php } else { ?>
                        <span class="badge bg-success"><?= $data['status_buku']; ?></span>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
