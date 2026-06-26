-- Membuat database
CREATE DATABASE IF NOT EXISTS sistem_pendataan_mahasiswa;
USE sistem_pendataan_mahasiswa;

-- Membuat tabel mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    angkatan INT NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Memasukkan data awal (minimal 5 record)
INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, email) VALUES
('2023001', 'Andi Pratama', 'Teknik Informatika', 2023, 'andi@example.com'),
('2023002', 'Budi Santoso', 'Sistem Informasi', 2023, 'budi@example.com'),
('2022001', 'Citra Dewi', 'Teknik Informatika', 2022, 'citra@example.com'),
('2022002', 'Dedi Permana', 'Sistem Informasi', 2022, 'dedi@example.com'),
('2021001', 'Eka Putri', 'Teknik Informatika', 2021, 'eka@example.com');
