<?php
	echo '<form method="post" action="tag_cloud_gen.php" name="gen_tag_db">';
	echo '<p>Input your text here:<textarea name="tag_input" rows="20" cols="80"></textarea></p>';
	echo '<input type="submit" name="submit">';
	echo '</form>';
?>

<h3>OR</h3>

<p>see the current tag cloud here</p>
<?php
	echo '<form name="show_tag_cloud" method="post" action="show_tag_cloud.php">';
	echo '<input type="submit" value="show current tag cloud" >';
	echo '</form>';
?>

<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
/**
* this function will update the mysql database table to reflect the new count of the keyword
* i.e. the sum of current count in the mysql database &amp;amp;amp;amp; current count in the input.
*/
function update_database_entry($connection,$table,$keyword,$weight){

	
	$string=$_POST['tag_input'];
	$connection = mysql_connect("localhost", "root", "");
	/**
	* now comes the main part of generating the tag cloud
	* we would use a css styling for deciding the size of the tag according to its weight, 
	* both of which would be fetched from mysql database.
	*/

	$query="select * from `tagcloud_db`.`tags` where keyword like '%$keyword%'";
	$resultset=mysql_query($query,$connection);

	if(!$resultset){
		die('Invalid query: ' . mysql_error());
	} else {
		while($row=mysql_fetch_array($resultset)){
		$query="UPDATE `tagcloud_db`.`tags` SET weight=".($row[2]+$weight)." where tag_id=".$row[0].";";
		mysql_query($query,$connection);
	}
}
}
?>
<?php
/*
* get the input string from the post and then tokenize it to get each word, save the words in an array
* in case the word is repeated add '1' to the existing words counter
*/
	$count=0;
	$tok = strtok($string, " \t,;.\'\"!&-`\n\r");//considering line-return,line-feed,white space,comma,ampersand,tab,etc... as word separator
	if(strlen($tok)>0) $tok=strtolower($tok);
	$words=array();
	$words[$tok]=1;
	while ($tok !== false) {
		echo "Word=$tok";
		$tok = strtok(" \t,;.\'\"!&-`\n\r");
		if(strlen($tok)>0) {
		$tok=strtolower($tok);
		if($words[$tok]>=1){
			$words[$tok]=$words[$tok] + 1;
		} else {
			$words[$tok]=1;
		}
	}
}
print_r($words);
echo '';
/**
* now enter the above array of word and corresponding count values into the database table
* in case the keyword already exist in the table then update the database table using the function 'update_database_entry(...)'
*/
$table="tagcloud_db";
mysql_select_db($table,$connection);
foreach($words as $keyword=>$weight){
	$query="INSERT INTO `tagcloud_db`.`tags` (keyword,weight,link) values ('".$keyword."',".$weight.",'NA')";
	if(!mysql_query($query,$connection)){
		if(mysql_errno($connection)==1062){
			update_database_entry($connection,$table,$keyword,$weight);
		}
	}
}
mysql_close($connection);
?>


s