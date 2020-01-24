<?php
// This is a comment //
# This is also a comment



// This prints a string//
echo("hello");
echo "World";

// Creating a variable
$variable = 10;


//  Printing a variable
echo($variable);



// concat /
$variable = $variable "ten";
$variable .= "ten";
$array = array ("Ttroy", "Tyler", "mii", "Nathan");

echo(""    $array[0]. " " . $array[1] . " "
$array[2] . " " . $array[3]);

// For loop print //

for ($i = 0; $i < sizeof($array); $i++){
echo($array[$i]);

}

// Printing with a while loop //

$i = 0;
while($i < 10;){
    $i++;
}

// Creating a function(){
    echo($array[0]);
}
// Using a function

myFunction($array);

// Get a GET variable //
echo($_GET["userID"]);
echo($_POST["userID"]);

// Setting up MySQL //
$username = "<yourUsername>";
$password = "<yourpassword>";
$database = "<yourDatabase>";
$server = "localhost";

$connection = new mysqli($server, $username, $password, $database)
$query = $connection->prepare("INSERT INTO contactList
(name, phoneNumber) VALUES (?, ?)");

$query->bind_param("ss", 'nathan', '911');
$query->execute();

$query = $connection->prepare("SELECT (name, phoneNumber)
FROM contactlist");

$query->execute();
$result = $query->get_result();
while($row = $result->fetch_assoc()){
    echo($row['name']);
echo($row['phoneNumber']);

}


?>