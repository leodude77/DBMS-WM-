<?php
function fred($val)
{
  echo '<pre>';
   print_r( $val );
  echo '</pre>';
}
?>
<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Warehouse Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<style>
body, html {
  height: 100%;
}

</style>

  <div class="titlebar">
    <h1 style="color:black" align="center">WareHouse</h1>
  </div>

<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="index2.php" >Items</a>
  <a href="employees.php" >Employees</a>
  <a href="delevaries.php">Deliveries</a>
  <a href="checkout.php" class="active">Checkout</a>
 </div> 

<table>
  <tr>
    <th>Address</th>
    <th>Delivery date</th>
    <th>Delivery time</th>
    <th>Item number</th>
    <th>Status</th>
  </tr>
  <?php
    require 'dbhin.php';
    $sql= "SELECT * FROM checkpost";
    //fred($sql); die;
    $result= $conn->query($sql);
    //fred($result); die;

     if($result->num_rows>0)

    {
         while ($row = $result->fetch_assoc())
        {
             echo "<tr>
                     <td>".$row["address"]."</td>
                     <td>".$row["deliver_date_out"]."</td>
                     <td>".$row["deliver_time_out"]."</td>
                     <td>".$row["item_no"]."</td>
                     <td>".$row["status"]."</td>
                    </tr>";
        }
    }    
    echo "</table>";
   ?> 
</table>
<form class="modal-content" action="checkinsert.php" method="POST">
     <div id= delins class="container">
      <h1>Insert delivery details </h1>
      <form name="delinser" method="POST" action="checkinsert.php" style="float: right;height: auto;" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="addrs" placeholder="Address" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="deldate" placeholder="Delivery date" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="deltime" placeholder="Delivery time" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="Itno" placeholder="Item number" >
        <button style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="submit" name="submitcheck" value="itemsender">ADD</button> 
      </form>
    </form>

</body>
</html>
