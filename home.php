<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                    ?>
                                    <div class="card-body">Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                                    ?>
                                    <div class="card-body">Total User</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table table-bordered">
                                    <tr>
                                        <td width="100">Nama</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                                    </tr><br>
                                    <tr>
                                        <td width="100">Level User</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr><br>
                                    <tr>
                                        <td width="100">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td><?php echo date('d-m-y'); ?></td>
                                    </tr>
                                </div>
                            </div>
                        </div>