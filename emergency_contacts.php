<?php
$id = $_GET['id'];
$servername = "sql12.freesqldatabase.com";
$username = "sql12667362";
$password = "3QR5qSmqGa";
$dbname = "sql12667362";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname); // Create a new database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedChoice = $_POST['choices']; // Radio button value (Zip or State)
    $zipCode = $_POST['zip']; // Zip Code input value
    $selectedState = $_POST['state']; // Selected State from dropdown
    $selectedDistrict = $_POST['district'];

    if ($selectedChoice=='Zip'){
        $sql = "SELECT * FROM emergency WHERE pincode = '$zipCode'";
    } else {
        $sql = "SELECT * FROM emergency WHERE state = '$selectedState' and district = '$selectedDistrict'";
    }

    $result = $conn->query($sql);

}
$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Emergency Contacts - Wellness Web</title>
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
                window.location.href='emergency.php?id=<?php echo $id;?>';
            }
        </script>
        <style>
            .grid-container-e {
                display: grid;
                margin-left: -90px;
                grid-template-columns: repeat(3, 1fr); /* Two columns */
                gap: 40px; /* Gap between grid items */
            }

            .grid-item-e {
                background-color: white;
                padding: 20px;
                text-align: center;
                box-shadow: 3px 3px 5px 5px lightgray;
                border-radius:5px;
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
                                        <a href = "#" class = "nav-link text-white nav-active text-nowrap">Emergency Contacts</a>
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
                                    <h3 class = "title-box-name" style="margin-top:-50px;">Hospital Emergency Contacts</h3>
                                    <div class = "title-separator mx-auto"></div>
                                    
                                </div>
                            </div>

                            <?php
                                if ($result->num_rows > 0) {?>
                                <div class="grid-container-e">
                            <?php
                                    while($row = $result->fetch_assoc()){
                                        $hid=$row['hospital_id'];
                                        $name=$row['name'];
                                        $address=$row['address'];
                                        $district=$row['district'];
                                        $state=$row['state'];
                                        $pincode=$row['pincode'];
                                        $phone=$row['phone'];
                                        $location=$row['location'];
                                        $iframe=$row['iframe'];?>
                                    <div class="grid-item-e">
                                        <span id="iframe"><?php echo $iframe;?></span>
                                        <h3 style="margin-top:20px;"><?php echo $name;?></h3>
                                        <p><b>Hospital ID : </b><?php echo $hid;?></p>
                                        <p><b>Address : </b><?php echo $address;?>, <?php echo $district;?>, <?php echo $state;?> - <?php echo $pincode;?></p>
                                        <p><b>Contact No. : </b><?php echo $phone;?></p>
                                        <p><b>Location</b><br><a href="<?php echo $location;?>"><u style="color: blue;"><?php echo $location;?></u></a></p><br>
                                    </div>
                            <?php
                                    }?>
                                </div>
                            <?php
                                } else {
                                    echo '<script>alert("Sorry, No Hospitals Found !");</script>';
                                    // PHP code
                                    echo '<script>back();</script>';
                                    
                                }
                            
                            ?>
 
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
<!-- Your HTML code -->

<script>
    function showFees() {
        var areaOfDisease = document.getElementById("areaOfDisease").value;
        var feesDisplay = document.getElementById("feesDisplay");

        // Logic to set fees based on the selected area
        var fees;
        switch (areaOfDisease) {
        <?php 

            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
        ?>
                    case "<?php echo $row['name'];?>":
                        fees = "₹ <?php echo $row['fees'];?>";
                        break;
        <?php
                }
            }
        ?>
            default:
                fees = "Test Not Specified !";
                break;
        }

        feesDisplay.textContent = "Lab Test Fees: " + fees;
    }
</script>

<!-- Rest of your HTML code -->
    </body>
</html>