<?php
$php_title= "form1";
include ('includes/header.html');


?>

<h1>Insurance Information</h1>

<form action="form2.php" method="post">
	<p>
		Primary Insurance Co. <input type="Insurance" name="Insurance" size="15" maxlength="20"/>
		
		Insurance Phone #: <input type="Inphone" name="Inphone" size="15" maxlength="15"/>
	</p>
	
	<p>
		Policy #: <input type="policy#" name="policy#" size="15" maxlength="20"/>
		
		Group #: <input type="group#" name="group#" size="15" maxlength="20"/>
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

<?php include ('includes/footer.html'); ?>