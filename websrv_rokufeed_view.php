<!--
* Author : LLMCD Labs
* Email : lmcdowell@llmcd.com
* Website : http://www.llmcd.com
* Subject : RXF web service built with PHP to create a Roku compatible XML feed for VOD channels.
-->

<!DOCTYPE html>
<html>
<head>
<title>View Roku XML Feed</title>
<link rel="stylesheet" href="css/style.css">
<link href="//fonts.googleapis.com/css?family=Roboto:300,100" rel="stylesheet" type="text/css" />
  
</head>
<body id="text01">
<br>
<br>
<center>
<a href="index.html">Go Back To Roku XML Feed Dashboard</a><br><br>
<a href="websrv_rokufeed_deleteform.html"> Go Back To Delete Record Form</a>

<br /><br />
<?php 
include 'websrv_connect.php'; 
?>

<?php

		$query  = "SELECT * FROM site_contents";
		$result = mysqli_query($connection, $query);
		if ($result->num_rows > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result))
			{
				echo "ID: " . $row["id"]. "<br>";
				echo "Video Title: " . $row["title"]. "<br>";
				echo "Stream URLs: " . $row["streamUrl"]. "<br>";
				
				echo "<br>";
    }
} else {
    echo "0 results, error!";
}

?>


</center>

</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>

