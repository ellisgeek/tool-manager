<?php
	$mysqli = new mysqli('localhost', 'linux1', 'linux1', 'linux1');
	if ($mysqli->connect_error) {
		die("Couldn't Connect to MySQL Database.\nError (" . $mysqli->connect_errno . "): " . $mysqli->connect_error);
	}
	$sales = $mysqli->query("SELECT * FROM sales");
?>
<html>
	<head>
		<title>Display Tools</title>
		<link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
	<body>
		<div id="container">
			<h2>Sales Add App</h2>
			<table class="mt">
				<tbody>
					<tr>
						<td>
							<table>
								<thead>
									<tr>
										<th>Tool Name</th>
										<th class="num">Tool Number</th>
										<th class="num">tool Description</th>
									</tr>
								</thead>
								<tbody>
									<?php
										while ($salesrow = $sales->fetch_assoc()) {
											print "<tr>";
											print "<td>" . $salesrow["toolName"] . "</td>";
											print "<td class='num'>" . $salesrow["toolNumber"] . "</td>";
											print "<td class='num'>" . $salesrow["toolDescription"] . "</td>";
											print "</tr>";
										}
										$mysqli->close();
									?>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>
