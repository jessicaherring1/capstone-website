<!doctype html>
<?php

$host = "localhost";
$user = "root";
$password = "";

$pdo = new PDO("mysql:host=$host", $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$pdo->query("use jess");

$limit = 30;
$query = "  SELECT tagname , count(tagid) as weight from queue t1
	JOIN tagstable t2 on t1.tagid = t2.id
	group by tagid  order by weight desc limit :limit";
$sql = $pdo->prepare($query);
$sql->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
$sql->execute();
$tags = $sql->fetchAll();

$keys = array_keys($tags);
shuffle($keys);
foreach($keys as $key){
	$new[$key] = $tags[$key];
}
$tags = $new;



?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
              integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
              crossorigin="anonymous">
        <title></title>

		<style>
				.cloud-div {
						width:50%;
						justify-content:center;
						text-align:center;
				}
				.cloud-tag {
					padding: 0;
					padding-right: 5px;
					vertical-align:center;
					white-space: nowrap;
				}
		</style>
    </head>
    <body>
        <div class="container-fluid">
<?php
$starting_font_size = 10;
$factor = 0.4;
echo '<div class="cloud-div">';
foreach ($tags as $t) {
	$x = round( $t["weight"]/100) * $factor;
	$font_size = $starting_font_size + $x.'px';
	echo '<a href="#">
		<span class="cloud-tag" style="font-size: '.$font_size.';">'
		.$t["tagname"].'
		</span>
		</a>';
}
echo '</div>';
 ?>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    </body>
</html>
