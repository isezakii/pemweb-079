Nama: Dzakirah Rahmat Hidayat
NIM : 220631100079
Judul Aplikasi : Sistem Pendataan Mahasiswa
Deskripsi : codingan ini berisi tentang pendataan mahasiswa VIA input, dan bisa di edit dengan mudah
Screenshot Aplikasi : 
<img width="1330" height="728" alt="image" src="https://github.com/user-attachments/assets/233e4c67-00f9-4e1f-8323-36e319f9cc39" />
<img width="1318" height="727" alt="image" src="https://github.com/user-attachments/assets/e519cb5b-4c7e-4801-8260-2007f442994b" />
<img width="1331" height="728" alt="image" src="https://github.com/user-attachments/assets/92e462d2-ab47-4345-b213-6593ddaa35b4" />

Struktur database : struktur database
| Kolom      |   Tipe Data            |  Keterangan
|ID          | INT (AUTO_INCREMENT)   |  Primary Key, Unik
|NIM         | VARCHAR(20)            |  NIM Mahasiswa (unik)
|nama        | VARCHAR(100)           | Nama mahasiswa 
|Jurusan     | VARCHAR(100)           | Jurusan Mahasiswa
|Angkatan    | INT                    | Tahun Angkatan
|Email       | VARCHAR(100)           | Email mahasiswa

Cara Menjalankan Aplikasi: 
1. buka XAMPP, kemudian nyalakan MySQL dan Apache
2. pastikan semua file berada pada folder ..\htdocs\
3. buka website [http://localhost/index.php](http://localhost/index.php)
