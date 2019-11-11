<?php
if (isset($_POST['submitdel'])) 
{

    require 'dbhin.php';

   $del_date =  $_POST['deldate'];
   $del_time =  $_POST['deltime'];
   $eppno =  $_POST['emppno'];
   $itno =  $_POST['Itno'];
   $shsts = $_POST['shsts']; 
// Attempt insert query execution
  $sql = "INSERT INTO deliver (deliver_date, deliver_time, emply_no, item_no, status) VALUES ('$del_date', '$del_time', '$eppno', '$itno','$shsts')";
  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header("Location: delevaries.php");
      exit();
  } 
  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}
header("Location: shelf.php");
exit();
?>