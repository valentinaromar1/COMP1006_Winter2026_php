<?php

//connect to database
require 'includes/connect.php'; 

//gets the id from the 
$resumeId = $_GET['id']; 

//deletes the proper file from the sql
$sql = "DELETE from resume1 
        WHERE resume_id = :resumeId"; 

//prepares the sql
$stmt = $pdo->prepare($sql); 


$stmt->bindParam(':resume_id', $resumeId);

//executes the code 
$stmt->execute();


header("Location: resume.php"); 
exit; 
?>