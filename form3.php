<?php
$php_title= "form1";
include ('includes/header.html');

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

	
	$Ref_Phys=  $_POST ['refphys'];
	if ($_POST ['select'])
	
		$Contact="Yes";
	else
		$Contact="No";
	$Phone=  $_POST ['physphone'];
	$Phys_Name= $_POST ['physname'];
	$Phys_Phone=  $_POST ['physphone2'];
	$Name_Ref=  $_POST ['name'];




	//echo ' first name '.$fn.'Last name '. $ln.' Address: '.$addrs.'';

	require ('mysqli_connect.php'); // Connect to the db.

	// Make the query:
	$a = "INSERT INTO ref_phys (Ref_Phys, Contact, Phone, Phys_Name, Phys_Phone, Name_Ref) VALUES
	( '$Ref_Phys', '$Contact', '$Phone', '$Phys_Name', '$Phys_Phone', '$Name_Ref')";



	$r = @mysqli_query ( $dbc, $a ); // Run the query.
	if ($r) { // If it ran OK.
			
		// Print a message:
		echo '<h1>Thank you!</h1>
			<p>Thank You, Please click Finish to register a new patient.</p><p>
			<br /></p>';
	} else { // If it did not run OK.

		// Public message:
		echo '<h1>System Error</h1>
		 <p class="error">System error. We apologize for
			any inconvenience.</p>';

		// Debugging message:
		echo '<p>' . mysqli_error ( $dbc ) . '<br /><br />Query: ' . $a . '</p>';
	} // End of if ($r) IF.

	mysqli_close ( $dbc ); // Close the database connection.


}


?>
<form>
<p>
<h1>Reffering Physician Information</h1>
</p>
</form>
<form action="form3.php" method="post">
	<p>
		May we contact your physicianfor further information? Yes:<input type="radio" name="select"> No :<input type="radio" name="select">
	</p>
	<p>
		Referring Physician : <input type="refphys" name="refphys" size="40" maxlength="40"/>
		
		Phone #: <input type="physphone" name="physphone" size="15" maxlength="15"/>
	</p>
	
	<p>
		In addition to your referring physician arethere any other physicians you wish us to send the sleep study report: 
	
	</p>
	
	<p>
		Physician Name: <input type="physname2" name="physname" size="40" maxlength="40"/>
		
		Contact Number: <input type="physphone2" name="physphone2" size="11" maxlength="15"/>
	</p>
	<br>
	
	<h3>How did you hear about center for Sleep Disorders?</h3>
	<br>
	<p>
		Physician:<input type="radio" name="sex"> Relative:<input type="radio" name="sex1"> 
		Friend:<input type="radio" name="sex"> Newspaper:<input type="radio" name="sex1"> 
		Television:<input type="radio" name="sex"> Radio:<input type="radio" name="sex1">
		Seminar:<input type="radio" name="sex"> Inernet:<input type="radio" name="sex1">
		Health:<input type="radio" name="sex">
							
	</p>
	<p>
		Name of person that referred you (if applicable): <input type="name" name="name" size="40" maxlength="40"/>
	</p>
	
	<p>
		<input type="submit" name="submit" value="Submit" />
		
		
	</p>
</form>

<form id="NEW" action="index.php">
    <input type="submit" value="finish">
</form>

<?php include ('includes/footer.html'); ?>