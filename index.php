<?php
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("Connection to the database failed due to " . mysqli_connect_error());
    }

    // Select the database (add your database name here)
    mysqli_select_db($con, "user_info");

    echo "Success connecting to the DB";

    // Retrieve form data and sanitize
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    // Construct the SQL query
    $sql = "INSERT INTO `user` (`Name`, `Age`, `Gender`, `Phone`, `Email`, `Desc`, `DD`) 
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$desc', CURRENT_TIMESTAMP)";

    echo $sql;

    // Execute the query
    if ($con->query($sql) == true) {
        echo "<br>Successfully inserted";
    } else {
        echo "ERROR: $sql <br> " . $con->error;
    }

    // Close the connection
    $con->close();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comaprio the new and easy way</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class=bg src="bg.jpeg" alt="hehe">
    <div class="container">
        <h3>welcome to compario the new and easy way</h3>
        <p>enter your purpose and submit the query</p>
        <div class="main"> 
            <marquee class="marq" bgcolor="" 
                     direction="left" loop=""> 
                <div class="geek1"> 
                    COMPARIO
                    
                </div> 
                <div class="geek2"> 
                    THE NEW AND EASY WAY
                </div> 
            </marquee> 
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <br>
            <input type="number" name="age" id="age"placeholder="enter your age">
            <br>
        <!----<input type="" name="gender" id="gender" placeholder="select your -->
            <label for="gender">Choose your gender:</label>

<select name="gender" id="gender">
  <option value="male">male</option>
  <option value="female">female</option>
  <option value="not defined">not defined</option>
  
</select>
           
            <br>
            <input type="number" name="phone" id="phone" placeholder="enter your phone number">
            <br>
            <input type="text" name="email" id="mail" placeholder="enter your email id">
            <br>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter your case of visit"></textarea>
            <br>
            <button class="btn">submit</button>
            
            <button class="btn">reset</button>
              

        </form>
         
    </div>
    <script src="index.js"></script>

    
</body>
</html>