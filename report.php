<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'apka_order');
$_SESSION['username'] = 'test_user';
$username = $_SESSION['username'] ?? '';
$feedback_submitted = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_feedback'])) 
{
    $user_name = $conn->real_escape_string($username);
    $type = $conn->real_escape_string($_POST['type'] ?? '');
    $message = $conn->real_escape_string($_POST['message'] ?? '');
    $rating = intval($_POST['rating'] ?? 0);
    if (!empty($type) && !empty($message) && $rating > 0) 
	{
        $conn->query("INSERT INTO feedback (user_name, type, message, rating, created_at) VALUES ('$user_name', '$type', '$message', $rating, NOW())");
        $feedback_submitted = true;
    }
}
$feedbacks = $conn->query("SELECT * FROM feedback WHERE user_name = '$username' ORDER BY created_at DESC");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Feedback - Apka Order</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .main-wrapper {
            margin-left: 260px;
            padding: 30px;
            display: flex;
            justify-content: center;
        }

        .content-wrapper {
            max-width: 700px;
            width: 100%;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 25px;
        }

        .feedback-form, .thank-you-message, .feedback-list {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }

        select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .star-rating {
            direction: rtl;
            display: flex;
            gap: 5px;
            margin-top: 5px;
            font-size: 24px;
        }

        .star-rating input { display: none; }
        .star-rating label {
            color: #ccc;
            cursor: pointer;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }

        button {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .thank-you-message {
         text-align: center; /* Center everything inside */
         }
 
         .thank-you-message h2 {
          color: #00796b;
          margin-bottom: 10px;
         }

        .feedback-item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .feedback-item:last-child {
            border: none;
        }

        .stars {
            color: #ffc107;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .main-wrapper {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main-wrapper">
    <div class="content-wrapper">
        <h1><i class="fas fa-comment-dots"></i> Submit Feedback or Complaint</h1>
        <?php if ($feedback_submitted): ?>
            <div class="thank-you-message">
                <h2><i class="fas fa-check-circle"></i> Thank you for your feedback!</h2>
                <p>We really appreciate your input.😊</p>
            </div>
        <?php else: ?>
            <form method="POST" class="feedback-form">
                <label>Type:</label>
                <select name="type" required>
                    <option value="">-- Select --</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Complaint">Complaint</option>
                </select>

                <label>Message:</label>
                <textarea name="message" rows="5" required placeholder="Write your message..."></textarea>

                <label>Rating:</label>
                <div class="star-rating">
                    <input type="radio" name="rating" id="star5" value="5"><label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star4" value="4"><label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star3" value="3"><label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star2" value="2"><label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" name="rating" id="star1" value="1"><label for="star1"><i class="fas fa-star"></i></label>
                </div>

                <button type="submit" name="submit_feedback"><i class="fas fa-paper-plane"></i> Submit</button>
            </form>
        <?php endif; ?>

        <?php if ($feedbacks && $feedbacks->num_rows > 0): ?>
            <div class="feedback-list">
                <h3>📋 Your Previous Feedback</h3>
                <?php while ($row = $feedbacks->fetch_assoc()): ?>
                    <div class="feedback-item">
                        <strong><?= htmlspecialchars($row['type']) ?></strong>
                        <span class="stars"><?= str_repeat("★", $row['rating']) ?></span>
                        <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>
                        <small><i class="fas fa-clock"></i> <?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?></small>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
