<?php
include 'PetShop.php';
$toko = new PetShop();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $foto     = $_FILES['foto']['name'];
    $target_dir  = "uploads/";
    $target_file = $target_dir . basename($foto);

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        if (isset($_POST['ubah'])) {
            $toko->ubahProduk($id, $nama, $kategori, $harga, $foto);
        } else {
            $toko->tambahProduk($id, $nama, $kategori, $harga, $foto);
        }
    } else {
        $_SESSION['pesan'] = "Gagal mengupload file.";
    }
}

if (isset($_GET['hapus'])) {
    $toko->hapusProduk($_GET['hapus']);
}
if (isset($_GET['cari'])) {
    $toko->cariProduk($_GET['cari']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PetShop</title>
    <style>
        .button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #45a049;
        }
        .notif {
            background-color: yellow;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['pesan'])) {
        echo "<div class='notif'>{$_SESSION['pesan']}</div>";
        unset($_SESSION['pesan']);
    }
    ?>

    <h2>Pilih Menu</h2>
    <a href="?menu=tambah" class="button">Tambah Produk</a>
    <a href="?menu=tampil" class="button">Tampilkan Produk</a>
    <a href="?menu=hapus" class="button">Hapus Produk</a>
    <a href="?menu=ubah" class="button">Ubah Produk</a>
    <a href="?menu=cari" class="button">Cari Produk</a>

    <?php
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
        if ($menu == 'tambah' || $menu == 'ubah') {
            echo '<h2>Tambah/Ubah Produk</h2>
            <form action="" method="post" enctype="multipart/form-data">
                ID: <input type="text" name="id" required><br>
                Nama: <input type="text" name="nama" required><br>
                Kategori: <input type="text" name="kategori" required><br>
                Harga: <input type="number" name="harga" required><br>
                Foto: <input type="file" name="foto" required><br>
                <input type="submit" name="tambah" class="button" value="Tambah Produk">
                <input type="submit" name="ubah" class="button" value="Ubah Produk">
            </form>';
        } elseif ($menu == 'hapus') {
            echo '<h2>Hapus Produk</h2>
            <form action="" method="get">
                ID: <input type="text" name="hapus" required>
                <input type="submit" class="button" value="Hapus Produk">
            </form>';
        } elseif ($menu == 'cari') {
            echo '<h2>Cari Produk</h2>
            <form action="" method="get">
                Nama: <input type="text" name="cari" required>
                <input type="submit" class="button" value="Cari Produk">
            </form>';
        } elseif ($menu == 'tampil') {
            $toko->tampilkanProduk();
        }
    }
    ?>
</body>
</html>
