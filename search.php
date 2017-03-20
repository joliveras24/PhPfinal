<!DOCTYPE  >  
 <html>  
   <head>  
     <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">  
     <title>Search  Contacts</title>  
   </head>  
   <p><body>  
     <h3>Search  Contacts Details</h3>  
     <p>You  may search either by first or last name</p>  
     <form  method="post" action="search.php?go"  id="searchform">  
       <input  type="text" name="name">  
       <input  type="submit" name="submit" value="Search">  
     </form>
     
     <?php 
     
   if(isset($_POST['submit'])){  
   if(isset($_GET['go'])){  
   if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){  
   $name=$_POST['name'];  
   //connect  to the database  
 	require ('mysqli_connect.php'); // Connect to the db.  
   //-select  the database to use  
    
   //-query  the database table  
   $sql="SELECT  user_id, first_name, last_name FROM patient WHERE first_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%'";  
   //-run  the query against the mysql query function  
   //$r=mysql_query($sql);
   $r = @mysqli_query ( $dbc, $sql );
   //-create  while loop and loop through result set 
   
   //while($row = mysql_fetch_array($result)){  
   while ( $row = mysqli_fetch_array ( $r, MYSQLI_ASSOC ) ) {
           $FirstName  =$row['first_name'];  
           $LastName=$row['last_name'];  
           $ID=$row['user_id'];  
   //-display the result of the array  
   echo "<ul>\n";  
   echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";  
   echo "</ul>";  
   }  
   }  
   else{  
   echo  "<p>Please enter a search query</p>";  
   }  
   }  
   }  
 ?>  
       
   </body>  
 </html>  
 </p>  
