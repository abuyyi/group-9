<?php
// Start the session to access user details
session_start();
//include 'connection.php'; // Include your database connection script

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
// Fetch the user ID from the session
$user_id = $_SESSION['user_id']; // Assuming the user is logged in and ID is stored in the session

// Fetch the selected payment method and amount from the form
$selected_method = $_POST['selected_method']; // Selected payment method
$amount = $_POST['amount']; // Amount entered by the user
$payment_date = date('Y-m-d H:i:s'); // Current date and time
$depositor_name = $_POST['depositor_name']; 
// Check if the payment method and amount are valid
if (empty($selected_method) || empty($amount) || $amount <= 0) {
    echo "Please select a payment method and enter a valid amount.";
    exit();
}

// Insert payment details into the database
$sql = "INSERT INTO payments (user_id, depositor_name,payment_method, amount, payment_date, status, notification_sent) 
        VALUES ('$user_id','$depositor_name', '$selected_method', '$amount', '$payment_date', 'Completed', TRUE)";

if (mysqli_query($conn, $sql)) {
    // Set a session variable or notification mechanism to show that payment is successful
    $_SESSION['payment_notification'] = "Payment of $$amount using $selected_method was successful on $payment_date.";
    
    // Redirect to the accounts receivable or dashboard page showing success message
    header("Location: Home.php");
    exit();
} else {
    echo "Error processing payment: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
