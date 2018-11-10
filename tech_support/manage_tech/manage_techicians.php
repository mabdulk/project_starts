<?php
    $dataSourceName = 'mysql:host=localhost;dbname=tech_support';
    $username = htmlspecialchars($_GET['user_name']);  
    $password = htmlspecialchars($_GET['password']);
     try {   
         $db = new PDO($dataSourceName, $username, $password);   
     }  
    catch (PDOException $e) 
    {   $error_message = $e->getMessage();   
     echo 'You done muffed up, Mr. Database: ' . $error_message;   
     exit();
    } 

$queryEmployees = "SELECT * FROM technicians ORDER BY lastName";    
$execStatement = $db->prepare($queryEmployees);  
$execStatement->execute();    
$employeeList = $execStatement->fetchAll();  
$execStatement->closeCursor(); 

function testfun()
{
   echo "Your test function on button click is working";
}

if(array_key_exists('test',$_POST)){
   testfun();
}

?> 

<!DOCTYPE html> 
<html lang="en">  
    <head>   
        <title>SportPro Technical support</title>   
        <meta charset="UTF-8">  
    </head>  
    <body>
        <h1>SportsPro Technical Support</h1>
        <p>Sports management software for the sports enthusiast</p>
        <h1>Technician List</h1>
        <table>
            <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
            </tr>
        <?php    
        foreach($employeeList as $emp) 
        { 
            echo '<tr>' . '<th>' . $emp['firstName'] .  '<th>' . $emp['lastName'] . '<th>' . $emp['email']  . '<th>' . $emp['phone']  . '<th>' . $emp['password'] . '<th>' .  '<form method="post">
    <input type="submit" name="test" id="test" value="Delete" /><br/>
</form>'   ;   
        }//end foreach   
        ?> 
        </table>
    </body> 