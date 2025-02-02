<?php


include_once('koneksi.php');

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        
        // Mengambil peran pengguna dari database
        $role = $row['role']; // Asumsikan peran pengguna disimpan dalam kolom 'role'
    
        // Set session role
        $_SESSION['role'] = $role;
        $_SESSION['id_user'] = $row['id_user'];
        
		if ($role === 'Admin') {
            header("Location: index.php"); // Jika peran adalah admin, arahkan ke index.php
        } elseif ($role === 'Member') {
            header("Location: dashboard_member.php"); // Jika peran adalah member, arahkan ke dashboard_member.php
        }
    } else {
        echo "<script>alert('Woops! Email Atau Password anda Salah.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="webku/css/loginregis.css">

	<title>Login Trash Grab</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Daftar sebagai member? <a href="register.php">Register Here</a></p>
            <p class="login-register-text">Kembali ke Home? <a href="webku/main.php">Back</a></p>
		</form>
	</div>
</body>
</html>
