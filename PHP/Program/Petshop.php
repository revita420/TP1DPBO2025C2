<?php
session_start();

class Produk {
    private $id;
    private $nama;
    private $kategori;
    private $harga;
    private $foto;

    // Constructor
    public function __construct($id, $nama, $kategori, $harga, $foto) {
        $this->id       = $id;
        $this->nama     = $nama;
        $this->kategori = $kategori;
        $this->harga    = $harga;
        $this->foto     = $foto;
    }

    // Getter
    public function getId() {
        return $this->id;
    }
    public function getNama() {
        return $this->nama;
    }
    public function getKategori() {
        return $this->kategori;
    }
    public function getHarga() {
        return $this->harga;
    }
    public function getFoto() {
        return $this->foto;
    }

    // Setter
    public function setNama($nama) {
        $this->nama = $nama;
    }
    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }
    public function setHarga($harga) {
        $this->harga = $harga;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
    }
}

class PetShop {
    public function __construct() {
        if (!isset($_SESSION['produk'])) {
            $_SESSION['produk'] = [];
        }
    }

    public function tambahProduk($id, $nama, $kategori, $harga, $foto) {
        $produkBaru = new Produk($id, $nama, $kategori, $harga, $foto);
        $_SESSION['produk'][] = $produkBaru;
        $_SESSION['pesan'] = "Produk berhasil ditambahkan!";
    }

    public function tampilkanProduk() {
        echo "<h2 style='color: blue;'>Daftar Produk PetShop</h2>";
        if (empty($_SESSION['produk'])) {
            echo "<p style='color: red;'>Tidak ada produk yang tersedia.</p>";
            return;
        }

        echo "<table border='1' style='width: 100%; text-align: left; background-color: #f9f9f9;'>";
        echo "<tr style='background-color: #add8e6;'>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Foto</th>
              </tr>";
        foreach ($_SESSION['produk'] as $p) {
            if ($p instanceof Produk) {
                echo "<tr>
                        <td>" . $p->getId() . "</td>
                        <td>" . $p->getNama() . "</td>
                        <td>" . $p->getKategori() . "</td>
                        <td>" . $p->getHarga() . "</td>
                        <td><img src='uploads/" . $p->getFoto() . "' width='100'></td>
                      </tr>";
            }
        }
        echo "</table>";
    }

    public function hapusProduk($id) {
        foreach ($_SESSION['produk'] as $key => $p) {
            if ($p instanceof Produk && $p->getId() == $id) {
                unset($_SESSION['produk'][$key]);
                $_SESSION['pesan'] = "Produk berhasil dihapus!";
                return;
            }
        }
        $_SESSION['pesan'] = "Produk tidak ditemukan!";
    }

    public function ubahProduk($id, $nama, $kategori, $harga, $foto) {
        foreach ($_SESSION['produk'] as $p) {
            if ($p instanceof Produk && $p->getId() == $id) {
                $p->setNama($nama);
                $p->setKategori($kategori);
                $p->setHarga($harga);
                $p->setFoto($foto);
                $_SESSION['pesan'] = "Produk berhasil diubah!";
                return;
            }
        }
        $_SESSION['pesan'] = "Produk tidak ditemukan!";
    }

    public function cariProduk($nama) {
        $hasil = [];
        foreach ($_SESSION['produk'] as $p) {
            if ($p instanceof Produk && stripos($p->getNama(), $nama) !== false) {
                $hasil[] = $p;
            }
        }
        
        if (!empty($hasil)) {
            echo "<h2 style='color: green;'>Hasil Pencarian Produk</h2>";
            echo "<table border='1' style='width: 100%; text-align: left; background-color: #f9f9f9;'>";
            echo "<tr style='background-color: #add8e6;'>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Foto</th>
                  </tr>";
            foreach ($hasil as $p) {
                echo "<tr>
                        <td>" . $p->getId() . "</td>
                        <td>" . $p->getNama() . "</td>
                        <td>" . $p->getKategori() . "</td>
                        <td>" . $p->getHarga() . "</td>
                        <td><img src='uploads/" . $p->getFoto() . "' width='100'></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: red;'>Produk tidak ditemukan!</p>";
        }
    }
}
?>
