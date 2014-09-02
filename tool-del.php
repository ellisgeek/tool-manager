<?php
	$mysqli = new mysqli('localhost', 'linux1', 'linux1', 'linux1');
	if ($mysqli->connect_error) {
		die("Couldn't Connect to MySQL Database.\nError (" . $mysqli->connect_errno . "): " . $mysqli->connect_error);
	}
	if ($_POST["action"] === "delete") {
		$sql = "DELETE FROM tools WHERE";
		for ($i=0; $i < count($_POST['checkboxes']); $i++) {
			$sql = $sql . " toolID=" . $_POST['checkboxes'][$i] . " or";
		}
		$sql = rtrim($sql, "or");
		if ($mysqli->query($sql) === FALSE){
			printf("Error: Unable to delete rows" . $mysqli->error);
    }
  }
	$sales = $mysqli->query("SELECT * FROM sales");
?>
<html>
	<head>
		<title>Remove a Tool</title>
    		<link rel="stylesheet" type="text/css" href="styles.css" />
    		<link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="container">
			<h2>Remove a Tool</h2>
			<table class="mt">
				<tbody>
					<tr>
						<td>
              <form action="tool-del.php" method="POST">
		          	<input type="hidden" name="action" value="delete" />
	          		<table>
                  			<thead>
                    				<tr>
                      					<th>Delete?</th>
                      					<th>Tool Name</th>
                      					<th class="num">Tool Number</th>
                      					<th class="num">Tool Description</th>
                    				</tr>
                  			</thead>
                  			<tbody>
                    				<?php
                      					while ($salesrow = $sales->fetch_assoc()) {
                        					print "<tr>";
                        					print "<td><input type='checkbox' name='checkboxes' value='" . $salesrow["salenumber"] . "' /></td>";
                        					print "<td>" . $salesrow["toolName"] . "</td>";
                        					print "<td class='num'>" . $salesrow["toolNumber"] . "</td>";
                        					print "<td class='num'>" . $salesrow["toolDescription"] . "</td>";
                        					print "</tr>";
                      					}
                      					$mysqli->close();
                    				?>
                    				<tr>
                      					<td><input type="submit" value="Delete" class="delete"></td>
						</tr>
					</tbody>
				</table>
    			</div>
		</form>
	</body>
</html>
