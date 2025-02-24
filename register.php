<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-white">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="login-logo">
                                <center><h3>
                                        <font color="green">
                                            <b>Register</b>
                                        </font>
                                    </h3></center>
                                    </a>
                                </div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-body">
                                        <center>
				                            <img src="dist/img/logo.png" width=160px />
			                            </center>
			                            <br>
                                        <?php
                                            if (isset($_POST['register'])) {
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_tlp = $_POST['no_tlp'];
                                                $username = $_POST['username'];
                                                $level = $_POST['level'];
                                                $password = md5($_POST['password']);

                                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                    echo '<script>alert("Format email tidak valid!");</script>';
                                                    exit();
                                                }

                                                if (!ctype_digit($no_tlp)) {
                                                    echo '<script>alert("Nomor telepon hanya boleh angka!");</script>';
                                                    exit();
                                                }

                                                $cekUser = $koneksi->prepare("SELECT * FROM user WHERE username = ?");
                                                $cekUser->bind_param("s", $username);
                                                $cekUser->execute();
                                                $result = $cekUser->get_result();

                                                if ($result->num_rows > 0) {
                                                    echo '<script>alert("Username sudah digunakan!");</script>';
                                                    exit();
                                                }
                                                
                                                $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_tlp,username,password,level) VALUES('$nama','$email','$alamat','$no_tlp','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Register Berhasil"); location.href="login.php"</script>';
                                                }else {
                                                    echo '<script>alert("Register Gagal");</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="username" placeholder="Masukkan Username" />
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="email" placeholder="Masukkan Email" />
                                                <label>Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" required name="no_tlp" placeholder="Masukkan No. Telphone" />
                                                <label>No. Telphone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="alamat" rows="5" required class="form-control"></textarea>
                                                <label>Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="InputPassword" type="password" required name="password" placeholder="Masukkan Password" />
                                                <label for="InputPassword">Password</label>
                                            </div>
                                            <div class="form-group">
                                                <label small mb-1>Level</label>
                                                <select name="level" required class="form-select form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="peminjam">Peminjam</option>
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-success" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="Login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2025 Digital Perpustakaan.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
