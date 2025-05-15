<?php
// Start the session to manage user selection
session_start();
?>

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
      padding:1rem 2rem;
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
      left: 3rem;
      right:3rem;
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
    .payment-container{
        margin-top:3rem;
        margin-left:25rem;
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
            <a href="WeddingHall.php">Wedding halls</a>
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
            <a href="payment method.php"  class="active">Payment</a>
          </li>
          <li>
            <a href="CustomerLogin.php" class="logout">Log Out</a>
          </li>
        </ul>
    </nav>
  </header>
    <div class="payment-container">
        <h2>Choose Your Payment Method</h2>
        <form action="process_payment.php" method="POST" id="paymentForm">
            <div class="payment-methods">
                <!-- Credit/Debit Card Option -->
                <div class="payment-option" data-method="card" onclick="selectPayment('Credit/Debit Card')">
                    <i class="fas fa-credit-card"></i>
                    <span>Credit/Debit Card</span>
                </div>
                <!-- PayPal Option -->
                <div class="payment-option" data-method="paypal" onclick="selectPayment('PayPal')">
                    <i class="fab fa-paypal"></i>
                    <span>PayPal</span>
                </div>
                <!-- Bank Transfer Option -->
                <div class="payment-option" data-method="bank" onclick="selectPayment('Bank Transfer')">
                    <i class="fas fa-university"></i>
                    <span>Bank Transfer</span>
                </div>
                
            </div>
            <input type="hidden" name="selected_method" id="selectedMethod">
            <div class="selected-method">
                <h3>Selected Method:</h3>
                <p id="selectedPayment">None</p>
            </div>
            <div class="amount-input" id="amountInput" style="display: none;">
                <label for="amount">Pay through this account number : 15345554568900</label><br>
                 <label for="amount">Enter Receipt Number:</label><br>
                <input type="text" name="amount" id="amount"  placeholder="Enter Receipt Number" required><br>
                <label for="depositor_name">Depositor's Name:</label><br>
                <input type="text" name="depositor_name" id="depositor_name" placeholder="Enter Depositor's Name" required>
            
            </div>
            
            <button type="submit" class="confirm-button">Confirm Payment Method</button>
        </form>
    </div>
</section>
</div>
    <script>
        // Function to handle payment selection
        function selectPayment(method) {
            document.getElementById('selectedMethod').value = method;
            document.getElementById('selectedPayment').innerText = method;
            // Display amount input field when a payment method is selected
            document.getElementById('amountInput').style.display = 'block';

        }
    </script>
</body>
</html>
