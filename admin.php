<?php
include 'koneksi.php';


//fungsi tambahbuku
function tambahBuku($data){
    global $koneksi;

    // Memeriksa apakah id_buku sudah terpakai
    $id_buku = mysqli_real_escape_string($koneksi, $data['id_buku']);
    $checkQuery = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // ID buku sudah terpakai, tampilkan pesan kesalahan
        echo "<script>alert('ID Buku sudah terpakai. Silakan gunakan ID Buku yang berbeda.')</script>";
    } else {
        // ID buku belum terpakai, lanjutkan dengan penambahan data
        $kategori = mysqli_real_escape_string($koneksi, $data['kategori']);
        $nama_buku = mysqli_real_escape_string($koneksi, $data['nama_buku']);
        $tahun = mysqli_real_escape_string($koneksi, $data['tahun']);
        $harga = mysqli_real_escape_string($koneksi, $data['harga']);
        $stok = mysqli_real_escape_string($koneksi, $data['stok']);
        $penerbit = mysqli_real_escape_string($koneksi, $data['penerbit']);
        

        $query = "INSERT INTO buku (id_buku, kategori, nama_buku, tahun, harga, stok, penerbit) VALUES ('$id_buku','$kategori', '$nama_buku','$tahun', '$harga', '$stok', '$penerbit')";
        mysqli_query($koneksi, $query);
    }
}
//fungsi tambah penerbit
function tambahPenerbit($data)
{
    global $koneksi;

    // Memeriksa apakah id_penerbit sudah terpakai
    $id_penerbit = mysqli_real_escape_string($koneksi, $data['id_penerbit']);
    $checkQuery = "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'";
    $result = mysqli_query($koneksi, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // ID penerbit sudah terpakai, tampilkan pesan kesalahan
        echo "<script>alert('ID Penerbit sudah terpakai. Silakan gunakan ID Penerbit yang berbeda.')</script>";
    } else {
        // ID penerbit belum terpakai, lanjutkan dengan penambahan data
        $nama = mysqli_real_escape_string($koneksi, $data['nama']);
        $alamat = mysqli_real_escape_string($koneksi, $data['alamat']);
        $kota = mysqli_real_escape_string($koneksi, $data['kota']);
        $telepon = mysqli_real_escape_string($koneksi, $data['telepon']);
        $email = mysqli_real_escape_string($koneksi, $data['email']);

        $query = "INSERT INTO penerbit (id_penerbit,nama, alamat, kota, telepon, email) VALUES ('$id_penerbit','$nama', '$alamat', '$kota', '$telepon', '$email')";
        mysqli_query($koneksi, $query);
    }
}


// Fungsi untuk menghapus buku
function hapusBuku($id)
{
    global $koneksi;
    $id_buku = mysqli_real_escape_string($koneksi, $id);

    $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus penerbit
function hapusPenerbit($id)
{
    global $koneksi;
    $id_penerbit = mysqli_real_escape_string($koneksi, $id);

    $query = "DELETE FROM penerbit WHERE id_penerbit = '$id_penerbit'";
    mysqli_query($koneksi, $query);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek aksi (add, edit, delete) dan jenis data (buku, penerbit)
    if ($_POST['aksi'] == 'add') {
        if ($_POST['jenis'] == 'buku') {
            tambahBuku($_POST);
        } elseif ($_POST['jenis'] == 'penerbit') {
            tambahPenerbit($_POST);
        }
    } elseif ($_POST['aksi'] == 'delete') {
        $id = $_POST['id'];
        if ($_POST['jenis'] == 'buku') {
            hapusBuku($id);
        } elseif ($_POST['jenis'] == 'penerbit') {
            hapusPenerbit($id);
        }
    }

}

// Tampilkan data buku
$buku = mysqli_query($koneksi, "SELECT * FROM buku");
$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray-100">
<nav>
        <div class="brand">Unibookstore</div>
        <a href="index.php">Home</a>
        <a href="admin.php">Admin</a>
        <a href="pengadaan.php">Pengadaan</a>
    </nav>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">

        <h2 class="text-3xl font-bold mb-4 custom-text">Data Buku</h2>
        <table class="table-auto w-full border bg-white">
        <a href="add.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Data</a> 
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID Buku</th>
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Nama Buku</th>
                    <th class="border px-4 py-2">Tahun</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Penerbit</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $row) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $row['id_buku'] ?></td>
                        <td class="border px-4 py-2"><?= $row['kategori'] ?></td>
                        <td class="border px-4 py-2"><?= $row['nama_buku'] ?></td>
                        <td class="border px-4 py-2"><?= $row['tahun'] ?></td>
                        <td class="border px-4 py-2"><?= $row['harga'] ?></td>
                        <td class="border px-4 py-2"><?= $row['stok'] ?></td>
                        <td class="border px-4 py-2"><?= $row['penerbit'] ?></td>
                        <td class="border px-4 py-2">
                            <a href='edit.php?id=<?= $row['id_buku'] ?>&jenis=buku' class="text-white bg-green-300 rounded-lg px-2 py-1 hover:bg-green-500 hover:text-black">Edit</a> |
                            <form method='post' action='admin.php' class="inline">
                                <input type='hidden' name='id' value='<?= $row['id_buku'] ?>'>
                                <input type='hidden' name='aksi' value='delete'>
                                <input type='hidden' name='jenis' value='buku'>
                                <button type='submit' class="text-white bg-red-300 rounded-lg px-2 py-1 hover:bg-red-500 hover:text-black">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 class="text-3xl font-bold mb-4 custom-text">Data penerbit</h2>
        
        <table class="table-auto w-full border bg-white">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID Penerbit</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Alamat</th>
                    <th class="border px-4 py-2">Kota</th>
                    <th class="border px-4 py-2">Telpon</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
                
            </thead>
            <tbody>
                <?php foreach ($penerbit as $row) : ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $row['id_penerbit'] ?></td>
                        <td class="border px-4 py-2"><?= $row['nama'] ?></td>
                        <td class="border px-4 py-2"><?= $row['alamat'] ?></td>
                        <td class="border px-4 py-2"><?= $row['kota'] ?></td>
                        <td class="border px-4 py-2"><?= $row['telepon'] ?></td>
                        <td class="border px-4 py-2"><?= $row['email'] ?></td>
                        <td class="border px-4 py-2">
                            <a href='edit.php?id=<?= $row['id_penerbit'] ?>&jenis=penerbit' class="text-white bg-green-300 rounded-lg px-2 py-1 hover:bg-green-500 hover:text-black">Edit</a> |
                            <form method='post' action='admin.php' class="inline">
                                <input type='hidden' name='id' value='<?= $row['id_penerbit'] ?>'>
                                <input type='hidden' name='aksi' value='delete'>
                                <input type='hidden' name='jenis' value='penerbit'>
                                <button type='submit' class="text-white bg-red-300 rounded-lg px-2 py-1 hover:bg-red-500 hover:text-black">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>

</html>
