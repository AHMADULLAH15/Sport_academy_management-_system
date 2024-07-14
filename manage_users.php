<?php

    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("Location: admin_login.php");
    }
?>
<?php
    require('admin_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body {
    font-family: Arial, sans-serif;
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    margin: 0;
}
header {
    background-color: black;
    color: white;
    text-align: center;
    font-size: 24px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
}
header .logo {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}
header ul {
    display: flex;
    list-style: none;
}
header ul li {
    margin-left: 20px;
}
header ul li a {
    color: white;
    font-size: 24px;
}

footer {
    background-color: black;
    color: white;
    padding: 50px 0;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.footer-section {
    flex: 1;
    min-width: 250px;
    margin-bottom: 20px;
}

.footer-section h3 {
    margin-bottom: 15px;
}

.footer-section ul {
    padding: 0;
    list-style: none;
}

.footer-section ul li {
    display: inline-block;
    margin-right: 10px;
}

.footer-section ul li a {
    color: white;
    font-size: 24px;
}
.footer-bottom {
    text-align: center;
    padding-top: 20px;
    background-color: #333;
    color: white;
    margin-bottom: -80px;
}
table,th,td,tr
{
    margin: auto;
    font-size: 35px;
    text-align: center;
    border: 1px solid black;
    border-collapse: collapse;
    width: 80%;
    height: 90px;
    text-align: center;
}
table li 
{
    display: inline;
    text-decoration: none;
}
table a
{
    text-decoration: none;
}
table tr:hover
{
    background-color: skyblue;
}
.btn 
{
    display: inline-block;
    font-size: 16px;
    /* padding: 10px 20px; */
    padding: 3px;
    margin: 5px;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    }

    /* Edit button styling */
    .btn-edit {
        background-color: #007bff;
        color: white;
    }
    .btn-edit:hover {
        background-color: #0056b3;
    }
    /* Delete button styling */
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
    .btn-delete:hover {
        background-color: #c82333;
}
    </style>
    <script>
        function confirmDelete(email) {
            if (confirm("Are you sure? you want to delete this user?")) {
                window.location.href = 'delete_user.php?email=' + email;
            }
        }
    </script>
</head>
<body>
<header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Manage users</h4>
        <ul>
            <li><a href="admin.php"><i class='bx bxs-home' style="font-size: 25px;"></i></a></li>
            <li><a href="admin_login.php"><i class='bx bx-user' style="font-size: 25px;"></i></i></a></li>
            <li><a href="add_user.php"><i class='bx bx-user-plus' style="font-size: 29px;"></i></a></li>
            <!-- <li><a href="add_user.php" class="btn btn-edit" id = "add">Add New User</a></li> -->
        </ul>
    </header>
    <br><br><br><br>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
            $sql = "SELECT * FROM `users_registrations`";
            $result = mysqli_query($con, $sql);
            if($result-> num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <!-- <td><button class="btn btn-edit">Edit</button>
                        <a href='delete_user.php?email = $row[email]'><button class="btn btn-delete">Delete</button></a></td> -->
                        <td>
                        <button class="btn btn-edit" onclick="window.location.href='edit_user.php?email=<?php echo $row['email']; ?>'">Edit</button>
                        <button class="btn btn-delete" onclick="confirmDelete('<?php echo $row['email']; ?>')">Delete</button>
                        </td>

                        <!-- <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a> -->
                    </tr>
                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
        ?>
    </table>
</body><br><br><br><br><br>
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