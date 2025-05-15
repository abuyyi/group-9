<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "halldb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $hall_name = $_POST['hall_name'];
    $price_per_day = $_POST['price_per_day'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $hall_type = $_POST['hall_type'];
    $phone_number = $_POST['phone_number'];
    // Handle image upload
    $target_dir = "hall_image";
    $image_path = $target_dir . basename($_FILES["image_path"]["name"]);
    move_uploaded_file($_FILES["image_path"]["tmp_name"], $image_path);

    // Insert data into the database
    $sql = "INSERT INTO hall_upload (hall_name, price_per_day, phone_number,location, capacity, hall_type, image_path)
            VALUES ('$hall_name', '$price_per_day','$phone_number', '$location', '$capacity', '$hall_type', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        // Determine which HTML file to update based on hall type
        $php_file = "";

        switch ($hall_type) {
            case "BanquetHall":
                $php_file = "BanquetHall.php";
                break;
            case "ConferenceHall":
                $php_file = "conference_hall.php";
                break;
            case "ConcertHall":
                $php_file = "concert_hall.php";
                break;
            case "WeddingHall":
                $php_file = "wedding_hall.php";
                break;
            default:
                echo "Invalid hall type.";
                exit();
        }

        // Prepare the content to display on the HTML page
        $hall_details = "
            <div class='hall'>
                <h2>$hall_name</h2>
                <p>Location: $location</p>
                <p>Price per day: $price_per_day</p>
                <p>Capacity: $capacity people</p>
                <img src='$image_path' alt='$hall_name'>
            </div>
        ";


        echo "Hall details uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html{
      font-family: "Poppins",sans-serif;
    }
    body{
      background-color: rgb(240, 240, 240);
      margin:0;
      padding:0;
    }
    .wrapper{
      padding:1rem 2rem;
    }
    .active{
      font-weight: bolder;
    }
    .hero{
      height:100vh;
      background-image:url(picha/IMG-20240904-WA0029.jpg);
      padding:5rem 2rem 1rem;
      border-radius:1rem;
    }
    header{
      background-color:white;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
      border-radius:1rem;
      position: fixed;
      top:2rem;
      left: 3rem;
      right:3rem;
      z-index: 100;
    }
    .logo{
      text-decoration: none;
      color:black;
      font-weight:bold;
    }
    header>nav>ul{
      list-style:none;
      display: inline-block;
    }
    header>nav>ul>li{
      margin-left:1rem;
      display: inline-block;
    }
    header>nav>ul>li>a{
      text-decoration: none;
      color: black;
    }
    .logout{
      background-color: black;
      color:white;
      display:flex;
      align-items: center;
      justify-content: center;
      height:2rem;
      width:4rem;
      border-radius:0.5rem;
      margin-left: 5rem;
    }
.reg-container{
  margin-top: 2rem;
  display: flex;
  justify-content: space-between;
  align-items:center;
}
.reg-container h1{
  color: white;
  font-size: 2rem;
}
.reg-btn{
  background-color:rgb(150, 150, 150);
  color: rgb(0, 0, 0);
  padding: 14px 20px;
  border: none;
  border-radius: 1rem;
  cursor: pointer;
  font-weight: bold;
  transition-property:background-color;
  transition-duration: 0.5s;
}
.reg-btn:hover{
  background-color:rgb(170, 170, 170);
  color: rgb(0, 0, 0);
  padding: 14px 20px;
}
.hero-title{
  text-align: center;
  font-size:5rem;
  color: white;
}
footer{
 display: flex;
 flex-direction: row;
 justify-content: space-between;
 align-items: center;
}
.footer-subnavigation ul{
  list-style: none;
}
.footer-subnavigation ul li{
  display: inline-block;
}
.modal {
  display: none;
  position: fixed;
  z-index:200; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.6);
  padding-top: 60px;
}
.hall_reg_form {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  border-radius:1rem;
  width:70%; 
}
.top_container {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
}
.close:hover{
    color: red;
}
.lower_container {
  padding: 16px;
}
.hall_reg_form input{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.hall_reg_form button {
  display: block;
  background-color: #000000b2;
  color:white;
  padding: 14px 20px;
  margin: 8px auto;
  border-radius:0.3rem;
  border: none;
  cursor: pointer;
  width: 50%;
  font-weight: bold;
  transition-property: background-color;
  transition-duration: 0.5s;
}
.hall_reg_form button:hover {
  background-color: rgb(0, 0, 0);
}
.animate {
  animation: animatezoom 0.6s
}  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
  .cancelbtn {
     width: 100%;
  }
}
.cover {
  display: none;
  position: fixed;
  z-index:200; 
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.6);
  padding-top: 60px;
}
.hall_reg_form {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  border-radius:1rem;
  width:70%; 
}
.top_container {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
  cursor: pointer;
}
.close:hover{
    color: red;
}
.lower_container {
  padding: 16px;
}
.hall_reg_form input{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.hall_reg_form button {
  display: block;
  background-color: #000000b2;
  color:white;
  padding: 14px 20px;
  margin: 8px auto;
  border-radius:0.3rem;
  border: none;
  cursor: pointer;
  width: 50%;
  font-weight: bold;
  transition-property: background-color;
  transition-duration: 0.5s;
}
.hall_reg_form button:hover {
  background-color: rgb(0, 0, 0);
}
.animate {
  animation: animatezoom 0.6s
}  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
    <div class="wrapper">
      <section class="hero">
      <header>
        <a href="ManagerDashboard.php" class="logo">KUMBI CONNECT</a>
    <nav>
        <ul>
            <li><a href="ManagerDashboard.php" class="active">Home</a></li>
            <li><a href="BookingRequest.php">Booking requests</a></li>
            <li><a href="receivable.php">Payment History</a></li>
            <li><a href="ManagerLogin.php" class="logout">Log Out</a></li>
        </ul>
    </nav>  
    </header>
<div class="reg-container">
  <h1>Manager Dashboard</h1>
  <a class="reg-btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Register new hall.</a>
</div>
<h1 class="hero-title">Thank You For Choosing Kumbi Connect</h1>
<div id="id01" class="modal">
<form class="hall_reg_form animate" id="hall-upload-form" action="ManagerDashboard.php" method="post" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="top_container">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1>KUMBI CONNECT</h1>
        </div>
        <div class="lower_container">
            <label for="hall_name"><b>Hall name</b></label>
            <input type="text" placeholder="Enter Hall name" name="hall_name" id="hall_name" required>
            <span id="hall_name_error" class="error"></span>
            
            <label for="price"><b>Hall Booking Price per day</b></label>
            <input type="number" placeholder="Enter Booking Price per day" name="price_per_day" id="price" required>
            
            <label for="price"><b>Hall Manager Phone Number</b></label>
            <input type="number" placeholder="Enter Manager Phone Number" name="phone_number" id="phone_number" required>
            
            <label for="location"><b>Hall Location</b></label>
            <input type="text" placeholder="Enter Hall Location" name="location" id="location" required>
            
            <label for="capacity"><b>Capacity of People</b></label>
            <input type="number" placeholder="Enter Hall Capacity" name="capacity" id="capacity" required>
            
            <label for="type"><b>Hall Type</b></label><br>
            <select name="hall_type" id="hall_type" required>
                <option value="none">Select Hall Type</option>
                <option value="BanquetHall">Banquet Hall</option>
                <option value="ConferenceHall">Conference Hall</option>
                <option value="ConcertHall">Concert Hall</option>
                <option value="WeddingHall">Wedding Hall</option>
            </select>
            <span id="hall_type_error" class="error"></span>
            <br>
            
            <label for="image_path"><b>Hall Picture</b></label><br>
            <input type="file" name="image_path" id="image_path required">
            <span id="image_path_error" class="error"></span>
            
            <button type="submit">Upload</button>
        </div>
    </form>
</div>
</section>
<footer>
    <nav class="footer-subnavigation">
   <ul>
     <li>
       <a href="#">Group 5 Software</a>
     </li>
     <li>
       <a href="#"> Help </a>
     </li>
     <li>
       <a href="#"> Licenses </a>
     </li>
   </ul>
 </nav>
 <div class="copyright">
   2024, made with by
   <a href="#">Group 5 Software</a>
 </div>
 <div>
   Distributed by
   <a target="_blank" href="">Group 5 Software</a>.
 </div>
</footer>
</div>
<script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    </script>
</body>
</html>