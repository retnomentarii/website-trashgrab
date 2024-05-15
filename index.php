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

  // Jumlah Transaksi
  $jmltr = 0;
  $query1  = "SELECT count(id_transaksi) AS jmltr FROM transaksi";
  $sql1    = mysqli_query($koneksi, $query1);
  if(mysqli_num_rows($sql1)>0){
    $data1 = mysqli_fetch_assoc($sql1);
    $jmltr  = $data1['jmltr'];
  } 

  // Jumlah User
  $jml = 0;
  $query  = "SELECT count(id_user) AS jml FROM users";
  $sql    = mysqli_query($koneksi, $query);
  if(mysqli_num_rows($sql)>0){
    $data = mysqli_fetch_assoc($sql);
    $jml  = $data['jml'];
  } 

    // Jumlah Driver
	$jml2 = 0;
	$query2  = "SELECT count(id_peg) AS jml2 FROM pegawai";
	$sql2    = mysqli_query($koneksi, $query2);
	if(mysqli_num_rows($sql2)>0){
	  $data2 = mysqli_fetch_assoc($sql2);
	  $jml2  = $data2['jml2'];
	} 

	// Jumlah Sampah Masuk
	$jmls = 0;
	$querys  = "SELECT SUM(qty) AS jmls FROM detail_transaksi"; 
	$sqls    = mysqli_query($koneksi, $querys);
	if(mysqli_num_rows($sqls) > 0){
	$datas = mysqli_fetch_assoc($sqls);
	$jmls  = $datas['jmls'];
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
						<h3><?= number_format($jmltr); ?> Order</h3>
						<p>Transaksi</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?= number_format($jml); ?> Orang</h3>
						<p>User</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?= number_format($jml2); ?> Orang</h3>
						<p>Driver</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-package' ></i>
					<span class="text">
						<h3><?= number_format($jmls); ?> Kg</h3>
						<p>Sampah Masuk</p>
					</span>
				</li>
			</ul>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>