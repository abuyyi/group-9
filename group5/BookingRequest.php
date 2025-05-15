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
      padding:1rem 4rem;
    }
    .active{
      font-weight: bolder;
    }
    .hero{
      background-color: black;
      padding:7rem 2rem 1rem;
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
      left: 6rem;
      right:6rem;
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
      margin-left:2rem;
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
    .booking-request {
  width:97%;
  height:20vh;
  background-color: rgba(255, 255, 255, 0.6);
  padding:1rem 1rem;
  border-radius: 1rem;
  margin:1rem auto;
}
.modal {
  display: none;
  position: fixed;
  z-index: 100;
  padding-top: 2rem;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.8);
}
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
  border-radius: 1rem;
}
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
  border-radius: 1rem;
}
.mySlides img{
  height:100%;
  width:100%;
}
.cursor {
  cursor: pointer;
}
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
        <a href="managerdashboard.html" class="logo">KUMBI CONNECT</a>
    <nav>
        <ul>
            <li><a href="ManagerDashboard.php">Home</a></li>
            <li><a href="BookingRequest.php"  class="active">Booking requests</a></li>
            <li><a href="receivable.php">Payment History</a></li>
            <li><a href="ManagerLogin.php" class="logout">Log Out</a></li>
        </ul>
    </nav>  
    </header>
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

                $sql = "SELECT booking_id, user_name, phone_number, hall_name, event_begin, event_end FROM booking";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="booking-request">
                        <div class="left-col">
                        <p class="">Booking ID: <b>' . htmlspecialchars($row['booking_id']) . '</b></p>
                            <span class="user-name">Mr/Mrs: <b>' . htmlspecialchars($row['user_name']) . '</b> with phone number <b>' . htmlspecialchars($row['phone_number']) . '</b> has requested to book your hall named <b>' . htmlspecialchars($row['hall_name']) . '</b> from <b>' . htmlspecialchars($row['event_begin']) . '</b> up to <b>' . htmlspecialchars($row['event_end']) . '</b></span>
                        </div>
                        <form class="btns" action="process_booking.php" method="post">
                            <input type="hidden" name="booking_id" value="' . htmlspecialchars($row['booking_id']) . '">
                            <input type="hidden" name="user_name" value="' . htmlspecialchars($row['user_name']) . '">
                            <input type="hidden" name="phone_number" value="' . htmlspecialchars($row['phone_number']) . '">
                            <input type="hidden" name="hall_name" value="' . htmlspecialchars($row['hall_name']) . '">
                            <input type="hidden" name="event_begin" value="' . htmlspecialchars($row['event_begin']) . '">
                            <input type="hidden" name="event_end" value="' . htmlspecialchars($row['event_end']) . '">
                            <button type="submit" name="action" value="accept" class="booking-status">ACCEPT</button>
                            <button type="submit" name="action" value="reject" class="booking-status">REJECT</button>
                        </form>
                        </div>'; 
                    }
                } else {
                    echo "No Booking Request Found";
                }

                $conn->close();
                ?>
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

  
</body>
</html>


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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $action = $_POST['action']; // 'accept' or 'reject'
    $user_name = $_POST['user_name'];
    $phone_number = $_POST['phone_number'];
    $hall_name = $_POST['hall_name'];
    $event_begin = $_POST['event_begin'];
    $event_end = $_POST['event_end'];

    // Update the booking status in the database
    if ($action == 'accept') {
        $sql = "UPDATE booking SET status='Accepted' WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();

        // Notify the customer
        $notification = "Your booking request for $hall_name from $event_begin to $event_end has been accepted.";
        $sql = "UPDATE booking SET notification=? WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $notification, $booking_id);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Booking Accepted Successfully'); window.location.href='BookingRequest.php';</script>";
    } elseif ($action == 'reject') {
        $sql = "UPDATE booking SET status='Rejected' WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();

        // Notify the customer
        $notification = "Your booking request for $hall_name from $event_begin to $event_end has been rejected.";
        $sql = "UPDATE booking SET notification=? WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $notification, $booking_id);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Booking Rejected Successfully'); window.location.href='BookingRequest.php';</script>";
    }
}

$conn->close();
?>