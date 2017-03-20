<?php # Script 10.4 - view_users.php #4
// This script retrieves all the records from the users table.
// This new version paginates the query results.

$page_title = 'View the Current Users';
include ('includes/header.html');
echo '<h1>Registered Patients</h1>';

require_once ('mysqli_connect.php');

// Number of records to show per page:
$display = 20;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.

	$pages = $_GET['p'];

} else { // Need to determine.

	// Count the number of records:
	$q = "SELECT COUNT(Patient_id) FROM patient";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r,
			MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}

} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric
		($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}
// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ?
$_GET['sort'] : 'rd';

// Determine the sorting order:
switch ($sort) {
	case 'ln':
		$order_by = 'LastName ASC';
		break;
	case 'fn':
		$order_by = 'FirstName ASC';
		break;
	case 'add':
		$order_by = 'Address ASC';
		break;
	case 'ph':
		$order_by = 'Home_Phone ASC';
		break;
	case 'rd':
		$order_by = 'registration_date
				ASC';
		break;
	default:
		$order_by = 'registration_date
				ASC';
		$sort = 'rd';
		break;
}

// Define the query:
$q = "SELECT LastName, FirstName, Address, Home_Phone,
DATE_FORMAT(registration_date, '%M
%d, %Y') AS dr, Patient_id FROM patient
ORDER BY registration_date ASC LIMIT
$start, $display";
$r = @mysqli_query ($dbc, $q);

// Table header:
echo '<table align="center" cellspacing="0"
		cellpadding="5" width="75%">
		<tr>
		<td align="left"><b>Edit</b></td>
		<td align="left"><b>Delete</b></td>
		<td align="left"><b>Last Name</b></td>
		<td align="left"><b>First Name</b></
		td>
		<td align="left"><b>Address</b></
		td>
		<td align="left"><b>Contact Number</b></
		td>
		<td align="left"><b>Date Registered
		</b></td>
		</tr>
		';

// Fetch and print all the records....

$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {

	$bg = ($bg=='#eeeeee' ? '#ffffff' :
			'#eeeeee'); // Switch the background color.

	echo '<tr bgcolor="' . $bg . '"><td align="left"><a href="edit_user.php?id=' . $row['Patient_id'] .'">Edit</a></td>
		<td align="left"><a href="delete_user.php?id=' . $row['Patient_id'] .'">Delete</a></td><td align="left">' . $row['LastName'] . '</td>
		<td align="left">' . $row['FirstName'] . '</td><td align="left">' . $row['Address'] . '</td>
	    <td align="left">' . $row['Home_Phone'] . '</td><td align="left">' . $row['dr'] .'</td></tr>';

} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {

	// Add some spacing and start a paragraph:
	echo '<br /><p>';

	// Determine what page the script is on:
	$current_page = ($start/$display)
	+ 1;

	// If it's not the first page, make a Previous link:
	if ($current_page != 1) {
		echo '<a href="view_users1.php?s=' . ($start - $display) .'&p=' . $pages . '&sort=' .
				$sort . '">Previous</a> ';
	}

	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="view_users1.php?s=' . (($display * ($i -1))) . '&p=' . $pages .
			'&sort=' . $sort . '">' .
			$i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.

	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="view_users1.php?s=' . ($start + $display) .
		'&p=' . $pages . '&sort=' .
		$sort . '">Next</a>';
	}

	echo '</p>'; // Close the paragraph.

} // End of links section.
?>

<br><br>

		
		<form action="form1.php">
    <input type="submit" value="New Patient">
</form>


<?php include ('includes/footer.html');?>