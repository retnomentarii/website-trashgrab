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

$tanggal = "";
$kode_jadwal = "";
$id_area = "";
$id_peg = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id_jadwal = $_GET['id_jadwal'];
    $sql1 = "DELETE FROM jadwal_pickup WHERE id_jadwal = '$id_jadwal'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id_jadwal = $_GET['id_jadwal'];
    $sql1 = "SELECT jadwal_pickup.*, area.kode_area, pegawai.nama_peg 
            FROM jadwal_pickup 
            INNER JOIN area ON jadwal_pickup.id_area = area.id_area 
            INNER JOIN pegawai ON jadwal_pickup.id_peg = pegawai.id_peg 
            WHERE id_jadwal = '$id_jadwal'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $tanggal = $r1['tanggal'];
    $kode_jadwal = $r1['kode_jadwal'];
    $id_area = $r1['id_area'];
    $id_peg = $r1['id_peg'];

    if ($id_jadwal == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $tanggal = $_POST['tanggal'];
    $kode_jadwal = $_POST['kode_jadwal'];
    $id_area = $_POST['id_area'];
    $id_peg = $_POST['id_peg'];

    if ($tanggal && $kode_jadwal && $id_area && $id_peg) {
        if ($op == 'edit') { //untuk update
            $sql1 = "UPDATE jadwal_pickup SET tanggal = '$tanggal', kode_jadwal = '$kode_jadwal', id_area = '$id_area', id_peg = '$id_peg' WHERE id_jadwal = '$id_jadwal'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "INSERT INTO jadwal_pickup (tanggal, kode_jadwal, id_area, id_peg) VALUES ('$tanggal', '$kode_jadwal', '$id_area', '$id_peg')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
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
        <?php if($role != "Member"): ?>
        <div class="card">
            <div class="card-header text-white">
                Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=function_jadwal.php"); //5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=function_jadwal.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Jemput</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Kode Jadwal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode_jadwal" name="kode_jadwal" value="<?php echo $kode_jadwal ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_area" class="col-sm-2 col-form-label">Area</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_area" id="id_area">
                                <option value="">- Pilih Area -</option>
                                <?php
                                $query_area = mysqli_query($koneksi, "SELECT * FROM area") or die(mysqli_error($koneksi));
                                while ($data_area = mysqli_fetch_array($query_area)) {
                                    $selected = ($data_area['id_area'] == $id_area) ? "selected" : "";
                                    echo "<option value='" . $data_area['id_area'] . "' $selected>" . $data_area['kode_area'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_peg" class="col-sm-2 col-form-label">Driver</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_peg" id="id_peg">
                                <option value="">- Pilih Driver -</option>
                                <?php
                                $query_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai") or die(mysqli_error($koneksi));
                                while ($data_pegawai = mysqli_fetch_array($query_pegawai)) {
                                    $selected = ($data_pegawai['id_peg'] == $id_peg) ? "selected" : "";
                                    echo "<option value='" . $data_pegawai['id_peg'] . "' $selected>" . $data_pegawai['nama_peg'] . "</option>";
                                }
                                ?>
                            </select>
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
                Data Jadwal Pick Up
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kode Jadwal</th>
                            <th scope="col">Area</th>
                            <th scope="col">Driver</th>
                            <?php if($role != "Member"): ?><th scope="col">Aksi</th><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT jadwal_pickup.*, area.kode_area, pegawai.nama_peg 
                                FROM jadwal_pickup 
                                INNER JOIN area ON jadwal_pickup.id_area = area.id_area 
                                INNER JOIN pegawai ON jadwal_pickup.id_peg = pegawai.id_peg";
                        $q2 = mysqli_query($koneksi, $sql2);
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                        ?>
                            <tr>
                                <td><?php echo $urut++ ?></td>
                                <td><?php echo $r2['tanggal'] ?></td>
                                <td><?php echo $r2['kode_jadwal'] ?></td>
                                <td><?php echo $r2['kode_area'] ?></td>
                                <td><?php echo $r2['nama_peg'] ?></td>
                                <?php if($role != "Member"): ?>
                                <td>
                                    <a href="function_jadwal.php?op=edit&id_jadwal=<?php echo $r2['id_jadwal'] ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="function_jadwal.php?op=delete&id_jadwal=<?php echo $r2['id_jadwal'] ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                                <?php endif; ?>
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
