<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once "dbc.php";
$db = new Db();
if($db->createTable())
    echo "<h3>Table created.</h3>";
?>