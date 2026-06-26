<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="card">
    <h2>Selamat Datang di Sistem Pendataan Mahasiswa</h2>
    <p>Sistem ini digunakan untuk mengelola data mahasiswa dengan mudah dan efisien.</p>
    
    <?php
    $mahasiswa = getAllMahasiswa($conn);
    $total_mahasiswa = count($mahasiswa);
    
    $jumlah_ti = 0;
    $jumlah_si = 0;
    foreach ($mahasiswa as $mhs) {
        if ($mhs['jurusan'] == 'Teknik Informatika') {
            $jumlah_ti++;
        } elseif ($mhs['jurusan'] == 'Sistem Informasi') {
            $jumlah_si++;
        }
    }
    ?>
    
    <div style="margin-top: 30px;">
        <h3>Statistik Data</h3>
        <p>Total Mahasiswa: <strong><?php echo $total_mahasiswa; ?></strong></p>
        <p>Teknik Informatika: <strong><?php echo $jumlah_ti; ?></strong></p>
        <p>Sistem Informasi: <strong><?php echo $jumlah_si; ?></strong></p>
    </div>
    
    <div style="margin-top: 30px;">
        <a href="tambah_data.php" class="btn btn-primary">Tambah Data Mahasiswa</a>
        <a href="daftar_data.php" class="btn btn-success">Lihat Daftar Mahasiswa</a>
    </div>
</div>

<?php include 'footer.php'; ?>
