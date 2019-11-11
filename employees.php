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
body, html {
  height: 100%;
}
</style>
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
 
  <div class="titlebar">
    <h1 style="color:black" align="center">WareHouse</h1>
  </div>

<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="index2.php" >Items</a>
  <a href="employees.php" class="active">Employees</a>
  <a href="delevaries.php">Deliveries</a>
  <a href="checkout.php">Checkout</a>
 </div> 

<table>
  <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Employee number</th>
    <th>Password</th>
    <th>Salary</th>
    <th>Contact</th>
    
  </tr>
  <?php
    require 'dbhin.php';
    $sql= "SELECT * FROM employee";
    //fred($sql); die;
    $result= $conn->query($sql);
    //fred($result); die;

     if($result->num_rows>0)

    {
         while ($row = $result->fetch_assoc())
        {
             echo "<tr>
                     <td>".$row["fname"]."</td>
                     <td>".$row["lname"]."</td>
                     <td>".$row["emply_no"]."</td>
                     <td>".$row["pass"]."</td>
                     <td>".$row["salary"]."</td>
                     <td>".$row["contact"]."</td>
                    </tr>";
        }
    }    
    echo "</table>";
    
     
   ?> 
</table>
</body>
</html>
