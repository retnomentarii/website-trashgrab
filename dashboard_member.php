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
$id_user = $_SESSION['id_user'];

  // Jumlah Transaksi Member
  $jmltr = 0;
  $query1  = "SELECT count(id_transaksi) AS jmltr FROM transaksi WHERE id_user = '$id_user'";
  $sql1    = mysqli_query($koneksi, $query1);
  if(mysqli_num_rows($sql1)>0){
    $data1 = mysqli_fetch_assoc($sql1);
    $jmltr  = $data1['jmltr'];
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Trash Grab</title>
</head>
<body>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<?php echo "<h1>Welcome " . $_SESSION['role'] . " " . $_SESSION['username'] . "</h1>"; ?>
					<!-- <h1>Dashboard</h1> -->
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
                        <h3><?= number_format($jmltr); ?> Riwayat</h3>
						<p>Transaksi</p>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Riwayat Permintaan Penjemputan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Tanggal Jemput</th>
                                        <th scope="col">Driver</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql2 = "SELECT transaksi.*, users.nama AS nama_user, jadwal_pickup.tanggal, pegawai.nama_peg
                                            FROM transaksi
                                            INNER JOIN users ON transaksi.id_user = users.id_user 
                                            INNER JOIN jadwal_pickup ON transaksi.id_jadwal = jadwal_pickup.id_jadwal
                                            INNER JOIN pegawai ON jadwal_pickup.id_peg = pegawai.id_peg
                                            WHERE transaksi.id_user = '$id_user';";
                                    $q2 = mysqli_query($koneksi, $sql2);
                                    $urut = 1;
                                    while ($r2 = mysqli_fetch_array($q2)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $urut++ ?></td>
                                            <td><?php echo $r2['tgl_transaksi'] ?></td>
                                            <td><?php echo $r2['tanggal'] ?></td>
                                            <td><?php echo $r2['nama_peg'] ?></td>
                                            <td><?php echo $r2['status'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody> 
                            </table>
                        </div>
                    </div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>