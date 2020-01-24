<?php


    // PHP Section to initialize the database variables //
    $username = "jaycen";
    $password = "12345";
    $database = "final";
    $server = "localhost";
    // Creates a connection //
    $connection = new mysqli($server, $username, $password, $database);

 // This is the script for creating the data in the database //
 $name = NULL;
 $email = NULL;
 $phoneNumber = NULL;
 $notes = NULL;
 if (isset($_POST['name'])){
     $name = $_POST['name'];
 }
 if (isset($_POST['email'])){
     $email = $_POST['email'];
 }
 if (isset($_POST['phoneNumber'])){
     $phoneNumber = $_POST['phoneNumber'];
 }
 if (isset($_POST['notes'])){
     $notes = $_POST['notes'];
 }
 if($name && $email && $phoneNumber && $notes) {
     $query = $connection->prepare("INSERT INTO contactlist (name, email, phoneNumber, notes) VALUES (?, ?, ?, ?)");
     $query->bind_param('ssss', $name, $email, $phoneNumber, $notes);
     $query->execute();
     $result = $query->get_result();
     
     // Close the connection //
     $connection->close();
     
     // Redirect back to page to refresh //
     header('Location:final.php');
 };
 // Closes the connection
 $connection->close();


?>
