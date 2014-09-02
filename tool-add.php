<?php
	$mysqli = new mysqli('localhost', 'linux1', 'linux1', 'linux1');
	if ($mysqli->connect_error) {
		die("Couldn't Connect to MySQL Database.\nError (" . $mysqli->connect_errno . "): " . $mysqli->connect_error);
	}
  if ($_POST["action"] === "insert") {
    $sql = "INSERT INTO tools (toolName, toolNumber, toolDescription) VALUES (";
    $sql = $sql . "'" . $_POST["toolName"] . "',";
    $sql = $sql . "'" . $_POST["toolNumber"] . "',";
    $sql = $sql . "'" . $_POST["toolDescription"] . "'";
    $sql = $sql . ");";
    if ($mysqli->query($sql) === FALSE) {
      printf("Error: Unable to insert data into table. (" . $mysqli->error . ")");
    }
  }
?>
<html>
  <head>
    <title>Add a Tool</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div id="container">
			<h2>Add a Tool</h2>
			<table class="mt">
				<tbody>
					<tr>
						<td>
              <form action="salesadd.php" method="POST">
                <input type="hidden" name="action" value="insert" />
                <table>
                  <tbody>
                    <tr>
                      <td>
                        <p>Tool Name:</p>
                      </td>
                      <td>
                        <input name="toolName" />
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Tool Number:</p>
                      </td>
                      <td>
                        <input name="toolNumber" />
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Price:</p>
                      </td>
                      <td>
                        <textarea name="toolDescription" />
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type="submit" name="Add">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
