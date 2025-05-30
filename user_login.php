<?php
include 'db.php';
session_start();
if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) 
	{
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) 
		{
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: dashboard.php');  
            exit();
        } else {
            $error = "Invalid Password.";
        }
    } 
	else {
        $error = "No account found with this email.";
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth-container">
    <div class="auth-box">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="post">
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit" name="login">Login</button><br><br>
        </form>
        <a href="register.php">Don't have an account? Register</a>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
