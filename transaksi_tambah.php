<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Mendapatkan ID pengguna dari session
$id_user = $_SESSION['id_user'];

if(isset($_SESSION['role'])) {
    $role = $_SESSION['role']; // Ambil nilai peran dari session
} else {
    $role = "Role Not Set"; // Atur nilai default jika peran belum di-set
}

?>

<?php
include 'koneksi.php';

$id_jadwal = "";
$tgl_transaksi = "";
$alamat_jemput = "";
$status = "waiting"; // Mengisi status dengan nilai default 'waiting'

$sukses = "";
$error = "";

if (isset($_POST['simpan'])) { //untuk create
    $id_jadwal = $_POST['id_jadwal'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $alamat_jemput = $_POST['alamat_jemput'];

    if ($id_user && $id_jadwal && $tgl_transaksi && $alamat_jemput && $status) {
        $sql1 = "INSERT INTO transaksi (id_user, id_jadwal, tgl_transaksi, alamat_jemput, status) VALUES ('$id_user', '$id_jadwal', '$tgl_transaksi', '$alamat_jemput', '$status')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
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
    <title>Pengajuan Penjemputan</title>
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
        <div class="card">
            <div class="card-header text-white">
                Ajukan Penjemputan
            </div>
            <div class="card-body">
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=transaksi_tambah.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="tgl_transaksi" class="col-sm-2 col-form-label">Tgl Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_user" class="col-sm-2 col-form-label">Id Pengaju</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_jadwal" class="col-sm-2 col-form-label">Jadwal Penjemputan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_jadwal" id="id_jadwal">
                                <option value="">- Pilih Jadwal -</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM jadwal_pickup") or die(mysqli_error($koneksi));
                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value=$data[id_jadwal]> $data[kode_jadwal] </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_jemput" class="col-sm-2 col-form-label">Alamat Jemput</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_jemput" name="alamat_jemput" value="<?php echo $alamat_jemput ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        // Mendapatkan elemen input tanggal
        const inputTanggal = document.getElementById('tgl_transaksi');

        // Mendapatkan tanggal hari ini
        const today = new Date();
        const year = today.getFullYear();
        let month = today.getMonth() + 1;
        let day = today.getDate();

        // Jika bulan atau hari kurang dari 10, tambahkan '0' di depannya untuk format tanggal yang sesuai
        if (month < 10) {
            month = '0' + month;
        }
        if (day < 10) {
            day = '0' + day;
        }

        // Mengatur nilai default input tanggal ke tanggal hari ini
        inputTanggal.value = `${year}-${month}-${day}`;
    </script>

</body>
</html>
