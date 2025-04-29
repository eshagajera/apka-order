<?php
session_start();
if (!isset($_SESSION['user_id'])) 
{
    header("Location: user_login.php");
    exit();
}
$conn = new mysqli('localhost', 'root', '', 'apka_order');
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background: #f4f6f9;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
        }

        .main-dashboard {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            min-height: 100vh;
            background-color: #f4f6f9;
            box-sizing: border-box;
        }

        .dashboard-wrapper {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }

        .dashboard-card {
            flex: 1 1 200px;
            max-width: 200px;
            background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            transition: 0.4s;
        }

        .dashboard-card:nth-child(2) {
            background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
        }

        .dashboard-card:nth-child(3) {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .dashboard-card:nth-child(4) {
            background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
        }

        .dashboard-card i {
            font-size: 36px;
            margin-bottom: 8px;
            display: block;
        }

        .dashboard-card h2 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .dashboard-card p {
            font-size: 16px;
            margin: 0;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .dashboard-cards {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-card {
                max-width: 100%;
            }

            .dashboard-wrapper {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="main-dashboard">
        <div class="dashboard-wrapper">
            <h1>Welcome to Your Dashboard</h1>
			<?php
            $products = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc();
            $user_id = $_SESSION['user_id'];
            $reservations = $conn->query("SELECT COUNT(*) as total FROM reservations")->fetch_assoc();
            $support_tickets = 2;
            $loyalty_points = 125;
            ?>
            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <i class="fas fa-box-open"></i>
                    <h2><?php echo $products['total']; ?></h2>
                    <p>Products Available</p>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-calendar-check"></i>
                    <h2><?php echo $reservations['total']; ?></h2>
                    <p>Reservations</p>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-headset"></i>
                    <h2><?php echo $support_tickets; ?></h2>
                    <p>Support Tickets</p>
                </div>

                <div class="dashboard-card">
                    <i class="fas fa-star"></i>
                    <h2><?php echo $loyalty_points; ?></h2>
                    <p>Loyalty Points</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
