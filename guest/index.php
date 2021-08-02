<?php include('akses.php'); 
session_start();

if (!isset($_SESSION['guest'])) {
    header("Location: index.php");
}
?>

<html>
<head>
	<title>Guest Area </title>
</head>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>
 
	<div style="text-align:center">
		<h2>Guest Area</h2>
		<p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
 
		<p>Selamat datang di Guest Area, Anda Login dengan username <?php echo $_SESSION['guest']; ?></p>
	</div>
 
</body>
</html>

<?php 

?>
