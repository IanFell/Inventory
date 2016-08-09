<?php 

/*
*  This class represents our object that connects with the database and saves that data for export.
*  Also contains functions to help us export.
*/

include("Connection.php");
include("Exports.php");

public class Connection implements Exports 
{
    // Array to keep track of table data
    public $tableData = [];

    // Variables to connect to database
    private $servername = " ";
    private $username = " ";
    private $password = " ";
    private $database = " ";

    public function __construct($servername, $username, $password, $database)
    {
        this->servername = $servername;
        this->username = $username;
        this->password = $password;
        this->database = $database;
        echo "Creating connection object";
    }

    /*
    *  This method connects to the database and saves table data
    */
    
    public function connect()
    {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        echo "Connected successfully";

        private $sql = "SELECT * FROM inventory";
        private $result = $conn->query($sql);

        private $i = 0;  // Variable to help us keep track of table data

        // Loop through rows and save table data
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {		
                $tableData[i] = "id: " . $row["id"] .  " Manufacturer: " . $row["company"] . " SKU: " . $row["sku"] . "<br>";
                $i++;
            }
        } else {		
            echo "No results found";
        }

        $conn->close();
    }

    public function export($tableData, $action)
    {
        if($action == 0) {
            $jasonData = json_encode($tableData);
            file_put_contents("output.json", $jsonData);
        } elseif ($action == 1) {
            var_dump(yaml_emit($tableData));
            yaml_emit_file("ouput.yaml", $tableData);
        } else {
             exportXml($tableData);       
        }
    }

    /*
    *  This function instantiates an XML writer for export
    */
    
    private function exportXml($tableData)
    {
        // Create new XML Writer
        private $xml = new XMLWriter();
        $xml->open URI("output.xml");
        $xml->setIndent(true);
        $xml->startDocument();
        $xml->startElement('zZounds Inventory');

        private $rows = count($this->$tableData);

        for ($i = 0; $i < $rows; $i++) {
            // Export XML
            $xml->writeAttribute($tableData);
        }

        $xml->endElement();
        $xml->endDocument();
        $xml->flush();
    }

}

?>

