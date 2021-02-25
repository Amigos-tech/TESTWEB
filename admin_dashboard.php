<?php 
	session_start();
  	if (!isset($_SESSION['username'])) {
  		$_SESSION['msg'] = "You must log in first";
  		header('location: login.php');
  	}
  	if (isset($_GET['logout'])) {
  		session_destroy();
  		unset($_SESSION['username']);
  		header("location: login.php");
  	}
	  include("config.php");
	   
	  	$sql = "SELECT * FROM users ORDER BY id "; 
		$result = $db->query($sql); 
		$db->close();
	
?>
<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC “-//W3C//DTD HTML 4.01//EN” “http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
   		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="dashboard.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1" />
  		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<script src="scripts.js"></script>
	</head>
	<body>
		<div id="mySidenav" class="sidenav">
  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  			<a href="#">About</a>
  			<a href="#">Services</a>
  			<a href="#">Clients</a>
  			<a href="admin_dashboard.php?logout='1'">Logout</a>
		</div>
		<div id="fullhome">
		<div class="navbar">
			<nav>
  				<a href="#home">Home</a>
  				<a onclick="setVisibility('table','visible')">Students</a>
  				<a onclick="setVisibility('table','none')">Teachers</a>
			</nav>
		</div>

		<div id="main1">
  			<span class="span" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
  			<a style="float:right"> Welcome! <?php echo $_SESSION['username']; ?> </a>
		</div>
		<p></p>

		
		<div class="data_table" style="float:"> 
               <!-- TABLE CONSTRUCTION--> 
        	<table id="table"> 
				<caption class="un">User details</caption>
				
            	<tr class="submit"> 
                	<th>User ID</th> 
                	<th>User Name</th> 
                	<th>User Email</th> 
                	<th>User Type</th> 
					<th>Action</th>
            	</tr> 
            	<!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            	<?php   // LOOP TILL END OF DATA  
                	while($rows=$result->fetch_assoc()) 
                	{ 
             	?> 
            	<tr class="submit"> 
                <!--FETCHING DATA FROM EACH  ROW OF EVERY COLUMN--> 
                	<td><?php echo $rows['id'];?></td> 
                	<td><?php echo $rows['username'];?></td> 
                	<td><?php echo $rows['email'];?></td> 
                	<td><?php echo $rows['user_type'];?></td> 
					<td><a href="delete_admin.php?id=<?php echo $rows['id']; ?>">Delete</a> 
            	</tr> 
            	<?php 
                }
             	?> 
        	</table> 
		</div>
		
		</div>
		<a class="submit" href="register.php">Add Admin</a>
		
	</body>
</html>