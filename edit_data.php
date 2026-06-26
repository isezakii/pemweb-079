<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="card">
    <h2>Edit Data Mahasiswa</h2>
    
    <?php
    $message = '';
    $message_type = '';
    
    if (!isset($_GET['id'])) {
        header('Location: daftar_data.php');
        exit;
    }
    
    $id = $_GET['id'];
    $mhs = getMahasiswaById($conn, $id);
    
    if (!$mhs) {
        header('Location: daftar_data.php');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim = mysqli_real_escape_string($conn, $_POST['nim']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
        $angkatan = mysqli_real_escape_string($conn, $_POST['angkatan']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        if (!empty($nim) && !empty($nama) && !empty($jurusan) && !empty($angkatan) && !empty($email)) {
            $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', angkatan='$angkatan', email='$email' WHERE id='$id'";
            
            if (mysqli_query($conn, $sql)) {
                $message = 'Data mahasiswa berhasil diupdate!';
                $message_type = 'success';
                $mhs = getMahasiswaById($conn, $id);
            } else {
                $message = 'Error: ' . mysqli_error($conn);
                $message_type = 'error';
            }
        } else {
            $message = 'Semua field harus diisi!';
            $message_type = 'error';
        }
    }
    
    if ($message) {
        echo '<div class="alert alert-' . $message_type . '">' . $message . '</div>';
    }
    ?>
    
    <form method="POST" action="">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required value="<?php echo htmlspecialchars($mhs['nim']); ?>">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required value="<?php echo htmlspecialchars($mhs['nama']); ?>">
        
        <label for="jurusan">Jurusan:</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="Teknik Informatika" <?php if ($mhs['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
            <option value="Sistem Informasi" <?php if ($mhs['jurusan'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
        </select>
        
        <label for="angkatan">Angkatan:</label>
        <input type="number" id="angkatan" name="angkatan" required min="2000" max="2030" value="<?php echo htmlspecialchars($mhs['angkatan']); ?>">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($mhs['email']); ?>">
        
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="daftar_data.php" class="btn btn-warning">Kembali</a>
    </form>
</div>

<?php include 'footer.php'; ?>
