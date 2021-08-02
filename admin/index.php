<?php

include 'akses.php'; 
include 'config.php';

if(isset($_GET['del']) && isset($_GET['username']))
{
  $id=$_GET['del'];
  $username=$_GET['username'];
  $sql = "delete from users WHERE id=:id";
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../style.css">

  </head>

  <body>
    <div>
      <div>
        <h2>Admin Area</h2>
        <p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
        <p>Selamat datang di Admin Area,  Anda Login dengan username <?php echo $_SESSION['admin']; ?></p>   
      </div>
      
      <div>
        <table bgcolor=white id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Id</th>
              <th>Username</th>
              <th>Email</th>
              <th>Address</th>
              <th>Action</th>	
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM users ORDER BY username") or die(mysqli_error($conn));

            if (mysqli_num_rows($sql) > 0) {
              $cnt=1;
              while($data = mysqli_fetch_assoc($sql)){
                echo '
                <tr>
                  <td>'.$cnt.'</td>
                  <td>'.$data['id'].'</td>
                  <td>'.$data['username'].'</td>
                  <td>'.$data['email'].'</td>
                  <td>'.$data['address'].'</td>
                  <td>
                    <a href="edit.php?id='.$data['id'].'" class="badge badge-warning">Edit</a>
                    <a href="delete.php?id='.$data['id'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                  </td>
                </tr>
                ';
              $cnt++;
            }}
            ?>        
          <tbody> 
        </table>
      </div>   

  </body>
</html>