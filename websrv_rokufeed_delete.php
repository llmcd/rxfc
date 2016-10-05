<!--
* Author : LLMCD Labs
* Email : lmcdowell@llmcd.com
* Website : http://www.llmcd.com
* Subject : RXF web service built with PHP to create a Roku compatible XML feed for VOD channels.
-->
<?php 
include 'websrv_connect.php'; 
?>

<?php
$id = (int)$_POST['id'];
$id = mysqli_real_escape_string($connection, $id);
		$query  = "DELETE FROM site_contents WHERE id=$id";
		$result = mysqli_query($connection, $query);
		if ($connection->query($query) === TRUE) {
   
				
				  
} else {
    echo  "Error deleting record: " . $result->error;
}
header('Location: websrv_rokufeed_deletesuccess.html');
?>



<?php
  // 5. Close database connection
  mysqli_close($connection);
?>

