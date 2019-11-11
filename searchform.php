<?php
   echo'<form class="modal-content" action="itemsearch.php" method="POST">
     <div id= itemser class="container">
      <h2>Search item</h2>
      <form name="itemsearch" method="POST" action="itemsearch.php" style="float: right;height: auto;" >
        <input style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="text" name="Itmname" placeholder="Item name" >
        <button style="width: auto;height: 70%;padding: 10px;margin: 5px; " type="submit" name="submititem" value="itemsender">Search</button> 
      </form>
    </form>'
    
?>