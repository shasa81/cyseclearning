<?php 
include 'akses.php'; 
include 'config.php';

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Username</th><th>Password</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["username"]."</td><td>".$row["password"];
  }
  echo "</table>";
} 

else {
  echo "0 results";
}

?>




<html>
<head>
	<title>Admin Area | tutorialweb.net</title>
</head>
<body>
 
	<div style="text-align:center">
		<h2>Admin Area</h2>
		<p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
 
		<p>Selamat datang di Admin Area, Anda Login dengan username <?php echo $_SESSION['admin']; ?></p>
	</div>
 
</body>
</html>