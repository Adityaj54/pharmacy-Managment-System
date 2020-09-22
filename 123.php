
<?php
include('db.php');
if(isset($_POST['submit'])){
$ISBN=$_POST["custId"];
$title=$_POST["custName"];
$author=$_POST["age"];
$edition=$_POST["sex"];
$publication=$_POST["postal_address"];
$phone=$_POST['phone'];

 
$query = "insert into prescription(prescription_id,customer_id,customer_name,age,sex,postal_address,invoice_id,phone) values('$ISBN','$title','$author','$edition','$publication','10','$phone')"; //Insert query to add book details into the book_info table
$result = mysqli_query($db,$query);
 }
?>
 

 

