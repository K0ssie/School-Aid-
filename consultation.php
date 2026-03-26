<!-- Retrieves user data -->
<?php
    require 'dbconnector.php';

    $sql = 'SELECT * FROM admin';
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registered Admins</title>
        <style>
            body{
                background: linear-gradient(to right, #e0f7fa, #f0f0f0);
                margin: 0;
                padding: 20px;
            }

            h2{
                text-align: center;
                color: #006064;
            }

            table{
                width: 90%;
                margin: auto;
                border-collapse: collapse;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            th{
                background-color: #00838f;
                color: white;
                padding: 12px;
            }

            td{
                padding: 10px;
                border-bottom: 1px solid #ddd;
                text-align: center;
            }

            tr:nth-child(even){
                background-color: #f2f2f2;
            }

            tr:hover{
                background-color: #e0f7fa;
            }
        </style>
    </head>

    <body>
        <h2>Registered Admins</h2>
        <table>
            <tr>
                
                <th>Admin ID</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created at</th>
            </tr>

            <?php
                // Loop for displaying data - loop through each row
                 while ($row = $result->fetch_assoc()) { // converts each row to associative array
                    echo "<tr>";
                    foreach($row as $value){
                        echo "<td>".htmlspecialchars($value). "</td>"; //safely displays data 
                    }
                    echo "</tr>";
                 }
            ?>
        </table>
    </body>
</html>

<?php
    $conn->close();
?>

