<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $service = htmlspecialchars(trim($_POST['service']));
    
    // Basic validation
    if (!empty($name) && !empty($email) && !empty($service)) {
        // Save to a text file (for demo; consider a database for production)
        $data = "Name: $name, Email: $email, Service: $service\n";
        file_put_contents('requests.txt', $data, FILE_APPEND);
        
        // Optionally send an email (requires mail server configuration)
        // mail('care@greenzone.com', 'New Service Request', $data);
        
        // Redirect with success message
        header("Location: index.html?status=success");
    } else {
        // Redirect with error message
        header("Location: index.html?status=error");
    }
} else {
    // Redirect if accessed directly
    header("Location: index.html");
}
?>