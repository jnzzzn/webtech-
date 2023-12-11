<?php
    // Your database connection details here
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the data from the form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Encrypt the password
    $password = md5($pass);

    // Run the query to find the user
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    $result = $conn->query($sql);

    // If there is a result, then log them in
    if ($result->num_rows > 0) {
        // Output success message and redirect to dashboard
        echo "<script>alert('Login Successful!');window.location.href='dashboard.php';</script>";
    } else {
        // Output error message
        echo "<script>alert('Login Failed! Please check your username and password.');window.location.href='index.html';</script>";
    }

    $conn->close();
?>