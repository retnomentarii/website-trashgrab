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
include 'sidebar.php'; 
include 'navbar.php';

$jenis_sampah     = "";
$harga       = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_sampah         = $_GET['id_sampah'];
    $sql1       = "delete from katalog_sampah where id_sampah = '$id_sampah'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_sampah         = $_GET['id_sampah'];
    $sql1       = "select * from katalog_sampah where id_sampah = '$id_sampah'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $jenis_sampah       = $r1['jenis_sampah'];
    $harga       = $r1['harga'];

    if ($id_sampah == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $jenis_sampah       = $_POST['jenis_sampah'];
    $harga       = $_POST['harga'];

    if ($jenis_sampah && $harga) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update katalog_sampah set jenis_sampah = '$jenis_sampah',harga = '$harga' where id_sampah = '$id_sampah'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into katalog_sampah(jenis_sampah,harga) values ('$jenis_sampah','$harga')";
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
    <title>Data List Katalog Sampah</title>
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
    <div class="mx-auto">
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
                    header("refresh:5;url=function_katalog.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=function_katalog.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="jenis_sampah" class="col-sm-2 col-form-label">Jenis Sampah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" value="<?php echo $jenis_sampah ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        <!-- untuk memasukkan data -->

        <div class="card">
            <div class="card-header text-white">
                Data katalog sampah
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jenis Sampah</th>
                            <th scope="col">Harga</th>
                            <?php if($role != "Member"): ?><th scope="col">Aksi</th><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from katalog_sampah order by id_sampah desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_sampah         = $r2['id_sampah'];
                            $jenis_sampah   = $r2['jenis_sampah'];
                            $harga        = $r2['harga'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $jenis_sampah ?></td>
                                <td scope="row"><?php echo $harga ?></td>
                                <?php if($role != "Member"): ?>
                                <td scope="row">
                                    <a href="function_katalog.php?op=edit&id_sampah=<?php echo $id_sampah ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="function_katalog.php?op=delete&id_sampah=<?php echo $id_sampah?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>