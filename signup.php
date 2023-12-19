<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Database connection details
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12667362";
    $password = "3QR5qSmqGa";
    $dbname = "sql12667362";

    // Create a connection to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize inputs
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $email = $_POST['Email'];
    $password = $_POST['pass'];
    $dob = $_POST['DOB'];
    $gender = $_POST['Gender'];
    $nationality = $_POST['Nationality'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $pinCode = $_POST['Pin'];
    $aadharNumber = $_POST['Aadhar'];
    $bloodGroup = $_POST['blood'];

    $sql = "SELECT * from users where email = '$email' OR phone_no='$phone' OR aadhar='$aadharNumber'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedemail = $row["email"];
        $storedphone = $row["phone_no"];
        $storedaadhar = $row["aadhar"];
        if ($email === $storedemail) {
            echo "<script>alert('Email Already Registered ! Please Go And Login');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }    
        if ($phone === $storedphone) {
            echo "<script>alert('Phone Number Already Registered ! Please Go And Login');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }    
        if ($aadharNumber === $storedaadhar) {
            echo "<script>alert('Aadhar Number Already Registered ! Please Go And Login');</script>";
            echo "<script>window.location.href = 'login.html';</script>";
        }}    else{

        // File upload handling
    $targetDir = "img/photos/";
    $targetFile = $targetDir . uniqid() . "_" . basename($_FILES["Photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an image and allowed file types
    $check = getimagesize($_FILES["Photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('Invalid Photo !');</script>";
        echo "<script>window.location.href = 'signup.html';</script>";
    $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType!="png" && $imageFileType!="jpeg") {
        echo "<script>alert('Sorry, Only JPG, JPEG And PNG Files Are Allowed !');</script>";
        echo "<script>window.location.href = 'signup.html';</script>";
        $uploadOk = 0;
    }

        if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $targetFile)) {
            $photo = $targetFile; // Store the file path in the database
            $sql = "INSERT INTO users (first_name, last_name, email, password, dob, gender, photo, nationality, phone_no, address, city, pin_code, aadhar, blood_grp)
            VALUES ('$firstname', '$lastname', '$email', '$password', '$dob', '$gender', '$photo', '$nationality', '$phone', '$address', '$city', '$pinCode', '$aadharNumber', '$bloodGroup')";

            if (mysqli_query($conn, $sql) === TRUE) {
                echo "<script>alert('Sign Up Successfull ! Please Go And Login');</script>";
                $sql = "SELECT patient_id from users where email = '$email'";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row["patient_id"];
                }
                ini_set('SMTP', 'smtp.gmail.com');
                ini_set('smtp_port', 587);
                $subject = "Welcome To Wellness Web";
                $body = "Dear $firstname,
                
Welcome aboard to Wellness Web! We're delighted to have you as a part of our community dedicated to holistic healthcare.

Your sign-up has been successfully processed, and we've allotted you a unique Patient ID for your records and future interactions with our services. 

Your Patient ID is: $id

This ID will be your reference for all appointments, consultations, and services availed through Wellness Web. It's important to keep this ID handy for smooth and efficient communication with our team.

As a member of Wellness Web, you now have access to a diverse range of healthcare facilities and resources. Should you have any queries or need guidance regarding the use of our platform or services, our support team is available to assist you at any time.

Thank you for choosing Wellness Web as your healthcare partner. We're committed to supporting you on your wellness journey and providing you with top-notch care.

Warm regards,
Wellness Web Team";
                $headers = "From: Wellness Web";
                mail($email, $subject, $body, $headers);
        
                echo "<script>window.location.href = 'login.html';</script>";
                   } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('An Error Occurred !');</script>";
            echo "<script>window.location.href = 'signup.html';</script>";
            }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="img\logo.png">
    <title>Sign Up - Wellness Web</title>
</head>
<body>  
</body>
</html>
