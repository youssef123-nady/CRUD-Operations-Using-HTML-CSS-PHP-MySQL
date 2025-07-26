<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'shop';
    $con = mysqli_connect($host, $user, $pass, $db);

    @$id = $_POST['id'];
    @$name = $_POST['name'];
    @$price = $_POST['price'];
    @$private = $_POST['private'];


?>