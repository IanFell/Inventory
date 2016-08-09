<?php

/*
* This interface contains the function for exporting data to multiple formats
*/

public interface Exports 
{
    public function export($tableData, $action);
}

?>
