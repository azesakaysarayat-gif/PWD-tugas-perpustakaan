<?php
require_once "koneksi.php";

$sql = "SELECT * FROM anggota";
$hasil = mysqli_query($koneksi, $sql);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$jumlah = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
</head>
<body>

    <h2>Data Anggota Perpustakaan</h2>

    <p>Jumlah Anggota: <?php echo $jumlah; ?></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>No Anggota</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($baris = mysqli_fetch_assoc($hasil)) {
        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($baris["no_anggota"]); ?></td>
            <td><?php echo htmlspecialchars($baris["nama_lengkap"]); ?></td>
            <td><?php echo htmlspecialchars($baris["alamat"]); ?></td>

            <td>
                <a href="ubah.php?id=<?php echo $baris["id"]; ?>">Ubah</a>
                |
                <a href="hapus.php?id=<?php echo $baris["id"]; ?>"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

    <p>
        <a href="form_anggota.php">Tambah Anggota</a>
    </p>

</body>
</html>