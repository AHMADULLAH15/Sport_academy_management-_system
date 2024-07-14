<?php
    require('admin_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="football_academy_list_ctg.css">
    <title>Football Academy list Chittagong</title>
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
                <li><a href="#"><i class='bx bxs-home' ></i></a></li>
                <li><a href="#"><i class='bx bx-user'></i></a></li>
            </li>
        </ul>
    </header><br>
    <div class="list">
        <h1>Football Academy list of Chittagong</h1>
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
                <th>venue</th>
                <th>coach</th>
                <th>Admission</th>
            </tr>
            <?php
                $sql = "SELECT * from `football_academy_list_ctg`";
                $result = mysqli_query($con,$sql);
                if($result->num_rows>0){
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
                    <td><?php echo  $row['coach']; ?></td>
                    <td><a href="football_admission.php">Click here for admission</a></td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
            <!-- <tr>
                <td>Chittagong Abahani Limited</td>
                <td>Chittagong</td>
                <td>018*******</td>
                <td>Cal@gmail.com</td>
                <td>5000</td>
                <td>2000</td>
                <td>Women complex</td>
                <td>Mijan chowdury</td>
                <td><a href="football_admission.html">Click here to Admission</a></td>
            </tr>
            <tr>
                <td>Faruk Football Academy</td>
                <td>Chittagong</td>
                <td>018********</td>
                <td>Ffa@gmail.com</td>
                <td>8000</td>
                <td>2200</td>
                <td>Bakulia</td>
                <td>Ismail Alam</td>
                <td><a href="football_admission.html">Click here to Admission</a></td>
            </tr>
            <tr>
                <td>Chandanish cricket Academy </td>
                <td>Chittagong</td>
                <td>018********</td>
                <td>Cca@gmail.com</td>
                <td>2000</td>
                <td>500</td>
                <td>Gacbaria govt College</td>
                <td>Adil Kabir</td>
                <td><a href="football_admission.html">Click here to Admission</a></td>
            </tr>
            <tr>
                <td>Chandanish Football  Academy</td>
                <td>Chittagong</td>
                <td>018********</td>
                <td>Cfa@gmail.com</td>
                <td>8000</td>
                <td>4000</td>
                <td>Women Complex</td>
                <td>Kabir hossain</td>
                <td><a href="football_admission.html">Click here to Admission</a></td>
            </tr>
            <tr>
                <td>Anowara football Academy  </td>
                <td>Chittagong</td>
                <td>018********</td>
                <td>Afa@gmail.com</td>
                <td>3000</td>
                <td>1000</td>
                <td>Anowara</td>
                <td>Mayhap</td>
                <td><a href="football_admission.html">Click here to Admission</a></td>
            </tr> -->
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