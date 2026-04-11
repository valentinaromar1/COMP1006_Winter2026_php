<?php

//connect to database
require 'includes/connect.php'; 

$resumeId = $_GET['id']; 

//deletes the proper file from the sql
$sql = "DELETE from resume1 
        WHERE resume_id = :resumeId"; 


$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':resume_id', $resumeId);

//fixed of for final
$stmt->execute();


header("Location: resume.php"); 
exit; 
?>