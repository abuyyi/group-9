<?php
// First, establish a connection to the database using server details
$servername = "localhost"; // Server name (usually localhost if using XAMPP)
$username = "root";  // Database username (root is the default for XAMPP)
$password = "";  // Database password (default is blank if you're not using a password)
$dbname = "halldb";  // The name of your database

// Create a connection to the database using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);
// Check if the connection was successful
if ($conn->connect_error) {  // If there's an error while connecting
    die("Connection failed: " . $conn->connect_error); // Display an error message and stop the script
}
// Check if the form was submitted (using the POST method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data filled in by the user in the form
    $user_name = $_POST['username'];  // Get the username from the form
    $phone_number = $_POST['phone_number'];  // Get the address from the form
    $hall_name = $_POST['hall_name'];
    $event_begin= $_POST['event_begin'];  // Get the phone number from the form
    $event_end= $_POST['event_end']; // Securely store the password using hashing

    // Create an SQL query to insert the data into the customers table
    $sql = "INSERT INTO booking (user_name, phone_number,hall_name,event_begin, event_end)
    VALUES ('$user_name', '$phone_number','$hall_name','$event_begin', '$event_end')";

    // Try to execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo ""; // Message on success (you can redirect to the login page here)
    } else {
        // Display an error if the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection to the database
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Booking System</title>
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
      background-color: black;
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
      text-decoration:none;
      color:black;
    }
    header>nav>ul{
      list-style:none;
      display: inline-block;
    }
    header>nav>ul>li{
      margin-left:0.4rem;
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
      margin-left:2rem;
    }

.page-title{
  text-align: center;
  font-size:7rem;
  margin-bottom: 5px;
  color: white;
  text-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
.hall-wrapper{
  height:80vh;
  width:97%;
  background-color:rgba(158, 155, 128, 0.973);
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  box-shadow:0 4px 5px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
  padding:2rem 1rem;
  margin:2rem auto;
  border-radius: 0.5rem;
  gap: 2rem;
}
.left-col,.right-col{
  width: 50%;
  height: 100%;
}
.left-col{
  display:flex;
  flex-direction: column;
  justify-content:flex-start;
}
.hall-name{
  font-size: 2rem;
  margin:0.2rem 0;
}
.price{
   font-size:1.5rem;
   margin:0.8rem 0;
}
.booking-status{
  background-color: rgb(0, 0, 0);
  color: white;
  height: 2rem;
  width:auto;
  border-radius:1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  margin:0.2rem 0;
}
.hall-description{
text-align:justify;
margin:0.5rem 0;
} 
.right-col{
  height:100%;
   display:flex;
   justify-content: center;
   align-items: center;
  border-radius:.5rem;
}

.right-col img{
  width:100%;
  height:100%;
  border-radius: inherit;
}
input {
  width: 100%;
  padding: 15px 0 15px 5px ;
  margin: 5px auto 22px auto;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input:focus {
  background-color: #ddd;
  outline: none;
}
button {
  display: block;
  background-color: #000000;
  color: white;
  padding: 14px 20px;
  margin: 8px auto;
  border: none;
  cursor: pointer;
  width: 70%;
  opacity:0.8;
}

button:hover {
  opacity: 1;
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.modal {
  display: none; 
  position: fixed; 
  z-index: 200; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.7); 
  padding-top: 60px;
}
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; 
  border: 1px solid #888;
  width: 80%;
  border-radius: 1rem;
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.alert{
  font-size:40px;
  color:white;
  text-align:center;
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
    </style>
  </head>
  <body>
    <div class="wrapper">
        <section class="hero">
      <header>
        <a href="Home.php" class="logo">KUMBI CONNECT</a>
    <nav class="navbar">
    <ul>
          <li>
            <a href="Home.php">Home</a>
          </li> 
          <li class="submenu">
            <a href="WeddingHall.php"  class="active">Wedding halls</a>
          </li>
          <li>
            <a href="ConferenceHall.php">Conference halls</a>
          </li>
          <li>
            <a href="ConcertHall.php">Concert halls</a>
          </li>
          <li>
            <a href="BanquetHall.php">Banquet halls</a>
          </li>
          <li>
            <a href="Results.php">Results</a>
          </li>
          <li>
            <a href="payment method.php">Payment</a>
          </li>
      
          <li>
            <a href="CustomerLogin.php" class="logout">Log Out</a>
          </li>
        </ul>
    </nav>
  </header>
          <h1 class="page-title">Wedding Hall</h1>
          <?php
          $servername = "localhost";
          $username = "root"; // Replace with your MySQL username
          $password = ""; // Replace with your MySQL password
          $dbname = "halldb";
          
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          
          // Retrieve and display images for Conference Hall
          $hall_type = 'WeddingHall';
          ?>
            <?php
        $stmt = $conn->prepare("SELECT * FROM hall_upload WHERE hall_type = ?");
        $stmt->bind_param("s", $hall_type);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            
echo '<div class="hall-wrapper">
  <div class="left-col">
      <h1 class="hall-name">'. htmlspecialchars($row['hall_name']) .'</h1>  
      <p class="price">Tsh <strong>'. htmlspecialchars($row['price_per_day']) .'</strong> per day</p>
      <p class="price">Capacity: <strong>'. htmlspecialchars($row['capacity']) .'</strong> people</p>
      <p class="price">Location: <strong>'. htmlspecialchars($row['location']) .'</strong></p>
      <button class="booking-status" onclick=\'document.getElementById("booking-form").style.display="block"\'>BOOK NOW</button>
     <p class="price">For Feedback And Reviews, Contact Us Through : <strong>'. htmlspecialchars($row['phone_number']) .'</strong></p>
      </div>
  <div class="right-col">
        <img src="' . htmlspecialchars($row['image_path']) .'" alt="'.  '">
  </div>
</div>'; 
                 }
        } else {
            echo "<p class='alert'>No wedding hall uploaded.</p>";
        }
        $stmt->close();
        ?>
    </div>
    
    <?php $conn->close(); ?>



          <div id="booking-form" class="modal">
              <form class="modal-content animate" action="WeddingHall.php" method="post" name="myForm" onsubmit="return validateForm()" enctype="multipart/form-data">
              <div class="imgcontainer">
                <span onclick="document.getElementById('booking-form').style.display='none'" class="close" title="Close Modal">&times;</span>
               <div>
                <h2>Hall Booking Form</h2>
                <p>Please fill in this form to book the hall.</p>
               </div>
      </div>
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <label for="hall_name"><b>Hall Name</b></label>
            <input type="text" placeholder="Enter Hall Name" name="hall_name" id="hall_name" required>


            <label for="phone_number"><b>Phone Number</b></label>
            <input type="tel" placeholder="Enter Phone number eg +255..." name="phone_number" id="phone_number" required>


            <label for="event_begin"><b>Event Starting Date</b></label>
            <input type="date" placeholder="Enter event starting date" name="event_begin" id="event_begin" required>

            <label for="event_end"><b>Event Ending Date</b></label>
            <input type="date" placeholder="Enter event ending date" name="event_end" id="event_end" required>

            <button type="submit">BOOK NOW</button>
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

function validateForm() {
            var username = document.getElementById("username").value;
            var hall_name = document.getElementById("hall_name").value;
            var phone_number = document.getElementById("phone_number").value;
            var eventBegin = document.getElementById("event_begin").value;
            var eventEnd = document.getElementById("event_end").value;

            // Check if username is empty
            if (username.trim() === "") {
                alert("Username must be filled out");
                return false;
            }

            if (hall_name.trim() === "") {
                alert("Hall name must be filled out");
                return false;
            }

            // Check if phone number is in Tanzanian international format
            var phonePattern = /^\+255\d{9}$/;
            if (!phonePattern.test(phone_number)) {
                alert("Phone number must be in a format +255...");
                return false;
            }

            // Check if event beginning date is before event ending date
            if (new Date(eventBegin) > new Date(eventEnd)) {
                alert("Event ending date must be after the starting date");
                return false;
            }

            return true; // Allow form submission if all validations pass
        }
  </script>
  </body>
</html>
