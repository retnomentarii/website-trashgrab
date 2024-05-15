<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_SESSION['role'])) {
    $role = $_SESSION['role']; // Ambil nilai peran dari session
} else {
    $role = "Role Not Set"; // Atur nilai default jika peran belum di-set
}

?>

<?php
include 'koneksi.php';

// if (isset($_GET['op'])) {
//     $op = $_GET['op'];
// } else {
//     $op = "";
// }

if (isset($_GET['op']) && $_GET['op'] == 'edit' && isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    // Ambil status saat ini dari database
    $sql_status = "SELECT status FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $query_status = mysqli_query($koneksi, $sql_status);
    $data_status = mysqli_fetch_assoc($query_status);
    $status = $data_status['status'];

    // Update status sesuai dengan perubahan
    if ($status == "waiting") {
        $new_status = "verified";
    } elseif ($status == "verified") {
        $new_status = "ongoing";
    } elseif ($status == "ongoing") {
        $new_status = "finished";
    } elseif ($status == "finished") {
        // Tidak ada perubahan lebih lanjut karena sudah mencapai status terakhir
        echo "Transaksi sudah selesai.";
        exit; // Keluar dari proses karena tidak ada perubahan status
    }

    $sql_update = "UPDATE transaksi SET status = '$new_status' WHERE id_transaksi = '$id_transaksi'";
    $query_update = mysqli_query($koneksi, $sql_update);

    if ($query_update) {
        header("Location: function_transaksi.php"); // Redirect ke halaman utama setelah update berhasil
    } else {
        echo "Gagal mengubah status transaksi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Permintaan Penjemputan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>
        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white">
                Riwayat Permintaan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Pengajuan</th>
                            <th scope="col">Nama Pengaju</th>
                            <th scope="col">Tanggal Jemput</th>
                            <th scope="col">Lokasi Jemput</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT transaksi.*, users.nama AS nama, jadwal_pickup.tanggal, pegawai.nama_peg
                                FROM transaksi 
                                INNER JOIN users ON transaksi.id_user = users.id_user 
                                INNER JOIN jadwal_pickup ON transaksi.id_jadwal = jadwal_pickup.id_jadwal
                                INNER JOIN pegawai ON jadwal_pickup.id_peg = pegawai.id_peg";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <td><?php echo $urut++ ?></td>
                                <td><?php echo $r2['tgl_transaksi'] ?></td>
                                <td><?php echo $r2['nama'] ?></td>
                                <td><?php echo $r2['tanggal'] ?></td>
                                <td><?php echo $r2['alamat_jemput'] ?></td>
                                <td><?php echo $r2['nama_peg'] ?></td>
                                <td><?php echo $r2['status'] ?></td>
                                <td>
                                    <a href="detail_transaksi.php?id_transaksi=<?php echo $r2['id_transaksi'] ?>"><button type="button" class="btn btn-primary">Detail</button></a>
                                    <?php if($role != "Member"): ?><a href="function_transaksi.php?op=edit&id_transaksi=<?php echo $r2['id_transaksi'] ?>"><button type="button" class="btn btn-warning">Ganti Status</button></a><?php endif; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
