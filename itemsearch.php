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
    if (isset($_POST['submititem'])) 
    {

		require 'dbhin.php';

		$itemname = $_POST['Itmname'];
		//fred($password); die;

        if (empty($itemname))
        {
			header("Location: index2.php?error=emptyfields");
			exit();
		}
        else 
        {
			$sql = "SELECT * FROM item WHERE item_name=?;";
			$stmt = mysqli_stmt_init($conn);			
            if (!mysqli_stmt_prepare($stmt,$sql)) 
            {
				header("Location: index2.php?error=sqlerror");
				exit();				
			}
            else 
            {
                
				mysqli_stmt_bind_param($stmt, "s",$itemname);
				mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) 
                {
                    //fred($row);
                    //echo $row['item_no'];
					//fred($row['item_name']); die;
					//fred($itemname); die;
					$ItemCheck=equals($itemname,$row['item_name']);
                    if ($ItemCheck == false) 
                    {
						header("Location: index2.php?error=Item_not_in_Database");
						exit();	
					}
                    else if($ItemCheck == true)
                    {
                        session_start();
                        //global $itno;
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row) {
                                $itno=$row['item_no'];
                                $sql = "SELECT on_level FROM shelf WHERE item_no=?;";
                                $stmt = mysqli_stmt_init($conn);			
                             if (!mysqli_stmt_prepare($stmt,$sql)) 
                             {
				                header("Location: index2.php?error=sqlerror1");
				                exit();				
			                 }
                                 mysqli_stmt_bind_param($stmt, "s",$itno);
				                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                $row1 = mysqli_fetch_assoc($result); 
                                $sendtoshelf =  "?itemnumber=" . $row["item_no"];
                                $sendlvl = "?itemlevel=" . $row1["on_level"];
                                header("Location: shelf.php".$sendtoshelf."&".$sendlvl);
                                exit();
                           } 
                        //$_SESSION['itno'] = $row['item_no'];
                        //fred($itno); die;
                        //echo $itno;
						//header("Location: itemdis.php?".$itno."fdg");
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
}
   
 ?>