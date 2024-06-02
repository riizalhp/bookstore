<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php?pesan=belum_login");
}
include 'koneksi.php';
// Fungsi untuk menambah buku
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kebutuhan Buku - Pengadaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="no-background">
<nav>
        <div class="brand">Unibookstore</div>
        <a href="logout.php">Logout</a>
        <a href="main.php">Home</a>
        <a href="admin.php">Admin</a>
        <a href="pengadaan.php">Pengadaan</a>
    </nav>
    <div class="container mx-auto p-8>
<h3 class="text-xl font-bold mb-4">Tambah Buku</h3>
        <form action="admin.php" method="post" class="mb-8">

            <!-- id buku -->
            <div class="mb-4 ">
                <label for="id_buku" class="block text-sm font-medium text-gray-600">ID Buku:</label>
                <input type="text" name="id_buku" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-600">Kategori:</label>
                <input type="text" name="kategori" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Nama Buku -->
            <div class="mb-4">
                <label for="nama_buku" class="block text-sm font-medium text-gray-600">Nama Buku:</label>
                <input type="text" name="nama_buku" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="nama_buku" class="block text-sm font-medium text-gray-600">Tahun:</label>
                <input type="text" name="tahun" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>


            <!-- Harga -->
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-600">Harga:</label>
                <input type="text" name="harga" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-600">Stock:</label>
                <input type="text" name="stok" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Penerbit -->
            <div class="mb-4">
                <label for="penerbit" class="block text-sm font-medium text-gray-600">Penerbit:</label>
                <input type="text" name="penerbit" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Hidden inputs -->
            <input type="hidden" name="aksi" value="add">
            <input type="hidden" name="jenis" value="buku">

            <!-- Submit button -->
            <input type="submit" value="Tambah Buku" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
        </form>

        <!-- Form tambah penerbit -->
        <h3 class="text-xl font-bold mb-4">Tambah Penerbit</h3>
        <form action="admin.php" method="post">

            <!-- ID Penerbit -->
            <div class="mb-4">
                <label for="id_penerbit" class="block text-sm font-medium text-gray-600">ID Penerbit:</label>
                <input type="text" name="id_penerbit" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
                <input type="text" name="nama" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat:</label>
                <input type="text" name="alamat" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Kota -->
            <div class="mb-4">
                <label for="kota" class="block text-sm font-medium text-gray-600">Kota:</label>
                <input type="text" name="kota" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Telepon -->
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-600">Telepon:</label>
                <input type="text" name="telepon" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="text" name="email" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <!-- Hidden inputs -->
            <input type="hidden" name="aksi" value="add">
            <input type="hidden" name="jenis" value="penerbit">

            <!-- Submit button -->
            <input type="submit" value="Tambah Penerbit" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
        </form>
    </div>
    </div>
</body>
</html>