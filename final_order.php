<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'apka_order');
if (!isset($_SESSION['order']) || empty($_SESSION['order'])) 
{
    header('Location: order.php');
    exit();
}
$payment_method = $_POST['payment_method'];
$payment_info = '';
if ($payment_method == 'UPI') 
{
    $payment_info = $_POST['upi_id'];
} elseif ($payment_method == 'Credit Card') 
{
    $payment_info = "Card Name: " . $_POST['card_name'] . ", Card Number: " . $_POST['card_number'];
} elseif ($payment_method == 'Cash') {
    $payment_info = 'Cash Payment';
}
unset($_SESSION['order']);
unset($_SESSION['payment_method']);
unset($_SESSION['payment_info']);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Success</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
	body {
            background: #f0f2f5;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .success-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            text-align: center;
            animation: popIn 0.8s ease-out;
            max-width: 500px;
        }
        .success-container i {
            font-size: 70px;
            color: #48bb78;
            margin-bottom: 20px;
            animation: bounce 1s infinite alternate;
        }
        .success-container h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }
        .success-container p {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
        }
        .success-container a {
            display: inline-block;
            padding: 12px 25px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            transition: 0.3s ease;
        }
        .success-container a:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        @keyframes popIn {
            0% { transform: scale(0.7); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        @keyframes bounce {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }
	</style>
</head>
<body>
<div class="success-container">
    <i class="fas fa-check-circle"></i>
    <h1>Order Placed Successfully!</h1>
    <p>Thank you for ordering with us. 🎉<br>Your payment method: <strong><?= htmlspecialchars($payment_method) ?></strong><br><?= htmlspecialchars($payment_info) ?></p>
    <a href="dashboard.php"><i class="fas fa-home"></i> Go Home</a>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
