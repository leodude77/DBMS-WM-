<?php
   echo'<form class="modal-content" action="itemsearch.php" method="POST">
     <div id= itemser class="container">
      <h1>Search item</h1>
      <form name="delinsert" method="POST" action="delinsert.php" style="float: right;height: auto;" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="deldate" placeholder="delivery date" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="deltime" placeholder="delivery time" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="emplno" placeholder="employee number" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="itemno" placeholder="item number" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="status" placeholder="status" >
        <button style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="submit" name="submitdel" value="itemsender">Search</button> 
      </form>
    </form>'
    
?>