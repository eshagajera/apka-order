<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'apka_order');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Checkout - Apka Order</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
	.btn-checkout {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .empty-cart-message {
            font-size: 20px;
            color: #dc3545;
            font-weight: bold;
            margin-top: 30px;
        }
        .go-to-menu {
            margin-top: 20px;
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
	</style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <h1>Checkout 🛒</h1>
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <form method="POST" action="payment.php" class="checkout-form">
            <ul class="checkout-list">
            <?php foreach ($_SESSION['cart'] as $id => $qty):
                $p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
            ?>
                <li><?php echo htmlspecialchars($p['name']); ?> × <?php echo $qty; ?></li>
            <?php endforeach; ?>
            </ul>
            <button type="submit" name="proceed_payment" class="btn-checkout">Proceed to Payment</button>
        </form>
    <?php else: ?>
        <p>No items in cart.</p>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
