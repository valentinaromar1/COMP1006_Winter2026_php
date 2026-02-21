<?php

//connect to db (which is not working for me)
require 'includes/connect.php'; 

$customerId = $_GET['id']; 


$sql = "DELETE from resume1 
        WHERE resume_id = :resume_id"; 

$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':resume_id', $resumeId);


$stmt->execute(); 


header("Location: resume.php"); 
exit; 