<?php
$php_title= "form1";
include ('includes/header.html');


?>

<h3>Search  Contacts Details</h3>
<br> 
    <p>You  may search either by first or last name</p>  
    <br>
    <form  method="post" action="search.php?go"  id="searchform">  
       <input  type="text" name="name">  
       <input  type="submit" name="submit" value="Search">  
     </form>  


<?php include ('includes/footer.html'); ?>