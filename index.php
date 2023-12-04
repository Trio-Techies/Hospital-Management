<?php 

$servername = "sql12.freesqldatabase.com"; 
$username = "sql12667362"; 
$password = "3QR5qSmqGa"; 
$databasename = "sql12667362"; 
$conn = mysqli_connect($servername, $username, $password, $databasename); 
if (!$conn) { 
	die("Connection failed: " . mysqli_connect_error()); 
} 
$query = "SELECT * FROM users"; 
$result = mysqli_query($conn, $query); 
if (mysqli_num_rows($result) > 0) { 
	while($row = mysqli_fetch_assoc($result)) { 
		echo  $row["name"],"<br>";
		echo $row["email"]; 
	} 
} else { 
	echo "0 results"; 
} 

$conn->close(); 

?>
