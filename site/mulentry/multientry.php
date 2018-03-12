<!DOCTYPE html>
<html>
 <head>
  <title>Multi :Data Entry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
 </head>
 <body>
  
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HRM Systems</a>
    </div>
   
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../../users.php">Users</a></li>
          <li><a href="../database.php">Database</a></li>
          </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Goto<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="/site/mulentry/multientry.php">Data Entry</a></li>
          <li><a href="/site/nbproject/index.php">Search</a></li>
          </ul>
      </li>
     
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../login.php"><span class="glyphicon glyphicon-user"></span> Login Portal</a></li>
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
  <div class="btn-group">
  <button type="button" class="btn btn-danger">Menu</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="../../index.php">Home</a></li>
    <li><a href="../../profile.php">Profile</a></li>
    <li><a href="../../logout.php">Logout</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="in.linkedin.com/in/memonsaad/">Connect to Developer</a></li>
  </ul>
</div>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="left">Multi: Data Entry</h2>
   <p>Please Insert Employee's information and click on <b>Insert</b> button to record into the database.</p>
   <p>Click on <b>(+)</b> Button to add no of rows and <b>(-)</b> to delete rows. </p>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="6.7%">ID</th>
      <th width="25%">Name</th>
      <th width="25%">Address</th>
      <th width="5%">Salary</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="id"></td>
      <td contenteditable="true" class="name"></td>
      <td contenteditable="true" class="address"></td>
      <td contenteditable="true" class="salary"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Insert</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='id'></td>";
   html_code += "<td contenteditable='true' class='name'></td>";
   html_code += "<td contenteditable='true' class='address'></td>";
   html_code += "<td contenteditable='true' class='salary' ></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var id = [];
  var name = [];
  var address = [];
  var salary = [];
  $('.id').each(function(){
   id.push($(this).text());
  });
  $('.name').each(function(){
   name.push($(this).text());
  });
  $('.address').each(function(){
   address.push($(this).text());
  });
  $('.salary').each(function(){
   salary.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{id:id, name:name, address:address, salary:salary},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>
<div align="center">
     <a href="/site/database.php" class="btn btn-info" role="button">Back</a>
    </div>
