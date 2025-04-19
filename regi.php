<?php
    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Attempt to connect to the database
    $con = new mysqli('db', 'root', 'mysecret', 'elearning');

    // Check if the connection was successful
    if ($con->connect_error) {
        die('Connection failed: ' . $con->connect_error);
    } else {
        // Database connection is successful, proceed with the query
        $stmt = $con->prepare("INSERT INTO `registration`(`username`, `Email`, `phone`, `password`) VALUES (?,?,?,?)");
        
        if ($stmt === false) {
            die('Error in SQL query: ' . $con->error);
        }

        $stmt->bind_param("ssis", $username, $Email, $phone, $password);
        $stmt->execute();
        // if ($stmt->execute()) {
        //     echo "Registered successfully";
        // } else {
        //     echo "Error: " . $stmt->error;
        // }
        
        echo '<script>alert("Register successful");
         window.location.href = "index.html";</script>';

        $stmt->close();
        $con->close();
    }
?>
