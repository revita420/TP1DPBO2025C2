class PetShop:
    class Produk:
        def __init__(self, id, nama, kategori, harga):
            self.__id = id
            self.__nama = nama
            self.__kategori = kategori
            self.__harga = harga

        # Getter
        def get_id(self):
            return self.__id

        def get_nama(self):
            return self.__nama

        def get_kategori(self):
            return self.__kategori

        def get_harga(self):
            return self.__harga
        
        # Setter

        def set_nama(self, nama):
            self.__nama = nama

        def set_kategori(self, kategori):
            self.__kategori = kategori

        def set_harga(self, harga):
            self.__harga = harga

        def display_info(self):
            return f"ID: {self.__id}, Nama: {self.__nama}, Kategori: {self.__kategori}, Harga: {self.__harga}"

    def __init__(self):
        self.__daftar_produk = []

    def tambah_produk(self, id, nama, kategori, harga):
        produk = self.Produk(id, nama, kategori, harga)
        self.__daftar_produk.append(produk)
        print("Produk PetShop berhasil ditambahkan!")

    def tampilkan_produk(self):
        print("\nDaftar Produk PetShop:")
        for produk in self.__daftar_produk:
            print(produk.display_info())

    def hapus_produk(self, id):
        for produk in self.__daftar_produk:
            if produk.get_id() == id:
                self.__daftar_produk.remove(produk)
                print("Produk berhasil dihapus!")
                return
        print(f"Produk dengan ID {id} tidak ditemukan.")

    def ubah_produk(self, id, nama, kategori, harga):
        for produk in self.__daftar_produk:
            if produk.get_id() == id:
                produk.set_nama(nama)
                produk.set_kategori(kategori)
                produk.set_harga(harga)
                print("Produk berhasil diubah!")
                return
        print(f"Produk dengan ID {id} tidak ditemukan.")

    def cari_produk(self, nama):
        for produk in self.__daftar_produk:
            if produk.get_nama().lower() == nama.lower():
                print(produk.display_info())
                return
        print(f"Produk dengan nama {nama} tidak ditemukan.")
