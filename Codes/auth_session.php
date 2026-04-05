<?php 
    session_start(); 
    if(!isset($_SESSION["username"])) { 
        header("Location: LoginPage.php"); 
        exit(); 
    } 
?>