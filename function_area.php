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

$kode_area     = "";
$lokasi      = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_area         = $_GET['id_area'];
    $sql1       = "delete from area where id_area = '$id_area'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_area         = $_GET['id_area'];
    $sql1       = "select * from area where id_area = '$id_area'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $kode_area       = $r1['kode_area'];
    $lokasi       = $r1['lokasi'];

    if ($id_area == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $kode_area       = $_POST['kode_area'];
    $lokasi       = $_POST['lokasi'];

    if ($kode_area && $lokasi) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update area set kode_area = '$kode_area',lokasi = '$lokasi'  where id_area = '$id_area'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into area(kode_area,lokasi) values ('$kode_area','$lokasi')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
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
    <title>Data List Area</title>
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
        <?php if($role != "Member"): ?>
        <!-- untuk memasukkan data -->
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
                    header("refresh:5;url=function_area.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=function_area.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Kode Jadwal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode_area" name="kode_area" value="<?php echo $kode_area ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-2 col-form-label">lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi ?>">
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
                Data area
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Jadwal</th>
                            <th scope="col">Lokasi</th>
                            <?php if($role != "Member"): ?><th scope="col">Aksi</th><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from area order by id_area desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_area         = $r2['id_area'];
                            $kode_area   = $r2['kode_area'];
                            $lokasi        = $r2['lokasi'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $kode_area ?></td>
                                <td scope="row"><?php echo $lokasi ?></td>
                                <?php if($role != "Member"): ?>
                                <td scope="row">
                                    <a href="function_area.php?op=edit&id_area=<?php echo $id_area ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="function_area.php?op=delete&id_area=<?php echo $id_area?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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