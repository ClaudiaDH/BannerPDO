<!--
$host = 'mysql:host=localhost;dbname=escola;port=3307';
$user = 'root';
$pass = '';

$db = new PDO($host, $user, $pass);
-->


<?php
function conectarBanco(){

    $host = 'mysql:host=localhost;dbname=escola;port=3307';
    $user = 'root';
    $pass = '';

    return $db = new PDO($host, $user, $pass);

}?>