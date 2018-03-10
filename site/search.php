$html = '<tr>';
$html .= '<td class="small">nameString</td>';
$html .= '<td class="small">compString</td>';
$html .= '<td class="small">zipString</td>';
$html .= '<td class="small">cityString</td>';
$html .= '</tr>';

<?php
include '/site/templates/header.php';

$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $test_db->real_escape_string($search_string);
$time = "UPDATE query_data SET timestamp=now() WHERE name='" .$search_string. "'";
$query_count = "UPDATE query_data SET querycount = querycount +1 WHERE name='" .$search_string. "'";
$query = 'SELECT * FROM employee WHERE name LIKE "%'.$search_string.'%"';
//Timestamp entry of search for later display
 $time_entry = $test_db->query($time);
 //Count how many times a query occurs
 $query_count = $test_db->query($query_count);
 // Do the search
 $result = $test_db->query($query);
 while($results = $result->fetch_array()) {
 $result_array[] = $results;
 }

 // Check for results
if (isset($result_array)) {
foreach ($result_array as $result) { 
 
// Output strings and highlight the matches
$d_name = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['name']);
$d_comp = $result['address'];
$d_zip = $result['salary'];
$d_city = $result['salary'];


// Replace the items into above HTML
$o = str_replace('nameString', $d_name, $html);
$o = str_replace('compString', $d_comp, $o);
$o = str_replace('zipString', $d_zip, $o);
$o = str_replace('cityString', $d_city, $o);
// Output it
echo($o);


}else{
 // Replace for no results
 $o = str_replace('nameString', '<span class="label label-danger">No Names Found</span>', $html);
 $o = str_replace('compString', '', $o);
 $o = str_replace('zipString', '', $o);
 $o = str_replace('cityString', '', $o);
 // Output
 echo($o);
 
 ?>