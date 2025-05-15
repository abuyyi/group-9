<?php
//connection of database
$servername = "localhost"; 
$username = "root";  
$password = "";
$dbname = "halldb";

$conn = new mysqli($servername, $username, $password, $dbname);

//to check if connection is sucessfull
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted (using the POST method)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data filled in by the user in the form
    $user = $_POST['username'];  // Get the username from the form
    $email = $_POST['email'];  // Get the email from the form
    $phone = $_POST['phone'];  // Get the phone number from the form
    $address = $_POST['address'];  // Get the address from the form

    // Create an SQL query to check if the provided details match any record in the database
    $sql = "SELECT password FROM manager WHERE username='$user' AND email='$email' AND phone_number='$phone' AND address='$address'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if a matching record was found
    if ($result->num_rows > 0) {
        // Fetch the password from the result
        $row = $result->fetch_assoc();
        $retrieved_password = $row['password'];

        // Display the password as a message
        echo "Your password is: " . $retrieved_password;
    } else {
        // Display an error message if no matching record was found
        echo "No matching records found. Please check your details and try again.";
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
    .active{
      font-weight: bolder;
    }
    .hero{
      background-image:url(picha/IMG-20240904-WA0026.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      height:140vh;
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
  margin-top: 3rem;
}
input,select {
  width: 100%;
  padding: 15px 0 15px 5px ;
  margin: 5px auto 22px auto;
  display: block;
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
.getpswbtn {
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

.getpswbtn:hover {
  opacity: 1;
}
a {
  color: dodgerblue;
}
.register {
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}
.register a{
   text-decoration:none;
}
.register a:nth-child:hover(1){
   text-decoration: underline;
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
            <a href="index.html" class="active">Log In</a>
          </li> 
          <li>
            <a href="index.html" class="signup">Register</a>
          </li>
        </ul>
      </nav>
    </header>
<form action="">
    <h1>FORGET PASSWORD FORM</h1>
    <p>Please fill in this form to correctly to get your password.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" >
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" >
    <label for="phone_number"><b>Phone Number</b></label>
    <input type="tel" id="phone_number" maxlength="10" name="phone_number" placeholder="Enter Phone Number"required>
    <hr>
    <button type="submit" class="getpswbtn">Submit</button>
    <div class="container signin">
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
