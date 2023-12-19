<title>Login - Wellness Web</title>
<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12667362";
$password = "3QR5qSmqGa";
$dbname = "sql12667362";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputEmail = $_POST["email"];
    $inputPassword = $_POST["pass"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM users WHERE email = '$inputEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];
        $id=$row["patient_id"];
        if ($inputPassword === $storedPassword) {
            header("Location: dashboard.php?id=" . urlencode($id));
            exit();
        } else {
            echo "<script>alert('Invalid Password !');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('User Not Found ! Please Register Before Login OR Enter Valid Details.');</script>";
        echo "<script>window.location.href = 'login.html';</script>";
    }
    $conn->close();
}
?>