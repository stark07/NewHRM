<?php
//fetch.php
$connect = mysqli_connect("sql2.freemysqlhosting.net", "sql2235976", "jK6%hY8*", "sql2235976");
$output = '';
$query = "SELECT * from employees item ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Current Record on Database</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="5%">ID</th>
  <th width="13%">Name</th>
  <th width="13%">Address</th>
  <th width="5%">Salary</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["id"].'</td>
  <td>'.$row["name"].'</td>
  <td>'.$row["address"].'</td>
  <td>'.$row["salary"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
