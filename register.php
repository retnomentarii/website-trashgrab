<?php
include 'koneksi.php';

error_reporting(0);

session_start();

// if (!isset($_SESSION['username'])) { // Perbaikan pada bagian ini
//     header("Location: login.php");
// }

$nama       = "";
$email     = "";
$username   = "";
$telp = "";
$password = "";
$role = "Member";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama']; 
    $email = $_POST['email'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (nama, email, username, telp, password, role)
                    VALUES ('$nama', '$email', '$username', '$telp','$password', '$role')"; // Perbaikan pada bagian ini
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }

    } else {
        echo "<script>alert('Password Not Matched.')</script>";
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

	<title>Register Form </title>
</head>
<body  style="background-image: 2.jpg;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
      <div class="input-group">
				<input type="text" placeholder="Nama" name="nama" value="<?php echo $nama; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
      <div class="input-group">
				<input type="text" placeholder="Nomor Telepon" name="telp" value="<?php echo $telp; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>