<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'apka_order');
$reservation_data = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $customer_name = $conn->real_escape_string($_POST['customer_name']);
    $reservation_date = $conn->real_escape_string($_POST['reservation_date']);
    $reservation_time = $conn->real_escape_string($_POST['reservation_time']);
    $guests = (int)$_POST['guests'];
    $sql = "INSERT INTO reservations (customer_name, reservation_date, reservation_time, guests) 
            VALUES ('$customer_name', '$reservation_date', '$reservation_time', '$guests')";
    if ($conn->query($sql) === TRUE) 
	{
        $reservation_data = [
            'customer_name' => $customer_name,
            'reservation_date' => $reservation_date,
            'reservation_time' => $reservation_time,
            'guests' => $guests
        ];
    } else 
	{
        $error_message = "❌ Error: " . $conn->error;
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
	.reservation-container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .reservation-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
        }
        .reservation-container form input,
        .reservation-container form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .reservation-container form button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .ticket {
            background: #f0fdf4;
            border: 2px dashed #28a745;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            animation: pop 0.5s ease;
        }
        .ticket h2 {
            color: #28a745;
            margin-bottom: 10px;
        }
        .ticket p {
            margin: 5px 0;
            font-size: 16px;
        }
        .success-icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 10px;
            animation: bounce 1s infinite;
        }

        @keyframes pop {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
	</style>
</head>
<body>
<div class="container">
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="reservation-container">
        <h1>Reserve Table</h1>
        <?php if (!empty($reservation_data)): ?>
            <div class="ticket">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Reservation Confirmed!</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($reservation_data['customer_name']); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars(date('d M Y', strtotime($reservation_data['reservation_date']))); ?></p>
                <p><strong>Time:</strong> <?php echo htmlspecialchars(date('h:i A', strtotime($reservation_data['reservation_time']))); ?></p>
                <p><strong>Guests:</strong> <?php echo htmlspecialchars($reservation_data['guests']); ?></p>
                <p style="margin-top:10px;">Thank you for booking with us! 🎉</p>
            </div>
        <?php elseif (!empty($error_message)): ?>
            <div class="ticket" style="background: #f8d7da; border-color: #dc3545; color: #721c24;">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <?php if (empty($reservation_data)): ?>
        <form method="POST">
            <input type="text" name="customer_name" placeholder="Your Name" required>
            <input type="date" name="reservation_date" required>
            <input type="time" name="reservation_time" required>
            <input type="number" name="guests" placeholder="Number of Guests" required>
            <button type="submit">Reserve Table</button>
        </form>
        <?php endif; ?>
	</div>
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
