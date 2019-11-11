<?php
   function fred($val)
   {
      echo '<pre>';
      print_r( $val );
      echo '</pre>';
   }?>
   <?php
   function equals($val1,$val2)
   {
      if($val1==$val2){
        return true;
      }
      else{
        return false;
      }
    
   }
   ?>
   <?php 
       if (isset($_POST['submitdel'])) 
       {
   
       require 'dbhin.php';
   
       $del_date = $_POST['deldate'];
       $del_time = $_POST['deltime'];
       $empy_no = $_POST['emplno'];
       $item_no = $_POST['itemno'];
       $sts = $_POST['status'];
       //fred($password); die;
   
           if (empty($del_date) || empty($del_time) || empty($empy_no) || empty($item_no) || empty($sts))
           {
         header("Location: index2.php?error=emptyfields");
         exit();
       }
           else 
           {
         $sql = "INSERT INTO deliver VALUES ($del_date,$del_time,$empy_no,$item_no,$sts);";
         $stmt = mysqli_stmt_init($conn);			
               if (!mysqli_stmt_prepare($stmt,$sql)) 
               {
           header("Location: delevaries.php?error=sqlerror");
           exit();				
         }
               else 
               {
           mysqli_stmt_bind_param($stmt, "sssss",$del_date,$del_time,$empy_no,$item_no,$sts);
           mysqli_stmt_execute($stmt);
                   $result = mysqli_stmt_get_result($stmt);
                   if ($row = mysqli_fetch_assoc($result)) 
                   {
             //fred($row['item_name']); die;
             //fred($itemname); die;
             
                       if ($ItemCheck == false) 
                       {
               header("Location: index2.php?error=Item not in Database");
               exit();	
             }
                       else if($ItemCheck == true)
                       {
                           session_start();
                           //global $itno;
                           $itno=$row['item_no'];
                           $_SESSION['itno'] = $row['item_no'];
                           //fred($itno); die;
                       
               header("Location: itemdis.php");
               exit();
             }
                       else 
                       {
               header("Location: index.php?error=wrongpwdbuthowdidthishappen");
               exit();	
             }
           }
                   else 
                   {
             header("Location: index.php?error=nouser");
             exit();	
           }
         }
   
           }
       }
       else 
       {
       header("Location: index2.php");
       exit();
     }



?>