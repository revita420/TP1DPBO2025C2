public class PetShop {
    private int id;
    private String nama;
    private String kategori;
    private int harga;

    // Constructor
    public PetShop(int id, String nama, String kategori, int harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.harga = harga;
    }

    // Getter
    public int getId() {
        return id;
    }

    public String getNama() {
        return nama;
    }

    public String getKategori() {
        return kategori;
    }

    public int getHarga() {
        return harga;
    }

    // Setter
    public void setId(int id) {
        this.id = id;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public void setHarga(int harga) {
        this.harga = harga;
    }

    public String displayInfo() {
        return "ID: " + id + ", Nama: " + nama + ", Kategori: " + kategori + ", Harga: " + harga;
    }    
    
}
