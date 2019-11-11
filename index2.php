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
  <a href="index2.php" class="active">Items</a>
  <a href="employees.php">Employees</a>
  <a href="delevaries.php">Deliveries</a>
  <a href="checkout.php">Checkout</a>
 </div> 

<table>
  <tr>
    <th>Item name</th>
    <th>Item number</th>
    <th>Stock</th>
    <th>Price</th>
    <th>Status</th>
  </tr>
  <?php
    require 'dbhin.php';
    $sql= "SELECT * FROM item";
    //fred($sql); die;
    $result= $conn->query($sql);
    //fred($result); die;

     if($result->num_rows>0)

    {
         while ($row = $result->fetch_assoc())
        {
             echo "<tr>
                     <td>".$row["item_name"]."</td>
                     <td>".$row["item_no"]."</td>
                     <td>".$row["stock"]."</td>
                     <td>".$row["price"]."</td>
                     <td>".$row["status"]."</td>
                    </tr>";
        }
    }    
    echo "</table>";
   ?> 
</table>
<div id=itemser>
   <?php
      include 'searchform.php'
      ?>
</div>  
</body>
</html>

<!--<script>
$('#submititem').on('click', function() {
    $.ajax({
        url: 'itemsearch.php',
        type: 'post',
        data: {
            bandwidth: $('#bandwidth').val(),
            delay:     $('#delay_elem_id').val()
        }
    }).done(function(result) {
        $('#itemser').html('<p>' + result + '</p>');
    });
})
</script>-->