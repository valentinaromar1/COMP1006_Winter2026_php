<?php
require "include/header.php";

echo("hello");

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$items = $_POST['items'];
$phoneNum = $_POST['phone'];

?>
//access the form data and echo it in a comformation page
<main>
    <?php echo "<h2> thanks for your order ". $firstName . $last_name . " <h2>" ?> 
    
    <h3> items ordered</h3>

    <ul>
    <?php foreach($items as $item => $quantity): ?>
        <li><?php $item ?> - <?php $quantity ?> </li>
    <?php endforeach;?>

    <?php  
    if (filter_var($phone, FILTER_SANITIZE_INT)) {
    echo "phone number '$phoneNum' is considered valid.\n";
    }
    if (filter_var($email_b, FILTER_SANITIZE_INT)) {
    echo "phone number '$phoneNum' is considered valid.\n";
    } 
    else {
    echo "phone number '$phoneNum' is considered invalid.\n";
    }
    ?>
    
    </ul>
</main>

<?php require "includes/footer.php";?>