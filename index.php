<?php
    // Tidak ada pemrosesan PHP khusus, hanya HTML untuk tampilan
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <img src="dist/img/logoDiskominfo.png" alt="Diskominfo Jabar" class="h-10">
        </div>
        <div>
            <a href="register.php" class="text-green-600 font-semibold mr-4 border-b-2 border-transparent transition-all duration-300 hover:border-green-600">Register</a>
            <a href="login.php" class="text-green-600 font-semibold border-b-2 border-transparent transition-all duration-300 hover:border-green-600">Login</a>
        </div>
    </header>
    <main class="flex items-center justify-center h-screen">
        <div class="flex max-w-4xl bg-white p-8 rounded-lg shadow-lg">
            <div class="w-1/2 flex justify-center">
                <img src="dist/img/landing2.svg" alt="Buku" class="w-64">
            </div>
            <div class="w-1/2 pl-6">
                <h2 class="text-2xl font-bold text-green-700 mb-4">Keunggulan Web Perpustakaan</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Akses mudah untuk meminjam buku.</li>
                    <li>Pencarian buku cepat dan akurat dengan fitur filter.</li>
                    <li>Histori peminjaman yang terorganisir.</li>
                    <li>Sistem notifikasi untuk pengembalian tepat waktu.</li>
                    <li>Desain responsif yang nyaman digunakan dan memudahkan.</li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>
