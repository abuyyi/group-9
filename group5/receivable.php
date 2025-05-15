
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Method</title>
    <link rel="stylesheet" href="payment method.css"> <!-- Link to the CSS file -->
    <!-- Font Awesome for icons -->
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
      padding:5rem 2rem 1rem;
      border-radius:1rem;
      width:70rem;
      height:100vh;
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
      font-weight:bold;
      color:#000;
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
      margin-left:5rem;
    }
    .payment-container{
        margin-top:3rem;
        margin-left:25rem;
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
        <a href="ManagerDashboard.php" class="logo">KUMBI CONNECT</a>
    <nav class="navbar">
        <ul>
          <li>
            <a href="ManagerDashboard.php">Home</a>
          </li> 
          
          <li>
            <a href="BookingRequest.php">Booking requests</a>
          </li>
          <li>
            <a href="receivable.php" class="active">Payment History</a>
          </li>
          <li>
            <a href="ManagerLogin.php" class="logout">Log Out</a>
          </li>
        </ul>
    </nav>
  </header>
<?php
// Start the session to access any notifications or session data

//include 'connection.php'; // Include your database connection script
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

// Fetch payments data from the database
$sql = "SELECT depositor_name, payment_method, amount, payment_date, status FROM payments";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <tr>
                <th>Depositor's Name</th>
                <th>Payment Method</th>
                <th>Receipt Number</th>
                <th>Payment Date</th>
                <th>Status</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . htmlspecialchars($row['depositor_name']) . "</td>
                <td>" . htmlspecialchars($row['payment_method']) . "</td>
                <td>" . htmlspecialchars($row['amount']) . " </td>
                <td>" . htmlspecialchars($row['payment_date']) . "</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No payments found.";
}

mysqli_close($conn);
?>
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

