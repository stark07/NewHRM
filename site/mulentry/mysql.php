<?php
require_once '../config.php';

//LET'S INITIATE CONNECT TO DB

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT name, salary FROM employee WHERE salary LIKE '%{$query}%' OR name LIKE '%{$query}%'");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['salary'].', '.$row['name'],
            'value' => $row['salary'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}
?>
