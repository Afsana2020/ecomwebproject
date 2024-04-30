<?php

session_start();
 include('server/connection.php'); 

 if(!isset($_SESSION['logged_in'])){
    header('location: login.php?cartcheckerror=You have to login first to checkout!');
    exit;
 }

 else{
    header('location: checkout.php');
 }