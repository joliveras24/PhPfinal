<?php # Script 10.3 - edit_user.php
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit a User';
include ('includes/header.html');
echo '<h1>Edit a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) &&
		(is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html');
	exit( );
}
	
require_once ('mysqli_connect.php');
	
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array( );
		
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[ ] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc,
				trim($_POST['first_name']));
	}
		
	// Check for a last name:
	if (empty($_POST['lastname'])) {
		$errors[ ] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc,
				trim($_POST['lastname']));
	}
	 
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[ ] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string
		($dbc, trim($_POST['email']));
	}
	
	// Check for an email address:
	if (empty($_POST['address'])) {
		$errors[ ] = 'You forgot to enter your address.';
	} else {
		$ad = mysqli_real_escape_string
		($dbc, trim($_POST['address']));
	}

	// Check for an email address:
	if (empty($_POST['phone1'])) {
		$errors[ ] = 'You forgot to enter your Phone Number.';
	} else {
		$ph = mysqli_real_escape_string
		($dbc, trim($_POST['phone1']));
	}
	if (empty($errors)) { // If everything's OK.

		// Test for unique email address:
		$q = "SELECT Patient_id FROM patient
		WHERE Email='$e' AND Patient_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {
			// Make the query:
			$q = "UPDATE patient SET FirstName='$fn', LastName='$ln', Email='$e', Address='$ad', Home_Phone='$ph' WHERE Patient_id=$id LIMIT 1";
			
			$r = @mysqli_query ($dbc, $q);
			
			if (mysqli_affected_rows($dbc)== 1) { // If it ran OK.

				// Print a message:
				echo '<p>The Patient has been
						edited.</p>';

			} else { // If it did not run OK.
				echo '<p class="error">The user
						could not be edited due to a
						system error. We apologize for
						any inconvenience.</p>';
				// Public message.
				echo '<p>' . mysqli_error($dbc)
				. '<br />Query: ' . $q . '</
						p>'; // Debugging message.
			}

		} else { // Already registered.
			echo '<p class="error">The
					email address has already been
					registered.</p>';
		}
			
	} else { // Report the errors.

		echo '<p class="error">The
				following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			// Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
			
	} // End of if (empty($errors)) IF.
		
} // End of submit conditional.
	
// Always show the form...
	
// Retrieve the user's information:
$q = "SELECT FirstName, Lastname, Email, Address, City, State, Zip, DOB, AGE, SSN, Weight, Home_phone, Cell, Work_Phone, Employment, Occupation, Spouse_Name, Email2 FROM patient WHERE Patient_id=$id";
$r = @mysqli_query ($dbc, $q);
	
if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r,
			MYSQLI_NUM);

	// Create the form:
	echo '<form action="edit_user.php" method="post">
	<p>
		First Name: <input type="text" name="first_name" size="15" maxlength="20" value="' . $row[0] . '" />
	
	
		Last Name: <input type="text" name="lastname" size="15" maxlength="40" value="' . $row[1] . '" />
	

		Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '" />
	</p>
	<p>
		Address: <input type="address" name="address" size="80" maxlength="80"value="' . $row[3] . '" />
	</p>
	<p>
		City: <input type="city" name="city" size="10"
			maxlength="20" value="' . $row[0] . '"/>
			
			State: <input type= "state" name="state" size= "15" maxlength="25" value="' . $row[4] . '" />
			
			Zip: <input type="zip" name="zip" size="10" maxlength="10" value="' . $row[5] . '" >
			
	</p>
	<p>
		Date of Birth (YYYY-MM-DD): <input type="DOB" name="DOB" size="10" maxlength="15" value="' . $row[6] . '" />
		
		Age: <input type="age" name= "age" size="5" maxlength="10" value="' . $row[7] . '" />
		
		
		
		SSN: <input type="ssn" name="ssn" size="15" maxlength="17" value="' . $row[8] . '" />
	</p>
	
	<p>
		
		
		Weight: <input type="weight" name="weight" size="10" maxlength="10" value="' . $row[9] . '" />
	</p>
	<br>
	<h3>Contact Information</h3>
	
	<p>
		Home Phone: <input type="phone1" name="phone1" size="10" maxlength="10" value="' . $row[10] . '" />
		
		Cell Phone: <input type="phone2" name="phone2" size="10" maxlength="10" value="' . $row[11] . '" />
		
		Work Phone: <input type="phone3" name="phone3" size="10" maxlength="10" value="' . $row[12] . '" />
	</p>
	
	<p>
		Place of Employment: <input type="employment" name="employment" size="15" maxlength="20" value="' . $row[13] . '" />
		
		Occupation: <input type="job" name="job" size="15" maxlength="20" value="' . $row[14] . '" />
	</p>
	
	<p>
		
		
		
		Spouse Name: <input type="spouse" name="spouse" size="20" maxlength="20" value="' . $row[15] . '" />
		
		Email Address: <input type="email2" name="email2" size="15" maxlength-"15" value="' . $row[16] . '" />		
	</p>				
	<p>
		<input type="submit" name="submit" value="Submit" />

		<input type="hidden" name="id" value="' .$id . '" />
					
	</p>
		
</form>';
	

} else { // Not a valid user ID.
	echo '<p class="error">This page has
			been accessed in error.</p>';
}

mysqli_close($dbc);
?>
<form id="NEW" action="view_users1.php">
    <input type="submit" value="Cancel">
</form>

<?phpinclude ('includes/footer.html');
?>