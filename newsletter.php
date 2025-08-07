<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save to a text file
        $file = fopen("subscribers.txt", "a");
        fwrite($file, $email . "\n");
        fclose($file);
        echo "<h2>Thank you for subscribing, $email!</h2>";
    } else {
        echo "<h2>Invalid email address. Please try again.</h2>";
    }
} else {
    echo "<h2>Something went wrong. Please go back and try again.</h2>";
}
?>