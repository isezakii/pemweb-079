<?php include 'header.php'; ?>
<?php include 'config.php'; ?>

<div class="card">
    <h2>Daftar Data Mahasiswa</h2>
    
    <?php
    $message = '';
    $message_type = '';
    
    if (isset($_GET['delete_id'])) {
        $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
        $sql = "DELETE FROM mahasiswa WHERE id = '$delete_id'";
        
        if (mysqli_query($conn, $sql)) {
            $message = 'Data mahasiswa berhasil dihapus!';
            $message_type = 'success';
        } else {
            $message = 'Error: ' . mysqli_error($conn);
            $message_type = 'error';
        }
    }
    
    if ($message) {
        echo '<div class="alert alert-' . $message_type . '">' . $message . '</div>';
    }
    
    $mahasiswa = getAllMahasiswa($conn);
    ?>
    
    <a href="tambah_data.php" class="btn btn-primary">Tambah Data Baru</a>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (count($mahasiswa) > 0) {
                foreach ($mahasiswa as $mhs) {
                    echo '<tr>';
                    echo '<td>' . $no . '</td>';
                    echo '<td>' . htmlspecialchars($mhs['nim']) . '</td>';
                    echo '<td>' . htmlspecialchars($mhs['nama']) . '</td>';
                    echo '<td>' . htmlspecialchars($mhs['jurusan']) . '</td>';
                    echo '<td>' . htmlspecialchars($mhs['angkatan']) . '</td>';
                    echo '<td>' . htmlspecialchars($mhs['email']) . '</td>';
                    echo '<td>';
                    echo '<a href="edit_data.php?id=' . $mhs['id'] . '" class="btn btn-warning" style="margin-right: 10px;">Edit</a>';
                    echo '<a href="daftar_data.php?delete_id=' . $mhs['id'] . '" class="btn btn-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\');">Hapus</a>';
                    echo '</td>';
                    echo '</tr>';
                    $no++;
                }
            } else {
                echo '<tr><td colspan="7" style="text-align: center;">Tidak ada data mahasiswa</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
