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
    $user = $_POST['username'];  // Get the username from the form
    $email = $_POST['email'];  // Get the email from the form
    $phone = $_POST['phone_number'];  // Get the address from the form
    $address = $_POST['address'];  // Get the phone number from the form
    $password = $_POST['password']; // Securely store the password using hashing

    // Create an SQL query to insert the data into the customers table
    $sql = "INSERT INTO customer (username, email, address, phone_number, password)
    VALUES ('$user', '$email', '$address', '$phone', '$password')";

    // Try to execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!"; // Message on success (you can redirect to the login page here)
        header("Location: Home.php");
    } else {
        // Display an error if the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection to the database
    $conn->close();
}
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
      padding:1rem 4rem;   
    }
    .hero{
      background-image:url(picha/IMG-20240904-WA0029.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      height:130vh;
      border-radius: 1rem;
      padding:1rem 2rem 1rem;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    header{
      background-color:white;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
      border-radius:1rem;
      z-index: 100;
    }
    .logo{
      text-decoration: none;
      color:black;
      font-weight: bold;
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
    .signup{
      background-color: black;
      color:white;
      display:flex;
      align-items: center;
      justify-content: center;
      height:2rem;
      width:4rem;
      border-radius:0.5rem;
      transition-property:color,background-color;
      transition-duration:0.5s;
    }
    .signup:hover{
      background-color:rgba(255, 166, 0, 0.8);
      color:rgb(0, 0, 0);
    }
form {
  padding:1rem;
  background-color: white;
  width:40rem;
  border-radius:0.5rem;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-top:3rem;
}
input,select {
  width: 100%;
  padding: 15px 0 15px 5px ;
  margin: 5px auto 22px auto;
  display:block;
  border: none;
  background: #f1f1f1;
}
input:focus,select:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.registerbtn {
  display: block;
  background-color:black;
  color: white;
  padding: 16px 20px;
  margin: 8px auto;
  border: none;
  cursor: pointer;
  width: 80%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
a {
  color: dodgerblue;
}
.signin {
  background-color: #f1f1f1;
  text-align: center;
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
      <a href="index.html" class="logo">KUMBI CONNECT</a>
      <nav>
        <ul>
          <li>
            <a href="index.html">Log In</a>
          </li> 
          <li>
            <a href="index.html" class="signup">Register</a>
          </li>
        </ul>
      </nav>
    </header>
    <form action="" method="POST" onsubmit="return validateForm()">

<h2>CUSTOMER REGISTRATION FORM</h2>
<p>Please fill in this form to create an account as a customer.</p>
  
<div class="inputbox">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
    <span id="username_error" class="error"></span>
</div>

<div class="inputbox">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <span id="email_error" class="error"></span>
</div>

<div class="inputbox">
    <label for="phone_number">Phone Number</label>
    <input type="tel" name="phone_number" id="phone_number" maxlength="13" required>
    <span id="phone_number_error" class="error"></span>
</div>

<div class="inputbox">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" required>
    <span id="address_error" class="error"></span>
</div>

<div class="inputbox">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <span id="password_error" class="error"></span>
</div>

<button type="submit" class="registerbtn">Register</button>

<div class="register">
    <p>Already have an account? <a href="ManagerLogin.php">Log in</a></p>
</div>
</form>
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
 2024, made with by <a href="#">Group 5 Software</a>
</div>
<div>
 Distributed by
 <a target="_blank" href="">Group 5 Software</a>.
</div>
</footer>
</div>
<script>
    function validateForm() {
      let isValid = true;

      // Clear previous error messages
      document.getElementById('username_error').innerText = '';
      document.getElementById('email_error').innerText = '';
      document.getElementById('phone_number_error').innerText = '';
      document.getElementById('address_error').innerText = '';
      document.getElementById('password_error').innerText = '';

      // Validate username
      const username = document.getElementById('username').value.trim();
      if (username === '') {
          alert("Username is required");
          isValid = false;
      }

      // Validate email
      const email = document.getElementById('email').value.trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
          alert("Invalid email format");
          isValid = false;
      }

      // Validate phone number (Tanzania international format: +255xxxxxxxxx)
      const phoneNumber = document.getElementById('phone_number').value.trim();
      const phonePattern = /^\+255\d{9,12}$/;
      if (!phonePattern.test(phoneNumber)) {
          alert("Invalid phone number format. Use +255xxxxxxxxx");
          isValid = false;
      }

      // Validate address
      const address = document.getElementById('address').value.trim();
      if (address === '') {
     alert("Address is required");
          isValid = false;
      }

      // Validate password (minimum 8 characters)
      const password = document.getElementById('password').value.trim();
      if (password.length < 8) {
          alert("Password must be at least 8 characters long");
          isValid = false;
      }

      return isValid;
  }
  </script>
  </body>
</html>
