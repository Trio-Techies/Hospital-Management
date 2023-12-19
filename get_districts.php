<?php
// get_districts.php
echo "<option value='select'>Select District</option>";

$servername = "sql12.freesqldatabase.com";
$username = "sql12667362";
$password = "3QR5qSmqGa";
$dbname = "sql12667362";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname); // Create a new database connection

if (isset($_GET['state'])) {
    $state = $_GET['state'];

    // Query database to fetch districts based on the selected state
    $sql2 = "SELECT distinct district FROM emergency WHERE state='$state'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            echo "<option value='" . $row['district'] . "'>" . $row['district'] . "</option>";
        }
    }
}
?>
