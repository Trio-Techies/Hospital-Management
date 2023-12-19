<?php
$id = $_GET['id'];
$pid=$_GET['pid'];

    // Database connection details
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12667362";
    $password = "3QR5qSmqGa";
    $dbname = "sql12667362";

    // Create a connection to MySQL
    $conn = new mysqli($servername, $username, $password, $dbname); // Create a new database connection
    $sql = "SELECT * FROM prescription WHERE prescription_id = $pid"; // SQL query to select 'photo' based on 'id'
    $result = mysqli_query($conn, $sql); // Execute the query
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $doctor=$row['doctor'];
    $date=$row['date'];
    $age=$row['age'];
    $gender=$row['gender'];
    $disease=$row['disease'];
    $medicine=$row['medicine'];
    $description=$row['description'];
    $advice=$row['advice'];
    mysqli_close($conn); // Close the database connection
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Prescriptions - Wellness Web</title>
        <meta name="description" content="">
        <link rel="icon" type="image/png" href="img\logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel = "stylesheet" href = "css/main.css" />
        <link rel = "stylesheet" href = "css/utilities.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script>
            function logout(){
                alert('Logout Successful ! Redirecting To Home Page.');
                window.location.href='index.html';
            }
            function back(){
                window.location.href='prescriptionList.php?id=<?php echo $id;?>';
            }
        </script>
        <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        .container2 {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .hospital-name {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .address {
            text-align: center;
            font-style: italic;
            margin-bottom: 20px;
        }

        .prescription-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        .download-btn, .print-btn {
                display: block;
                margin: 10px auto;
                margin-top:50px;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                text-align: center;
                text-decoration: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        
        <div class="page-wrapper">
            <!-- header -->
            <header class = "header">
                <nav class = "navbar">
                    <div class="container">
                        <div class="navbar-content d-flex justify-content-between align-items-center">
                            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                                <a href = "index.html" class = "navbar-brand d-flex align-items-center">
                                    <img src="img/logo.png" id="headerlogo" style="border: none;">
                                    <span class="brand-text fw-7">&emsp; Wellness Web</span>
                                </a>
                                <button type = "button" class = "d-none navbar-show-btn">
                                    <i class = "fas fa-bars"></i>
                                </button>
                            </div>

                            <div class = "navbar-box">
                                <button type = "button" class = "navbar-hide-btn">
                                    <i class = "fas fa-times"></i>
                                </button>

                                <ul class = "navbar-nav d-flex align-items-center">
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white nav-active text-nowrap">Prescription</a>
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

            <div class="hospital-name">
                Wellness Web
            </div>

            <div class="address">
                VIT Bhopal University, Kothri Kalan, Sehore, MP
            </div>

            <div class="prescription-details">
                <table>
                    <tr>
                        <th>Prescription ID</th>
                        <td id="prescription-id"><?php echo $pid;?></td>
                    </tr>
                    <tr>
                        <th>Patient ID</th>
                        <td id="patient-id"><?php echo $id;?></td>
                    </tr>
                    <tr>
                        <th>Patient's Name</th>
                        <td id="patient-name"><?php echo $name;?></td>
                    </tr>
                    <tr>
                        <th>Doctor's Name</th>
                        <td id="doctor-name"><?php echo $doctor;?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td id="age"><?php echo $age;?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td id="gender"><?php echo $gender;?></td>
                    </tr>
                    <tr>
                        <th>Disease</th>
                        <td id="disease"><?php echo $disease;?></td>
                    </tr>
                    <tr>
                        <th>Medicines</th>
                        <td id="medicines"><?php echo $medicine;?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td id="description"><?php echo $description;?></td>
                    </tr>
                    <tr>
                        <th>Advices</th>
                        <td id="advices"><?php echo $advice;?></td>
                    </tr>
                </table>
                <button id="printBtn" class="print-btn">Print Prescription</button>
            </div>
        </div>
        <script>
                document.getElementById('printBtn').addEventListener('click', () => {
                    // Hide header and footer for printing
                    const header = document.querySelector('.header');
                    const footer = document.querySelector('.footer');
                    header.style.display = 'none';
                    footer.style.display = 'none';
            
                    // Print the content
                    window.print();
            
                    // Show header and footer after printing is done
                    header.style.display = 'block';
                    footer.style.display = 'block';
                });
            </script>

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
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "js/script.js"></script>
    </body>
</html>