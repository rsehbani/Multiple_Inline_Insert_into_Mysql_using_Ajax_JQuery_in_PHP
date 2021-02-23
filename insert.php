<?php
//insert.php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "xigo1967");


if(isset($_POST["id"]))
{
 $name = $_POST["name"];
 $code = $_POST["code"];
 $desc = $_POST["desc"];
 $price = $_POST["price"];
 $id = $_POST['id'];
 $query = '';
 for($count = 0; $count<count($name); $count++)
 {
   /*
  $name = mysqli_real_escape_string($connect, $name[$count]);
  $code = mysqli_real_escape_string($connect, $code[$count]);
  $desc = mysqli_real_escape_string($connect, $desc[$count]);
  $price = mysqli_real_escape_string($connect, $price[$count]);
  */
  if($name != '' && $code != '' && $desc != '' && $price != '')
  {
    $data = array(
        ':name'   => $name[$count],
        ':code'  => $code[$count],
        ':desc'  => $desc[$count],
        ':price' => $price[$count],
       
        ':id'   => $id[$count],
       );
       $query = "
       UPDATE item
       SET name = :name, code = :code, price = :price , description= :desc
       WHERE id = :id
       ";
       $statement = $connect->prepare($query);
       $statement->execute($data);
      }
 }
 if($query != '')
 {
  if($statement)
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}






?>
