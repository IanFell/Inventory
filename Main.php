<?php

/*
*    Output into XML, JSON, and YAML files.
*    We would first ask the user which file format they want to export.  For now, we export all 3.
*/

include("Connection.php");
include("Exports.php");
	
// Variables for user input / database access 
public $servername = " ";
public $username = " ";
public $password = " ";
public $database = " ";

/*
*    User would input fields here:  servername, username, password, and database.
*    We then use these fields to query database.
*/

// Create new connection and connect 
public $conn = new Connection($servername, $username, $password, $database);
$conn.connect();

// Export JSON
$conn.export($conn->$tableData, 0);

// Export YAML
$conn.export($conn->$tableData, 1);

// Export XML
$conn.export($conn->$tableData, 2);

?>  

