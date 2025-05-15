<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "halldb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kukagua kama muunganiko umekuwa wa mafanikio
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kukagua kama fomu imewasilishwa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kupokea jina la mtumiaji na neno la siri kutoka kwenye fomu
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Kuangalia kama jina la mtumiaji lipo kwenye database
    $sql = "SELECT * FROM customer WHERE username='$user'";
    $result = $conn->query($sql);

    // Ikiwa jina la mtumiaji lipo kwenye database
    if ($result->num_rows > 0) {
        // Pata rekodi ya mtumiaji
        $row = $result->fetch_assoc();
        
        // Linganisha neno la siri la mtumiaji na lile lililopo kwenye database
        if ($row['password'] === $pass) {
            // Ikiwa neno la siri ni sahihi, mpeleke kwenye ukurasa wa kukaribisha
            header("Location: Home.php");
            exit();
        } else {
            // Ikiwa neno la siri sio sahihi, toa ujumbe wa kosa
            echo "Invalid username or Password.";
        }
    } else {
        // Ikiwa jina la mtumiaji halipo kwenye database, mpeleke kwenye ukurasa wa kusajili
        
        header("Location:CustomerLogin.php"); 
     echo ("You have entered wrong password.");
     exit();
    }

    // Funga muunganiko wa database
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
      height:100vh;
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
<form action="CustomerLogin.php" name="myForm" onsubmit="return validateForm()" method="post">
    <h1>CUSTOMER LOGIN FORM</h1>
    <p>Please fill in this form to login as customer.</p>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" id="password" name="password" placeholder="Enter Password" required>
    <hr>
    <button type="submit" class="registerbtn">Log In</button>
    <div class="container signin">
      <p>Don't have an account? <a href="CustomerRegistration.php">Register</a>.</p>
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

</body>
</html>
