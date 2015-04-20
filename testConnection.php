
<?php
	require_once('model/data/Connection.php');
	require_once "model/Assignment.php";
	
	$aConnection = Connection::getInstance();
	$query='SELECT * FROM assignments';
	
	$aResult = $aConnection->query($query);
	
	echo "<table>";
	while ($aRow = pg_fetch_assoc($aResult)){
		?>
		<tr>
			<td> <?php echo $aRow['name'];?></td>
			<td> <?php echo $aRow['description'];?></td>
		</tr>
		<?php
	}
	echo "</table>";
?>

<h1>assignments</h1>

<?php
	$anAssignment = new Assignment(1);
	$anAssignment->printTime();
?>
