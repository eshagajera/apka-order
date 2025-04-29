<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome - Apka Order 🍽️</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-n8ZQAvA+..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      overflow: hidden;
      color: #fff;
    }

    /* Animated background carousel */
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: -2;
      background-size: cover;
      background-position: center;
      animation: bgCarousel 24s infinite ease-in-out;
    }

    @keyframes bgCarousel {
      0%, 25% {
        background-image: url('uploads/bg1.jpg');
      }
      26%, 50% {
        background-image: url('uploads/bg2.jpg');
      }
      51%, 75% {
        background-image: url('uploads/bg3.jpg');
      }
      76%, 100% {
        background-image: url('uploads/bg4.jpg');
      }
    }

    /* Overlay */
    body::after {
      content: '';
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }

    .header {
      width: 100%;
      padding: 20px 40px;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
    }

    .logo {
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: bold;
    }

    .logo img {
      width: 40px;
      height: 40px;
      margin-right: 10px;
      border-radius: 50%;
      animation: rotateLogo 6s linear infinite;
    }

    @keyframes rotateLogo {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .contact-info {
      font-size: 14px;
      text-align: right;
      line-height: 1.5;
    }

    .contact-info i {
      color: #ff4d4d;
      margin-right: 6px;
    }

    .welcome-container {
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding-top: 80px;
      animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .welcome-container h1 {
      font-size: 50px;
      margin-bottom: 10px;
    }

    .welcome-container p {
      font-size: 20px;
      margin-bottom: 30px;
    }

    .btn-group {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .btn-group a {
      text-decoration: none;
      background: #ff4d4d;
      color: white;
      padding: 14px 28px;
      border-radius: 50px;
      font-weight: bold;
      transition: 0.3s ease;
    }

    .btn-group a:hover {
      background: #ff1a1a;
      box-shadow: 0 0 15px rgba(255, 77, 77, 0.6);
      transform: scale(1.05);
    }

    .location-info {
      font-size: 16px;
      margin-top: 10px;
    }

    .location-info i {
      color: #ff4d4d;
    }

    /* Footer */
    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      text-align: center;
      color: #ddd;
      padding: 12px 10px;
      font-size: 14px;
    }

    .social-icons {
      margin-top: 8px;
    }

    .social-icons a {
      color: #ccc;
      margin: 0 10px;
      font-size: 18px;
      transition: 0.3s;
    }

    .social-icons a:hover {
      color: #ff4d4d;
    }

    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .welcome-container h1 {
        font-size: 36px;
      }

      .btn-group {
        flex-direction: column;
        gap: 15px;
      }
    }
  </style>
</head>
<body>
<div class="header">
  <div class="logo">
    <img src="uploads/logo.png" alt="Apka Order Logo">
    Apka Order
  </div>
  <div class="contact-info">
    <div><i class="fas fa-location-dot"></i> Gujarat, India</div>
    <div><i class="fas fa-phone"></i> +91-9876543210</div>
    <div><i class="fas fa-envelope"></i> support@apkaorder.com</div>
  </div>
</div>
<div class="welcome-container">
  <h1>Welcome to Apka Order</h1>
  <p>Your favorite meals, delivered hot and fresh to your doorstep!</p>
  <div class="btn-group">
    <a href="register.php">Register</a>
    <a href="user_login.php">Login</a>
  </div>
  <div class="location-info">
    <i class="fas fa-map-marker-alt"></i> Now serving in : <strong>Ahmedabad</strong>, <strong>Rajkot</strong>, <strong>Banaskantha</strong>, <strong>Junagadh</strong> 
  </div>
</div>
<footer>
  <div>© 2025 Apka Order. All Rights Reserved.</div>
  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
    <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
  </div>
</footer>
</body>
</html>
