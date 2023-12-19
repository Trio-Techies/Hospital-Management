<?php
$id = $_GET['id'];
$servername = "sql12.freesqldatabase.com";
$username = "sql12667362";
$password = "3QR5qSmqGa";
$dbname = "sql12667362";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname); // Create a new database connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $areaOfDisease = $_POST['areaOfDisease'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Fetch doctor's name and fees according to the selected area
    $sql = "SELECT e_id,e_name, fees FROM employees WHERE area = '$areaOfDisease' and mode='Online'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $did=$row['e_id'];
        $doctorName = $row['e_name'];
        $fees = $row['fees'];
    } else {
        echo '<script>alert("No Doctor Found For The Selected Area !");</script>';
    }

    $sql = "SELECT first_name, last_name, email FROM users WHERE patient_id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row['first_name'];
        $email=$row['email'];
        $lastName = $row['last_name'];
        $name = $firstName . ' ' . $lastName;
    } else {
        echo '<script>alert("Unable To Fetch User Data !");</script>';
    }
    // Insert appointment information into the appointments table
    $insertSql = "INSERT INTO `appointments`(`patient_id`, `name`, `disease`, `attender_id`, `attender_name`, `meeting_mode`, `place`, `date`, `time`, `status`, `fees`, `description`) 
    VALUES ($id,'$name','$areaOfDisease',$did,'$doctorName','Online','Link Will Be Added In Some Time','$date','$time','Upcoming',$fees,'$description')";

    if ($conn->query($insertSql) === TRUE) {
        echo '<script>alert("Meet Scheduled Successfully ! Check In Your Appointments And E-Mail.");</script>';
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', 587);
        $subject = "Online Meet Scheduled For Patient ID $id";
        $body = "Dear $firstName,\n\nThis is to confirm that your online doctor meet has been successfully scheduled through Wellness Web. We are pleased to inform you that $doctorName has been appointed for your meet.

The appointment details are as follows:
        
Doctor: $doctorName
Date: $date
Time: $time
Link: Will Be Shared Later On Appointment Portal

Please ensure you are available in the meet on time.

Should you have any queries or need further assistance, feel free to contact us.

Thank you for choosing Wellness Web. We wish you a successful and beneficial consultation with $doctorName.";
        $headers = "From: Wellness Web";
        mail($email, $subject, $body, $headers);
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }
}

$conn->close();
?>  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Telemedicine - Wellness Web</title>
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
                window.location.href='telemedicine.php?id=<?php echo $id;?>';
            }
        </script>
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
                                        <a href = "#" class = "nav-link text-white nav-active text-nowrap">Schedule An Online Meet</a>
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


            
                <section class = "sc-services">
                <div class = "services-shape">
                        <img src = "img/images/curve-shape-1.png" alt = "" style="margin-top:-200px;">
                    </div>
                    
                    <div class="container">
                        <div class = "services-content">
                            <div class="title-box text-center">
                                <div class = "content-wrapper">
                                    <h3 class = "title-box-name" style="margin-top:-50px;">Book Your Appointment</h3>
                                    <div class = "title-separator mx-auto"></div>
                                    
                                </div>
                            </div>
                            <center>
                            <form method="post" class="form" >
                                <label for="areaOfDisease"><b>Area of Disease:</b></label>
                                <select id="areaOfDisease" name="areaOfDisease" onchange="showFees()"> 
                                    <option value="select">Select Area Of Disease</option>
                                    <option value="Cardiology">Cardiology (Heart)</option>
                                    <option value="Dermatology">Dermatology (Skin)</option>
                                    <option value="Endocrinology">Endocrinology (Hormones)</option>
                                    <option value="Gastroenterology">Gastroenterology (Stomach)</option>
                                    <option value="Hematology">Hematology (Blood)</option>
                                    <option value="Neurology">Neurology (Brain)</option>
                                    <option value="Oncology">Oncology (Cancer)</option>
                                    <option value="Orthopedics">Orthopedics (Bones)</option>
                                    <option value="Pediatrics">Pediatrics (Children)</option>
                                    <option value="Pulmonology">Pulmonology (Lungs)</option>
                                    <option value="Rheumatology">Rheumatology (Joints)</option>
                                    <option value="Urology">Urology (Kidney)</option>
                                    <option value="Psychiatry">Psychiatry (Mental Health)</option>
                                    <option value="Ophthalmology">Ophthalmology (Eyes)</option>
                                    <option value="Dentistry">Dentistry (Teeth)</option>
                                </select>

                                <label for="description"><b>Description:</b></label>
                                <textarea id="description" name="description" rows="4" required placeholder="Enter Your Disease Description"></textarea>

                                
                                <label for="date"><b>Date:</b></label>
                                <input type="date" id="date" name="date" required>

                                <label for="time"><b>Time:</b></label>
                                <input type="time" id="time" name="time" required>

                                <p id="feesDisplay"><b></b></p><br>
                                <center><button type="submit">Schedule</button></center>
                            </form>
                            </center>
                        </div>
                    </div>
                </section>

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
        <script>
            function showFees() {
                var areaOfDisease = document.getElementById("areaOfDisease").value;
                var feesDisplay = document.getElementById("feesDisplay");

                // Logic to set fees based on the selected area
                var fees;
                switch (areaOfDisease) {
                    case "select":
                        fees = "Please Select Area"; // Replace with actual fees for Cardiology
                        break;
                    case "Cardiology":
                        fees = "₹ 800"; // Replace with actual fees for Cardiology
                        break;
                    case "Dermatology":
                        fees = "₹ 400"; // Replace with actual fees for Dermatology
                        break;
                    case "Endocrinology":
                        fees = "₹ 700"; // Replace with actual fees for Endocrinology
                        break;
                    case "Gastroenterology":
                        fees = "₹ 500"; // Replace with actual fees for Gastroenterology
                        break;
                    case "Hematology":
                        fees = "₹ 800"; // Replace with actual fees for Hematology
                        break;
                    case "Neurology":
                        fees = "₹ 1000"; // Replace with actual fees for Neurology
                        break;
                    case "Oncology":
                        fees = "₹ 1600"; // Replace with actual fees for Oncology
                        break;
                    case "Orthopedics":
                        fees = "₹ 1000"; // Replace with actual fees for Orthopedics
                        break;
                    case "Pediatrics":
                        fees = "₹ 500"; // Replace with actual fees for Pediatrics
                        break;
                    case "Pulmonology":
                        fees = "₹ 700"; // Replace with actual fees for Pulmonology
                        break;
                    case "Rheumatology":
                        fees = "₹ 800"; // Replace with actual fees for Rheumatology
                        break;
                    case "Urology":
                        fees = "₹ 1000"; // Replace with actual fees for Urology
                        break;
                    case "Psychiatry":
                        fees = "₹ 500"; // Replace with actual fees for Psychiatry
                        break;
                    case "Ophthalmology":
                        fees = "₹ 400"; // Replace with actual fees for Ophthalmology
                        break;
                    case "Dentistry":
                        fees = "₹ 200"; // Replace with actual fees for Dentistry
                        break;
                    default:
                        fees = "Fees Not Specified !";
                        break;
                }

                feesDisplay.textContent = "Consultation Fees: " + fees;
            }
        </script>
    </body>
</html>