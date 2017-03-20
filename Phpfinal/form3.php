<?php
$php_title= "form1";
include ('includes/header.html');


?>
<form>
<p>
<h1>Reffering Physician Information</h1>
</p>
</form>
<form action="form3.php" method="post">
	<p>
		May we contact your physicianfor further information? Yes:<input type="radio" name="sex"> No :<input type="radio" name="sex1">
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

<?php include ('includes/footer.html'); ?>