<?php

session_start();

global $dbh;
global $session_id;
try {
    $dbh = new PDO('mysql:host=mysql.senhafacil.net.br;dbname=senhafacil', 'senhafacil', 'Reimisterio145');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $session_id = $_SESSION['id_usuario'];
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit;
    die();
}

?>