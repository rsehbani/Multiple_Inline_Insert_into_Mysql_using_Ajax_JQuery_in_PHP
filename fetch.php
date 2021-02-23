<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "xigo1967", "testing");
$output = '';
$query = "SELECT * FROM item ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Item Data</h3>
<table class="table table-bordered table-striped">
 <tr>
 <th width="30%"> Id</th>
  <th width="30%"> Name</th>
  <th width="10%"> Code</th>
  <th width="50%">Description</th>
  <th width="10%">Price</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
 <td  contenteditable="false"  class="id">'.$row["id"].'</td>
  <td  contenteditable="true"  class="name">'.$row["name"].'</td>
  <td   contenteditable="true"  class="code">'.$row["code"].'</td>
  <td   class="desc">'.$row["description"].'</td>
  <td  class="price">'.$row["price"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>