<!-- Inserts to database -->
<?php
    //print_r($_POST) - doesn't save anything in the database(testing)
    require 'connector.php';

    $id = $_POST['lecturer_id'];
    $firstname = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // SQL query inseerting values directly
    $sql = "INSERT INTO lecturers (lecturer_id, first_name, surname, email, password)
             VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);//Prepares sql statement for execution
    $stmt->bind_param("sssss", $id, $firstname,$surname,$email,$password); //binds values 

    if ($stmt->execute()) { 
        echo "Registration successful! <a href='view_lecturers.php'>View all lecturers</a>";
    } else {
        echo "Error: ".$stmt->error;
    }

    $conn->close();
?>