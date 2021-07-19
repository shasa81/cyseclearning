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

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'ManageUser')" id="defaultOpen">Manage User</button>
    <button class="tablinks" onclick="openCity(event, 'menu2')">Menu 2</button>
    <button class="tablinks" onclick="openCity(event, 'menu3')">Menu 3</button>
  </div>

  <div id="ManageUser" class="tabcontent">
  <h3>List User</h3>
  <div>
    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Email</th>
        </tr>
      </thead>
  </div>   
  </div>

  <div id="menu2" class="tabcontent">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p> 
  </div>

  <div id="menu3" class="tabcontent">
    <h3>Tokyo</h3>
    <p>Tokyo is the capital of Japan.</p>
  </div>

 
</div>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</html>
        

<?php
include 'akses.php'; 
include 'config.php';
$sql = "SELECT * FROM users";
$cnt=1;
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  while($data = mysqli_fetch_assoc($result)){
    ?>	
										<tr>
                      
                      <td style="text-align:center"><?php echo htmlentities($cnt);?></t>
                      <td style="text-align:center"><?php echo htmlentities($data['username']);?></td>
                      <td style="text-align:center"><?php echo htmlentities($data['email']);?></td>
											
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody> 
</body>
</html>