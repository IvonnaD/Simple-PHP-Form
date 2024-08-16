<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receiving and sanitizing the form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    // Validating the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.<br>";
        echo "<a href='form.html'>Go back to the form</a>";
        exit();
    }

    // Validating the name (no numbers allowed)
    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        echo "Name should only contain letters and spaces.<br>";
        echo "<a href='form.html'>Go back to the form</a>";
        exit();
    }

    // Displaying a personalized greeting
    echo "Hello, " . $name . "! Your email (" . $email . ") has been received.";
} else {
    // If not accessed via POST, show a message informing that form should be filled correctly
    echo "This form should be accessed via POST. Please go back and submit the form.<br>";
    echo "<a href='form.html'>Go back to the form.</a>";
}

?>
