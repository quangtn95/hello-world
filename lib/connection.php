<?php

try{
    $conn = new PDO('mysql:host=localhost; dbname=web_project; charset=utf8','root','');
}catch (PDOException $e) {
    throw new Exception('No connect to database!');
}