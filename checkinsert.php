<?php
if (isset($_POST['submitcheck'])) 
{

    require 'dbhin.php';
   $adrs =  $_POST['addrs'];
   $del_date =  $_POST['deldate'];
   $del_time =  $_POST['deltime'];
   $itno =  $_POST['Itno'];
}
 
// Attempt insert query execution
  $sql = "INSERT INTO checkpost ( `address`, deliver_date, deliver_time, item_no) VALUES ('$adrs','$del_date', '$del_time', '$itno')";
  if ($conn->query($sql) === TRUE)
   {
      echo "New record created successfully";
      header("Location: delevaries.php");
      exit();
   } 
  else 
      echo "Error: " . $sql . "<br>" . $conn->error;
else{
header("Location: checkout.php");
exit();
}
?>