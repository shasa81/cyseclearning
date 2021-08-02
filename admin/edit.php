<?php 
	include('config.php');
	include('akses.php');  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>


<body>
<div>
	<div>
        <h2>Edit User Data</h2>
        <p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
        <p>Anda dapat mengedit list user di halaman ini <?php echo $_SESSION['admin']; ?></p>   
      </div>

		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			echo 'ada';
			$username		= $_POST['username'];
			$email			= $_POST['email'];
			$address		= $_POST['address'];
			
			$sql = mysqli_query($conn, "UPDATE users SET username='$username', email='$email', address='$address' WHERE id='$id'") or die(mysqli_error($conn));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		else{
			echo 'nothing';
		}
		?>
	<div class="container">
		<form action="edit.php?id=<?php echo $id; ?>" method="post" class="login-email">
			
			<label class="col-sm-2 col-form-label">Id</label>
			<div class="input-group">
				<input style="color:grey" type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
			</div>

			<label class="col-sm-2 col-form-label">Username</label>
			<div class="input-group">
				<input type="text" name="username" value="<?php echo $data['username']; ?>" required>
			</div>

			<label class="col-sm-2 col-form-label">Email</label>
			<div class="input-group">
				<input type="text" name="email" value="<?php echo $data['email']; ?>" required>
			</div>
			
			<label class="col-sm-2 col-form-label">Address</label>
			<div class="input-group">
				<input type="text" name="address" value="<?php echo $data['address']; ?>" required>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
					<a href="index.php" class="btn btn-warning">Back</a>
				</div>
			</div>
		</div>
		</form>
	</div>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<div>	
</body>
</html>