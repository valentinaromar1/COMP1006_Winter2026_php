<?php
require "includes/header.php"; 
//accessing the form data 

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comments = $_POST['comments']; 

//what about the products? 




//sending it to the client via email 
//echoing out a confirmation message 




?>

<main>
<h1> Thanks for your Order! </h1>
<h2> Order Summary </h2>

<?php echo "<p>" . $firstName . "</p>"; ?>



</main>
<?php require "includes/footer.php"; ?> 