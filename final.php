<html>



<head>
    <!-- Imports for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Personal Imports -->
    <link rel="stylesheet" type="text/css" href="final.css">


    <title>:)</title>
</head>

<body><?php


// PHP Section to initialize the database variables //
$username = "j";
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
 
 
 
 // Redirect back to page to refresh //S
// header('Location:final.php');
};




?>

    <div class="container">
        <div class="row mx-auto justify-content-center text-center">
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="col-sm form-group">
                    <H1>Contact Info</H1>
                </div>
                <form method="post" action="final.php">
                    <div class="col-sm form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-sm form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-sm form-group">
                        <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
                    </div>
                    <div class="col-sm form-group">
                        <input type="text" class="form-control" name="notes" placeholder="Notes">
                    </div>
                    <div class="col-sm form-group">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <h2>Contacts</h2>
                <table class="table table-responsive table-dark table-striped">
                    <thread>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Note</th>
                        </tr>
                        <?php

    
    
    
    $query = $connection->prepare("SELECT name, email, phoneNumber, notes FROM contactlist");
                    
                        // Execute the statement //
                    
                        $query->execute();
                    
                        // get the result //
                    
                        $result = $query->get_result();
    while ($row = $result->fetch_assoc()) {
        echo("<tr><th scope='row'>" . $row['name'] . "</th>");
        echo("<th>" . $row['email'] . "</th>");
        echo("<th>" . $row['phoneNumber'] . "</th>");
        echo("<th>" . $row['notes'] . "</th></tr>");
    }
    // Close the connection //
    $connection->close();



    

                        ?>
                    </thread>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php




?>