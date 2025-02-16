#include "petshop.cpp"

int main() {
    PetShop toko;
    int pilihan;
    do {
        cout << "\nMenu:\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Hapus Produk\n";
        cout << "4. Ubah Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilih menu: ";
        cin >> pilihan;
        cin.ignore(); // Membersihkan buffer
        
        if (pilihan == 1) {
            int id, harga;
            string nama, kategori;
            cout << "Masukkan ID: "; cin >> id;
            cin.ignore();
            cout << "Masukkan Nama: "; getline(cin, nama);
            cout << "Masukkan Kategori: "; getline(cin, kategori);
            cout << "Masukkan Harga: "; cin >> harga;
            cin.ignore();
            toko.tambahProduk(id, nama, kategori, harga);
        }
        else if (pilihan == 2) {
            toko.tampilkanProduk();
        }
        else if (pilihan == 3) {
            int id;
            cout << "Masukkan ID produk yang ingin dihapus: "; cin >> id;
            cin.ignore();
            toko.hapusProduk(id);
        }
        else if (pilihan == 4) {
            int id, harga;
            string nama, kategori;
            cout << "Masukkan ID produk yang ingin diubah: "; cin >> id;
            cin.ignore();
            cout << "Masukkan Nama baru: "; getline(cin, nama);
            cout << "Masukkan Kategori baru: "; getline(cin, kategori);
            cout << "Masukkan Harga baru: "; cin >> harga;
            cin.ignore();
            toko.ubahProduk(id, nama, kategori, harga);
        }
        else if (pilihan == 5) {
            string nama;
            cout << "Masukkan Nama produk yang dicari: "; getline(cin, nama);
            toko.cariProduk(nama);
        }
    } while (pilihan != 6);
    
    return 0;
}
