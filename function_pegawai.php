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

$nama_peg       = "";
$jenis_kelamin     = "";
$email     = "";
$no_telp   = "";
$alamat = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id_peg         = $_GET['id_peg'];
    $sql1       = "delete from pegawai where id_peg = '$id_peg'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id_peg         = $_GET['id_peg'];
    $sql1       = "select * from pegawai where id_peg = '$id_peg'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama_peg       = $r1['nama_peg'];
    $jenis_kelamin     = $r1['jenis_kelamin'];
    $email     = $r1['email'];
    $no_telp   = $r1['no_telp'];
    $alamat     = $r1['alamat'];

    if ($id_peg == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $nama_peg       = $_POST['nama_peg'];
    $jenis_kelamin     = $_POST['jenis_kelamin'];
    $email   = $_POST['email'];
    $no_telp   = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    if ($nama_peg && $jenis_kelamin && $email && $no_telp && $alamat) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update pegawai set nama_peg = '$nama_peg',jenis_kelamin = '$jenis_kelamin',email='$email',no_telp='$no_telp', alamat='$alamat' where id_peg = '$id_peg'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into pegawai(nama_peg,jenis_kelamin,email,no_telp,alamat) values ('$nama_peg','$jenis_kelamin','$email','$no_telp','$alamat')";
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
    <title>Data pegawai</title>
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
                    header("refresh:5;url=function_pegawai.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=function_pegawai.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_peg" class="col-sm-2 col-form-label">Nama pegawai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_peg" name="nama_peg" value="<?php echo $nama_peg ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="laki-laki" <?php if ($jenis_kelamin == "laki-laki") echo "selected" ?>>Laki-Laki</option>
                                <option value="perempuan" <?php if ($jenis_kelamin == "perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telp" class="col-sm-2 col-form-label">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $no_telp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white">
                Data pegawai
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from pegawai order by id_peg desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_peg         = $r2['id_peg'];
                            $nama_peg        = $r2['nama_peg'];
                            $jenis_kelamin     = $r2['jenis_kelamin'];
                            $email   = $r2['email'];
                            $no_telp   = $r2['no_telp'];
                            $alamat   = $r2['alamat'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama_peg ?></td>
                                <td scope="row"><?php echo $jenis_kelamin ?></td>
                                <td scope="row"><?php echo $email ?></td>
                                <td scope="row"><?php echo $no_telp ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row">
                                    <a href="function_pegawai.php?op=edit&id_peg=<?php echo $id_peg ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="function_pegawai.php?op=delete&id_peg=<?php echo $id_peg?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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