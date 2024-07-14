<?php
    include 'admin_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Academy_list_ctg.css">
    <title>Sports Academy Management System</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Sports Academy Management System</h4>
        <ul>
            <li>
                <li><a href="index.php"><i class='bx bxs-home'></i></a></li>
                <li><a href="#"><i class='bx bx-user'></i></a></li>
            </li>
        </ul>
    </header><br>
    <div class="list">
        <h1>Cricket Academy list of Chittagong</h1>
    </div><br><br>
    <div class="box">
        <table>
            <tr>
                <th>Academy Name </th>
                <th>Academy Address </th>
                <th>Academy Phone Number </th>
                <th>Academy Email </th>
                <th>Registration fee</th>
                <th>Monthly fee</th>
                <th>Venue</th>
                <th>Coach</th>
                <th>Admission</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `cricket_academy_list_ctg`";
            $result = mysqli_query($con, $sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
                    <tr>
                        <td><?php echo $row['academy_name']; ?></td>
                        <td><?php echo $row['academy_address']; ?></td>
                        <td><?php echo $row['academy_phone']; ?></td>
                        <td><?php echo $row['academy_email']; ?></td>
                        <td><?php echo $row['registration_fee']; ?></td>
                        <td><?php echo $row['monthly_fee']; ?></td>
                        <td><?php echo $row['venue']; ?></td>
                        <td><?php echo $row['coach']; ?></td>
                        <td><a href="cricket_admission.php">Click here for Admission</a></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>

<!-- INSERT INTO `cricket_academy_list_ctg` (`serial no`, `academy_name`, `academy_address`, `academy_phone`, `academy_email`, `registration_fee`, `monthly_fee`, `venue`, `coach`, `date_of_registration_academy`) VALUES (NULL, 'Chittagong Abahani Limited', 'Chittagong ', '01836594888', 'cal@gmail.com', '3000', '2000', 'Woman complex', 'Mijan Chowdhury ', current_timestamp()); -->
        </table>
    </div><br><br><br>
</body>
<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Us</h3>
            <p>What We Offer <br>
                Our Sports Academy Management System provides a centralized database of sports academies, enabling users to view and compare various options based on location, sport, and other key criteria. Whether you're looking for a cricket academy in Chittagong, a football training center in Dhaka, or a badminton academy in Sylhet, our platform covers it all.</p>
        </div>
        <div class="footer-section contact">
            <h3>Contact Info</h3>
            <p>Email: sportacademy@gmail.com<br>Phone: 01827093405<br>Address: Anowara, Chittagong, Bangladesh</p>
        </div>
        <div class="footer-section social">
            <h3>Follow Us</h3>
            <ul>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024  Sport Academy Management System.com | Designed by [Ahmadullah]
    </div>
</footer>

</html>
