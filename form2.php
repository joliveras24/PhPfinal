<?php
$php_title= "form2";
include ('includes/header.html');

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {


	$Primary_Insurance=  $_POST ['Insurance'];
	$Phone=  $_POST ['Inphone'];
	$Policy= $_POST ['policy'];
	$Group_Num=  $_POST ['group'];
	$Insured_Name=  $_POST ['name'];
	$RelPatient= $_POST ['relpat'];
	$Insured_DOB=  $_POST ['InDOB'];
	$Insured_SSN=  $_POST ['InSSN'];
	$Insurance_Address= $_POST ['Inadd'];
	



	//echo ' first name '.$fn.'Last name '. $ln.' Address: '.$addrs.'';

	require ('mysqli_connect.php'); // Connect to the db.

	// Make the query:
	$f = "INSERT INTO insurance (Primary_Insurance, Phone, Policy, Group_Num, Insured_Name, RelPatient, Insured_DOB, Insured_SSN, Insurance_Address) VALUES
	('$Primary_Insurance', '$Phone', '$Policy', '$Group_Num', '$Insured_Name', '$RelPatient', '$Insured_DOB', '$Insured_SSN', '$Insurance_Address')";



	$r = @mysqli_query ( $dbc, $f ); // Run the query.
	if ($r) { // If it ran OK.
			
		// Print a message:
		echo '<h1>Thank you!</h1>
			<p>Thank You, Please click next.</p><p>
			<br /></p>';
	} else { // If it did not run OK.

		// Public message:
		echo '<h1>System Error</h1>
		 <p class="error">System error. We apologize for
			any inconvenience.</p>';

		// Debugging message:
		echo '<p>' . mysqli_error ( $dbc ) . '<br /><br />Query: ' . $f . '</p>';
	} // End of if ($r) IF.

	mysqli_close ( $dbc ); // Close the database connection.
	 

}

?>



<h1>Insurance Information</h1>

<form action="form2.php" method="post">
	<p>
		Primary Insurance Co. <input type="text" name="Insurance" size="15" maxlength="20"/>
		
		Insurance Phone #: <input type="text" name="Inphone" size="15" maxlength="15"/>
	</p>
	
	<p>
		Policy #: <input type="policy" name="policy" size="15" maxlength="20"/>
		
		Group #: <input type="group" name="group" size="15" maxlength="20"/>
	</p>
	
	<p>
		Name of Insured: <input type="name" name="name" size="20" maxlength="30"/>
		
		Relationship to patient: <input type="relpat" name="relpat" size="10" maxlength="15"/>
	</p>

	<p>
		Insured Date of Birth: <input type="InDOB" name="InDOB" size="10" maxlength="20"/>
			
		Insured SSN #: <input type= "InSSN" name="InSSN" size= "15" maxlength="25"/>
						
	</p>
	<p>
		Insurance Address: <input type="Inadd" name="Inadd" size="20" maxlength="40"/>
	</p>
	
	<p>
		<input type="submit" name="submit" value="Submit" />
		
	</p>
</form>

<form id="NEW" action="form3.php">
    <input type="submit" value="Next">
</form>

<?php include ('includes/footer.html'); ?>