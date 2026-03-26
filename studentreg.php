
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $firstname = $_POST['FirstName'];
    $Surname = $_POST['Surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Simple password hash
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (id,FirstName, Surname, email, password) 
            VALUES ('$id','$firstname', '$Surname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='View_users.php'>View the Users</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>