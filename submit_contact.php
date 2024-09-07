<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Server-side validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Sanitize inputs
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $subject = htmlspecialchars($subject);
    $message = htmlspecialchars($message);

    // You can save the data to a database, send an email, etc.
    // For now, let's just display a success message.

    echo "<script>
        document.getElementById('confirmationMessage').innerText = 'Thank you for your inquiry!';
        </script>";
} else {
    echo "Invalid request method!";
}
?>
