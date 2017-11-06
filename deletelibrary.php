<?php
    include 'dbc.php';
    $name = 0;
     
    if ( !empty($_GET['name'])) {
        $name = $_REQUEST['name'];
    }
     
    echo $name;
        
	deleteLibraryName($name);
    header("Location: library.php");
         

?>