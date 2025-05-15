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

    if ($action == 'accept') {
        // Update the booking status in the database
        $sql = "UPDATE booking SET status='Accepted' WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();

        // Notify the user of successful booking
        echo "<script>alert('Booking Accepted Successfully'); window.location.href='BookingRequest.php';</script>";

    } else if ($action == 'reject') {
        // Update the booking status in the database
        $sql = "UPDATE booking SET status='Rejected' WHERE booking_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();

        // Send notification to customer
        $to = "customer@example.com"; // Replace with the customer's email or phone number if using SMS
        $subject = "Booking Request Rejected";
        $message = "Dear $user_name,\n\nYour booking request for the hall named $hall_name from $event_begin to $event_end has been rejected.\n\nBest Regards,\nKUMBI CONNECT";
        $headers = "From: no-reply@example.com"; // Replace with your email

        // Uncomment below line if you want to send email (requires a working mail server setup)
        // mail($to, $subject, $message, $headers);

        echo "<script>alert('Booking Request Rejected Successfully'); window.location.href='BookingRequest.php';</script>";
    }
}

$conn->close();
?>
