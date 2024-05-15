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

$id_transaksi = "";
$id_sampah = "";
$qty = "";

$sukses = "";
$error = "";

// Pastikan id_transaksi tersedia dalam URL
if (!isset($_GET['id_transaksi'])) {
    // Jika id_transaksi tidak tersedia, arahkan kembali ke halaman transaksi
    header("Location: function_transaksi.php");
    exit; // Pastikan kode di bawahnya tidak dieksekusi setelah melakukan redirect
}

// Simpan id_transaksi dari URL ke dalam variabel
$id_transaksi = $_GET['id_transaksi'];

if (isset($_POST['simpan'])) { //untuk create
    $id_sampah = $_POST['id_sampah'];
    $qty = $_POST['qty'];

    if ($id_transaksi && $id_sampah && $qty) {
        // Lakukan sanitasi data jika diperlukan
        // Lakukan validasi data jika diperlukan

        // Lakukan query untuk memasukkan data baru ke dalam database
        $sql1 = "INSERT INTO detail_transaksi (id_transaksi, id_sampah, qty) VALUES ('$id_transaksi', '$id_sampah', '$qty')";
        $query_insert = mysqli_query($koneksi, $sql1);

        if ($query_insert) {
            $sukses = "Berhasil memasukkan data baru";
        } else {
            $error = "Gagal memasukkan data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data List Jadwal Pick Up</title>
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
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <?php if($role != "Admin"): ?>
        <div class="card">
            <div class="card-header text-white">
                Tambah Detail Transaksi
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=detail_transaksi.php?id_transaksi=$id_transaksi"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=detail_transaksi.php?id_transaksi=$id_transaksi");
                }
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi ?>">
                    <div class="mb-3 row">
                        <label for="id_sampah" class="col-sm-2 col-form-label">Sampah</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_sampah" id="id_sampah">
                                <option value="">- Pilih Sampah -</option>
                                <?php
                                $query_sampah = mysqli_query($koneksi, "SELECT * FROM katalog_sampah") or die(mysqli_error($koneksi));
                                while ($data_sampah = mysqli_fetch_array($query_sampah)) {
                                    echo "<option value='" . $data_sampah['id_sampah'] . "'>" . $data_sampah['jenis_sampah'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="qty" class="col-sm-2 col-form-label">Quantity/Kg</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $qty ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white">
                Data Detail Transaksi
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col">Harga/Kg</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga Total</th>
                            <!-- Tambahkan kolom lain jika diperlukan -->
                            <?php if($role != "Admin"): ?><th scope="col">Aksi</th><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data detail transaksi berdasarkan id_transaksi
                        $sql2 = "SELECT detail_transaksi.*, katalog_sampah.jenis_sampah, katalog_sampah.harga 
                                FROM detail_transaksi 
                                INNER JOIN katalog_sampah ON detail_transaksi.id_sampah = katalog_sampah.id_sampah
                                WHERE detail_transaksi.id_transaksi = '$id_transaksi'";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        $total_harga = 0; // Inisialisasi variabel total harga
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $harga_total = $r2['harga'] * $r2['qty']; // Hitung harga total untuk setiap detail transaksi
                            $total_harga += $harga_total; // Tambahkan harga total ke total keseluruhan
                        ?>
                            <tr>
                                <td><?php echo $urut++ ?></td>
                                <td><?php echo $r2['jenis_sampah'] ?></td>
                                <td><?php echo $r2['harga'] ?></td>
                                <td><?php echo $r2['qty'] ?></td>
                                <td><?php echo $harga_total ?></td>
                                <!-- Tambahkan kolom lain jika diperlukan -->
                                <?php if($role != "Admin"): ?>
                                <td>
                                    <a href="detail_transaksi.php?op=delete&id_transaksi=<?php echo $r2['id_transaksi'] ?>&id_sampah=<?php echo $r2['id_sampah'] ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Tampilkan total harga keseluruhan di luar tabel -->
                <div class="total-harga">
                    <strong>Total Harga Keseluruhan: </strong>Rp <?php echo $total_harga; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
