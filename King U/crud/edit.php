<?php
$hostname = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "student";

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die;
}
if( isset($_POST['id']) && isset($_POST['name']) && isset($_POST['reg'])
   && isset($_POST['Program']) && isset($_POST['Contacts'])){

   $id =$_POST['id']; 
   $name = $_POST['name'];
   $reg_number = $_POST['reg'];
   $Program =$_POST['Program'];
   $Contacts = $_POST['Contacts'];

   //$sql = " DELETE FROM students WHERE id= $id";

    $sql = "UPDATE students
    SET studentName = '$name', reg_number = $reg_number , Program = '$Program' , Contacts = '$Contacts'  WHERE id= $id";

    $query = $pdo->query($sql);
    header('Location: index.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
</head>
<body>

<?php
    // Check if form data is posted for updating
    if( isset($_GET['id']) ){
        $id = $_GET['id'];

        if($_GET['action'] == 'delete'){
            $pdo->query("DELETE FROM STUDENTS where id = $id");
            header('Location: index.php');
        }
        if($_GET['action'] == 'edit'){
            $query=$pdo->query("SELECT * FROM STUDENTS where id = $id");
            $studentsRow=$query->fetch(PDO::FETCH_ASSOC);
            //var_dump($studentsRow);die;
?>   
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <table>
                    <tr>
                        <td>
                            <label for="">Name:</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $studentsRow['studentName'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Reg #:</label>
                        </td>
                        <td>
                            <input type="text" name="reg" value="<?php echo $studentsRow['reg_number'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Program:</label>
                        </td>
                         <td>
                            <input type="text" name="Program" value="<?php echo $studentsRow['Program'];?>">
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label for="">Contacts:</label>
                        </td>
                         <td>
                            <input type="text" name="Contacts" value="<?php echo $studentsRow['Contacts'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit">Update</button>
                        </td>
                    </tr>
                </table>
                
            </form>

<?php    
        }
    } 
?>


</body>
</html>


