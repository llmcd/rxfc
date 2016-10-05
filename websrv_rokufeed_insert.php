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
 
// create a variable
$title=$_POST['title'];
$contentId=$_POST['contentId'];
$contentType=$_POST['contentType'];
$contentQuality=$_POST['contentQuality'];
$streamFormat=$_POST['streamFormat'];
$streamQuality=$_POST['streamQuality'];
$streamBitrate=$_POST['streamBitrate'];
$streamUrl=$_POST['streamUrl'];
$srt=$_POST['srt'];
$synopsis=$_POST['synopsis'];
$genres=$_POST['genres'];
$runtime=$_POST['runtime'];

$title = mysqli_real_escape_string($connection, $title);
$streamUrl = mysqli_real_escape_string($connection, $streamUrl);
//Execute the query
 
 
$query = "INSERT INTO site_contents (title, contentId, contentType, contentQuality, streamFormat, streamQuality, streamBitrate, streamUrl, srt, synopsis, genres, runtime)
		  VALUES ('$title','$contentId','$contentType','$contentQuality','$streamFormat','$streamQuality','$streamBitrate','$streamUrl','$srt','$synopsis','$genres','$runtime')";
		  
$result = mysqli_query($connection, $query);

	
	
	
if (!$result) {
		die("Database query failed.");
	}
header('Location: websrv_rokufeed_submit_success.html');
?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>