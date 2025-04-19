<?php
    $username = $_POST['username'];
    $password = $_POST['password'];


    $conn = mysqli_connect('db', 'root', 'mysecret', 'elearning');
    if($conn->connect_error)
    {
        die("Failed to connect  :  ".$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("select * from registration where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password)
            {
                echo '<script>alert("Login Successfully!"); 
                window.location.href = "index.html";</script>';
            }
            else{
                echo '<script>alert(" Invalid password or Username!"); 
                window.location.href = "login.html";</script>';
            }
        }else{
            echo '<script>alert(" Invalid password or Username!"); 
                window.location.href = "login.html";</script>';
        }
    }
?>