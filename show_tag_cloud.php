<?php
	$connection = mysqli_connect("localhost", "root", "", "jess");
	$table="queue";
	$words=array();
	$words_link=array();
	mysql_select_db($table,$connection);
	$query="SELECT keyword,weight,link FROM `tagcloud_db`.`tags`;";
	
	if($resultset=mysql_query($query,$connection)){
		while($row=mysql_fetch_row($resultset)){
			$words[$row[0]]=$row[1];
			$words_link[$row[0]]=$row[2];
		}
	}
// Incresing this number will make the words bigger; Decreasing will do reverse
$factor = 0.5;

// Smallest font size possible
$starting_font_size = 12;

// Tag Separator
$tag_separator = '     ';
$max_count = array_sum($words);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<TITLE> Tag Cloud Generator </TITLE>
		<META NAME="Keywords" CONTENT="tag, cloud, php, mysql">
		<META NAME="Description" CONTENT="A Tag Cloud using php and mysql">
		<LINK REL="stylesheet" HREF="style.css" TYPE="text/css">
	</HEAD>
<BODY>
<center><h1>Tag Cloud using php and mysql </h1><div align='center' class='tags_div'>
<?php
foreach($words as $tag => $weight )
{
	$x = round(($weight * 100) / $max_count) * $factor;
	$font_size = $starting_font_size + $x.'px';
	if($words_link[$tag]=='NA') echo "<span style='font-size: ".$font_size."; color: #676F9D;'><a href='http://www.google.co.in/search?hl=en&q=".$tag."&meta='>".$tag."</a></span>".$tag_separator;
	else echo "<span style='font-size: ".$font_size."; color: #676F9D;'><a href='http://".$words_link[$tag]."/'>".$tag."</a></span>".$tag_separator;
}
?>
</div></center>
</BODY>
</HTML>