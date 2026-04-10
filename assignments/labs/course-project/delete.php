<?php

//connect to db (which is not working for me)
require 'includes/connect.php'; 

$resumeId = $_GET['id']; 

//deletes the proper file from the sql
$sql = "DELETE from resume1 
        WHERE resume_id = :resumeId"; 

$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':resume_id', $resumeId);


$stmt->execute();


header("Location: resume.php"); 
exit; 
?>