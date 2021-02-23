<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Multiple Inline Insert into Mysql using Ajax JQuery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">Multiple Inline Insert into Mysql using Ajax JQuery in PHP</h2>
   <br />
   <div class="table-responsive">
    
   
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
  <script>
$(document).ready(function(){
 var count = 1;
 
 
 
 $('#save').click(function(){
     var id =[];
  var name = [];
  var code = [];
  var desc = [];
  var price = [];
  $('.id').each(function(){
    id.push($(this).text());
  });

  $('.name').each(function(){
    name.push($(this).text());
  });
  $('.code').each(function(){
    code.push($(this).text());
  });
  $('.desc').each(function(){
    desc.push($(this).text());
  });
  $('.price').each(function(){
    price.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{ id:id, name: name,  code: code,  desc: desc,  price: price},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_data();
   }
  });
 });
 
 function fetch_data()
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
 fetch_data();
 
});
</script>

 </body>
</html>

