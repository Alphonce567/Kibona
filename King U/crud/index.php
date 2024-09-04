<?php
        
    session_start();
    $hostname   = "localhost";
    $dbusername   = "root";
    $dbpassword   = "";
    $dbname     = "student";
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $dbusername, $dbpassword);
    if(!$pdo){
        echo "No Connection to Database!!";
        die;
    }

    $query=$pdo->query("SELECT* FROM STUDENTS");
   // $stmt=$conn->prepare($sql);
    //$stmt->execution();
    $studentsRow=$query->fetchAll(PDO::FETCH_ASSOC);

   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <td>s/n</td>
            <td>Student Name</td>
            <td>Reg.Number</td>
            <td>Program</td>
            <td>Contact</td>
            <td>Action</td>
        </tr>
        
    <?php
    $number =1;
    foreach($studentsRow as $row){
         echo '<tr>';
            echo '<td>';
                echo $number;
            echo '</td>';
            echo '<td>';
                echo $row['studentName'];
            echo '</td>';
            echo '<td>';
                echo $row['reg_number'];
            echo '</td>';
            echo '<td>';
                echo $row['Program'];
            echo '</td>';
            echo '<td>';
                echo $row['Contacts'];
            echo '</td>';
            echo '<td>';
                echo '<a href="edit.php?id='.$row['ID'].'&action=edit">Edit</a> | <a href="edit.php?id='.$row['ID'].'&action=delete">Delete</a>';
            echo '</td>';
        echo '</tr>';
        $number ++;
    }
    ?>
   
    </table>
    <button><a href="add.php" class="a">Add</a></button>
</body>
</html>