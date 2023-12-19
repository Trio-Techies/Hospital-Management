<?php
$id = $_GET['id'];

    // Database connection details
$servername = "sql12.freesqldatabase.com";
$username = "sql12667362";
$password = "3QR5qSmqGa";
$dbname = "sql12667362";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname); // Create a new database connection
$sql = "SELECT * FROM users WHERE patient_id = $id"; // SQL query to select 'photo' based on 'id'
$result = mysqli_query($conn, $sql); // Execute the query
$row = mysqli_fetch_assoc($result); // Fetch the result into an associative array
$pic = $row["photo"]; // Get the 'photo' value from the fetched row
$first=$row["first_name"];
$last=$row["last_name"];
$email=$row["email"];
$dob=$row["dob"];
$gender=$row["gender"];
$nationality=$row["nationality"];
$phone=$row["phone_no"];
$address=$row["address"];
$city=$row["city"];
$pin=$row["pin_code"];
$aadhar=$row["aadhar"];
$blood=$row["blood_grp"];
mysqli_close($conn); // Close the database connection
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile - Wellness Web</title>
    <link rel="icon" type="image/png" href="img\logo.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: #5D4157;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #A8CABA, #5D4157);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #A8CABA, #5D4157);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .container2 {
            max-width: 800px;
            margin: 20px auto;
            margin-top: 100px;
            background-color: lightgray;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);

        }

        h1 {
            text-align: center;
            color: #333;
        }

        .profile-img {
            text-align: center;
            margin-bottom: 20px;
        }

        img {
            border-radius: 50%;
            max-width: 150px;
            height: auto;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
            <script>
                function logout(){
                    alert('Logout Successful ! Redirecting To Home Page.');
                    window.location.href='index.html';
                }
                function back(){
                    window.location.href='patient_portal.php?id=<?php echo $id ?>';
                }
            </script>
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/utilities.css" />
    <!-- normalize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="page-wrapper">
        <!-- header -->
        <header class="header">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-content d-flex justify-content-between align-items-center">
                        <div class="brand-and-toggler d-flex align-items-center justify-content-between">
                            <a href="index.html" class="navbar-brand d-flex align-items-center">
                                <img src="img/logo.png" id="headerlogo" style="border: none; box-shadow: none;">
                                <span class="brand-text fw-7">&emsp; Wellness Web</span>
                            </a>
                            <button type="button" class="d-none navbar-show-btn">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        <div class="navbar-box">
                            <button type="button" class="navbar-hide-btn">
                                <i class="fas fa-times"></i>
                            </button>

                            <ul class="navbar-nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-white nav-active text-nowrap">Your Profile</a>
                                </li>
                                <li class = "nav-item">
                                    <button class = "nav-link text-white text-nowrap" id="headerbutton" onclick="back()">Back</button>
                                </li>
                                <li class = "nav-item">
                                    <button class = "nav-link text-white text-nowrap" id="headerbutton" onclick="logout()">Log Out</button>
                                </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </nav>


        </header>
        <!-- end of header -->

        <div class="container2">
            <h1 style="color:red">Your Profile</h1>

            <div class="profile-img"><center>
            <img src="<?php echo $pic;?>" alt="Patient Photo" style="height:200px; width:200px;"></center>
            </div>

            <div class="profile-details">
                <table>
                    <tr>

                        <th>Patient ID</th>
                        <td id="patient-id"><?php echo $id;?></td>
                    </tr>
                    <tr>
                        <th>Firstname</th>
                        <td id="firstname"><?php echo $first;?></td>
                    </tr>
                    <tr>
                        <th>Lastname</th>
                        <td id="lastname"><?php echo $last;?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="email"><?php echo $email;?></td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td id="dob"><?php echo $dob;?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td id="gender"><?php echo $gender;?></td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td id="nationality"><?php echo $nationality;?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td id="phone"><?php echo $phone;?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="address"><?php echo $address;?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td id="city"><?php echo $city;?></td>
                    </tr>
                    <tr>
                        <th>Pin Code</th>
                        <td id="pin-code"><?php echo $pin;?></td>
                    </tr>
                    <tr>
                        <th>Aadhar Number</th>
                        <td id="aadhar"><?php echo $aadhar;?></td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td id="blood-group"><?php echo $blood;?></td>
                    </tr>
                </table>
            </div>
        </div>

            <br><br><br><br><br>


        <div class="hero">
            <div class="form-box">
                <div class="button-box">

                </div>


            </div>
        </div>


        <footer class = "footer" style="margin-top: 0px;">
                <div class = "container">
                    <div class = "footer-content">
                        <div class = "footer-list d-grid text-white">
                            <div class = "footer-item">
                                <a href = "index.html" class = "navbar-brand d-flex align-items-center">
                                    <img src="img/logo.png" id="headerlogo" style="border: none;">
                                    <span class = "brand-text fw-7">&emsp;Wellness Web</span>
                                </a>
                                <p class = "text-white">Wellness Web provides progressive, and affordable healthcare, accessible on mobile and online for everyone.</p>
                                <p class = "text-white copyright-text">&copy; Wellness Web PTY LTD 2023. All rights reserved.</p>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Quick Links</h3>
                                <ul class = "footer-links">
                                    <li><a href = "dashboard.php?id=<?php echo $id ?>#">Home</a></li>
                                    <li><a href = "dashboard.php?id=<?php echo $id ?>#about">About Us</a></li>
                                    <li><a href = "dashboard.php?id=<?php echo $id ?>#contact">Contact Us</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Our Services</h3>
                                <ul class = "footer-links">
                                <li><a href = "patient_portal.php?id=<?php echo $id ?>">Patient Portal</a></li>
                                    <li><a href = "telemedicine.php?id=<?php echo $id ?>">Telemedicine Services</a></li>
                                    <li><a href = "pathology.php?id=<?php echo $id ?>">Pathology And Laboratory</a></li>
                                    <li><a href = "pharmacy.php?id=<?php echo $id ?>">Pharmacy Sevices</a></li>
                                    <li><a href = "emergency.php?id=<?php echo $id ?>">Emergency Contacts</a></li>
                                    <li><a href = "chatbot.php?id=<?php echo $id ?>">AI ChatBot</a></li>
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                </div>

                <div class = "footer-element-1">
                    <img src = "img/images/element-img-4.png" alt = "">
                </div>
                <div class = "footer-element-2">
                    <img src = "img/images/element-img-5.png" alt = "">
                </div>
            </footer>
 
    </div>








    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom js -->
    <script src="assets/js/script.js"></script>
</body>

</html>