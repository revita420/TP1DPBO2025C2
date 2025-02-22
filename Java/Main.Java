import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<PetShop> daftarProduk = new ArrayList<>();
        int pilihan;

        do {
            System.out.println("\nMenu:");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Tampilkan Produk");
            System.out.println("3. Hapus Produk");
            System.out.println("4. Ubah Produk");
            System.out.println("5. Cari Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilih menu: ");
            pilihan = scanner.nextInt();
            scanner.nextLine(); 

            switch (pilihan) {
                case 1:
                    System.out.print("Masukkan ID: ");
                    int id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Masukkan Nama: ");
                    String nama = scanner.nextLine();
                    System.out.print("Masukkan Kategori: ");
                    String kategori = scanner.nextLine();
                    System.out.print("Masukkan Harga: ");
                    int harga = scanner.nextInt();
                    daftarProduk.add(new PetShop(id, nama, kategori, harga));
                    System.out.println("Produk berhasil ditambahkan!");
                    break;

                case 2:
                    System.out.println("\nDaftar Produk PetShop:");
                    for (PetShop produk : daftarProduk) {
                        System.out.println(produk.displayInfo()); 
                    }
                    break;

                case 3:
                    System.out.print("Masukkan ID produk yang ingin dihapus: ");
                    int idHapus = scanner.nextInt();
                    boolean ditemukan = false;
                    for (int i = 0; i < daftarProduk.size(); i++) {
                        if (daftarProduk.get(i).getId() == idHapus) {
                            daftarProduk.remove(i);
                            ditemukan = true;
                            System.out.println("Produk berhasil dihapus!");
                            break;
                        }
                    }
                    if (!ditemukan) {
                        System.out.println("Produk dengan ID " + idHapus + " tidak ditemukan.");
                    }
                    break;

                case 4:
                    System.out.print("Masukkan ID produk yang ingin diubah: ");
                    int idUbah = scanner.nextInt();
                    scanner.nextLine();
                    boolean diubah = false;
                    for (PetShop produk : daftarProduk) {
                        if (produk.getId() == idUbah) {
                            System.out.print("Masukkan Nama baru: ");
                            produk.setNama(scanner.nextLine());
                            System.out.print("Masukkan Kategori baru: ");
                            produk.setKategori(scanner.nextLine());
                            System.out.print("Masukkan Harga baru: ");
                            produk.setHarga(scanner.nextInt());
                            diubah = true;
                            System.out.println("Produk berhasil diubah!");
                            break;
                        }
                    }
                    if (!diubah) {
                        System.out.println("Produk dengan ID " + idUbah + " tidak ditemukan.");
                    }
                    break;

                case 5:
                    System.out.print("Masukkan Nama produk yang dicari: ");
                    String namaCari = scanner.nextLine();
                    boolean ketemu = false;
                    for (PetShop produk : daftarProduk) {
                        if (produk.getNama().equalsIgnoreCase(namaCari)) {
                            System.out.println(produk.displayInfo()); 
                            ketemu = true;
                            break;
                        }
                    }
                    if (!ketemu) {
                        System.out.println("Produk dengan nama " + namaCari + " tidak ditemukan.");
                    }
                    break;
            }
        } while (pilihan != 6);

        scanner.close();
    }
}
