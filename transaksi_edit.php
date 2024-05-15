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

$id_transaksi = "";
$id_user = "";
$tgl_transaksi = "";
$status = ""; 
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_transaksi         = $_GET['id_transaksi'];
    $sql1       = "SELECT transaksi.*, users.nama, jadwal_pickup.tanggal 
                    FROM transaksi 
                    INNER JOIN users ON transaksi.id_user = users.id_user 
                    INNER JOIN jadwal_pickup ON transaksi.id_jadwal = jadwal_pickup.id_jadwal
                    WHERE id_transaksi = '$id_transaksi'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $id_user       = $r1['id_user'];
    $tgl_transaksi     = $r1['tgl_transaksi'];
    $status     = $r1['status'];

    if ($id_transaksi == '') {
        $error = "Data tidak ditemukan";
    }
}


if (isset($_POST['simpan'])) { //untuk create
    $id_user = $_POST['id_user'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $status = $_POST['status'];

    if ($id_user  && $tgl_transaksi && $status) {
        $sql1 = "INSERT INTO transaksi (id_user, tgl_transaksi, status) VALUES ('$id_user', '$tgl_transaksi', '$status')";
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
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header text-white">
                Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=function_transaksi.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=function_transaksi.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="tgl_transaksi" class="col-sm-2 col-form-label">Tanggal Pengajuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $tgl_transaksi ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_user" class="col-sm-2 col-form-label">Nama Pengaju</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_user" id="id_user" readonly>
                                <option value="">- Pilih -</option>
                                <?php
                                $query_user = mysqli_query($koneksi, "SELECT * FROM users") or die(mysqli_error($koneksi));
                                while ($data_user = mysqli_fetch_array($query_user)) {
                                    $selected = ($data_user['id_user'] == $id_user) ? "selected" : "";
                                    echo "<option value='" . $data_user['id_user'] . "' $selected>" . $data_user['nama'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">- Pilih Status -</option>
                                <option value="verified" <?php if ($status == "verified") echo "selected" ?>>Verified</option>
                                <option value="ongoing" <?php if ($status == "ongoing") echo "selected" ?>>On Going</option>
                                <option value="finished" <?php if ($status == "finished") echo "selected" ?>>Finished</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>