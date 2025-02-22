from PetShop import PetShop

def main():
    toko = PetShop()

    while True:
        print("\nMenu:")
        print("1. Tambah Produk")
        print("2. Tampilkan Produk")
        print("3. Hapus Produk")
        print("4. Ubah Produk")
        print("5. Cari Produk")
        print("6. Keluar")
        pilihan = input("Pilih menu: ")

        if pilihan == "1":
            id = int(input("Masukkan ID: "))
            nama = input("Masukkan Nama: ")
            kategori = input("Masukkan Kategori: ")
            harga = int(input("Masukkan Harga: "))
            toko.tambah_produk(id, nama, kategori, harga)

        elif pilihan == "2":
            toko.tampilkan_produk()

        elif pilihan == "3":
            id = int(input("Masukkan ID produk yang ingin dihapus: "))
            toko.hapus_produk(id)

        elif pilihan == "4":
            id = int(input("Masukkan ID produk yang ingin diubah: "))
            nama = input("Masukkan Nama baru: ")
            kategori = input("Masukkan Kategori baru: ")
            harga = int(input("Masukkan Harga baru: "))
            toko.ubah_produk(id, nama, kategori, harga)

        elif pilihan == "5":
            nama = input("Masukkan Nama produk yang dicari: ")
            toko.cari_produk(nama)

        elif pilihan == "6":
            print("Terima kasih!")
            break

        else:
            print("Pilihan tidak valid! Silakan pilih menu yang benar.")

if __name__ == "__main__":
    main()
