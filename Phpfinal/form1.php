<?php
$php_title= "form1";
include ('includes/header.html');

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

	
	$FirstName=  $_POST ['first_name'];
	$LastName=  $_POST ['lastname'];
	$Email= $_POST ['email'];
	$Address=  $_POST ['address'];
	$City=  $_POST ['city'];
	$State= $_POST ['state'];
	$Zip=  $_POST ['zip'];
	$DOB=  $_POST ['DOB'];
	$Age= $_POST ['age'];
	$SSN=  $_POST ['ssn'];
	$Height=  $_POST ['height'];
	$Weight= $_POST ['weight'];
	
	

	//echo ' first name '.$fn.'Last name '. $ln.' Address: '.$addrs.'';

	require ('mysqli_connect.php'); // Connect to the db.
	 
	// Make the query:
	$q = "INSERT INTO patient (FirstName, LastName) VALUES
	('$FirstName', '$LastName' )";

	$r = @mysqli_query ( $dbc, $q ); // Run the query.
	if ($r) { // If it ran OK.
		 
		// Print a message:
		echo '<h1>Thank you!</h1>
			<p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p>
			<br /></p>';
	} else { // If it did not run OK.

		// Public message:
		echo '<h1>System Error</h1>
		 <p class="error">You could not be registered due to a system error. We apologize for
			any inconvenience.</p>';

		// Debugging message:
		echo '<p>' . mysqli_error ( $dbc ) . '<br /><br />Query: ' . $q . '</p>';
	} // End of if ($r) IF.

		mysqli_close ( $dbc ); // Close the database connection.
	  
	 
}
?>

<h1>Patient Information</h1>

<form action="form1.php" method="post">
	<p>
		First Name: <input type="text" name="first_name" size="15" maxlength="20"/>
	
	
		Last Name: <input type="text" name="lastname" size="15" maxlength="40"/>
	

		Email Address: <input type="text" name="email" size="20" maxlength="60"/>
	</p>
	<p>
		Address: <input type="address" name="address" size="80" maxlength="80"
			/>
	</p>
	<p>
		City: <input type="city" name="city" size="10"
			maxlength="20"
			/>
			
			State: <input type= "state" name="state" size= "15" maxlength="25"/>
			
			Zip: <input type="zip" name="zip" size="10" maxlength="10">
			
	</p>
	<p>
		Date of Birth: <input type="DOB" name="DOB" size="10" maxlength="15"/>
		
		Age: <input type="age" name= "age" size="5" maxlength="10"/>
		
		Male:<input type="radio" name="sex"> Female :<input type="radio" name="sex1">
		
		SSN: <input type="ssn" name="ssn" size="15" maxlength="17"/>
	</p>
	
	<p>
		Height: <input type="height" name="height" size="10" maxlength="10"/>
		
		Weight: <input type="weight" name="weight" size="10" maxlength="10"/>
	</p>
	<br>
	<h3>Contact Information</h3>
	
	<p>
		Home Phone: <input type="phone1" name="phone1" size="10" maxlength="10"/>
		
		Cell Phone: <input type="phone2" name="phone2" size="10" maxlength="10"/>
		
		Work Phone: <input type="phone3" name="phone3" size="10" maxlength="10"/>
	</p>
	
	<p>
		Place of Employment: <input type="employment" name="employment" size="15" maxlength="20">
		
		Occupation: <input type="job" name="job" size="15" maxlength="20">
	</p>
	
	<p>
		
		Married: Yes:<input type="radio" name="sex"> No :<input type="radio" name="sex1">
		
		Spouse Name: <input type="spouse" name="spouse" size="20" maxlength="20"/>
		
		Email Address: <input type="email2" name="email2" size="15" maxlength-"15"/>		
	</p>				
	<p>
		<input type="submit" name="submit" value="Submit" />
	</p>
</form>

<?php include ('includes/footer.html'); ?>