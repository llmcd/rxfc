<!--
* Author : LLMCD Labs
* Email : lmcdowell@llmcd.com
* Website : http://www.llmcd.com
* Subject : RXF web service built with PHP to create a Roku compatible XML feed for VOD channels.
-->

<?php
$mysql_host = 'localhost'; //host name. don't change this!
$mysql_username = 'videoupload'; //username
$mysql_password = 'video'; //password
$mysql_database = 'test'; //database name

header('Content-Type: text/xml; charset=utf-8', true); //set document header content type to be XML

$feed = new SimpleXMLElement('<feed></feed>');

$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);


if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$results = $mysqli->query("SELECT id, title, srt, contentId, contentType, contentQuality, streamFormat, streamQuality, streamBitrate, streamUrl, synopsis, genres, runtime FROM site_contents");

if($results){  
	while($row = $results->fetch_object()) 
	{
		$item = $feed->addChild('item');
		$item->addAttribute('sdImg', 'your url here'); //add your url for sd image between the single quotes
		$item->addAttribute('hdImg', 'your url here'); //add your url for hd image between the single quotes
		$title = $item->addChild('title', $row->title); 
		$srt = $item->addChild('srt', $row->srt); 
		$contentId = $item->addChild('contentId', $row->contentId); 
		$contentType = $item->addChild('contentType', $row->contentType); 
		$contentQuality = $item->addChild('contentQuality', $row->contentQuality); 
		$streamFormat = $item->addChild('streamFormat', $row->streamFormat); 
		$media = $item->addChild('media'); //add title node under item
		$streamQuality = $media->addChild('streamQuality', $row->streamQuality); 
		$streamBitrate = $media->addChild('streamBitrate', $row->streamBitrate); 
		$streamUrl = $media->addChild('streamUrl', $row->streamUrl); 
		
		$synopsis = $item->addChild('synopsis', '<![CDATA['. htmlentities($row->synopsis) . ']]>'); 
		
		$genres = $item->addChild('genres', $row->genres);
		$runtime = $item->addChild('runtime', $row->runtime);
		
	}
}

$feed->asXML("temp_videoplayer.xml"); //This is the xml you will upload to your web server for Roku to access //You can rename it whatever you like
header('Location: websrv_rokufeed_createsuccess.html');
exit;
?>

<?php
		  // 4. Release returned data
		  mysqli_free_result($result);
?>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>