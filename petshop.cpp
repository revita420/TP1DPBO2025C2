#include <iostream>
#include <string>
using namespace std;

class PetShop {
private:
    int id[100];
    string nama[100];
    string kategori[100];
    int harga[100];
    int jumlah;

public:
    PetShop() {
        jumlah = 0;
    }

    void tambahProduk(int _id, string _nama, string _kategori, int _harga) {
        id[jumlah] = _id;
        nama[jumlah] = _nama;
        kategori[jumlah] = _kategori;
        harga[jumlah] = _harga;
        jumlah++;
        cout << "Produk PetShop berhasil ditambahkan!\n";
    }

    void tampilkanProduk() {
        cout << "\nDaftar Produk PetShop:\n";
        for (int i = 0; i < jumlah; i++) {
            cout << "ID: " << id[i] << ", Nama: " << nama[i] << ", Kategori: " << kategori[i] << ", Harga: " << harga[i] << endl;
        }
    }

    void hapusProduk(int _id) {
        for (int i = 0; i < jumlah; i++) {
            if (id[i] == _id) {
                for (int j = i; j < jumlah - 1; j++) {
                    id[j] = id[j + 1];
                    nama[j] = nama[j + 1];
                    kategori[j] = kategori[j + 1];
                    harga[j] = harga[j + 1];
                }
                jumlah--;
                cout << "Produk PetShop berhasil dihapus!\n";
                return;
            }
        }
        cout << "Produk dengan ID " << _id << " tidak ditemukan.\n";
    }

    void ubahProduk(int _id, string _nama, string _kategori, int _harga) {
        for (int i = 0; i < jumlah; i++) {
            if (id[i] == _id) {
                nama[i] = _nama;
                kategori[i] = _kategori;
                harga[i] = _harga;
                cout << "Produk PetShop berhasil diubah!\n";
                return;
            }
        }
        cout << "Produk dengan ID " << _id << " tidak ditemukan.\n";
    }

    void cariProduk(string _nama) {
        for (int i = 0; i < jumlah; i++) {
            if (nama[i] == _nama) {
                cout << "ID: " << id[i] << ", Nama: " << nama[i] << ", Kategori: " << kategori[i] << ", Harga: " << harga[i] << endl;
                return;
            }
        }
        cout << "Produk dengan nama " << _nama << " tidak ditemukan.\n";
    }
};