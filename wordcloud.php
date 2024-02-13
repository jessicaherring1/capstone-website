
<!DOCTYPE html>
<html lang="en">
<body>
    <p> hello </p>


<script type="text/javascript" src="wordcloud/jquery.wordcloud.js"></script>

<canvas id="cloudcanvas" width="600" height="400"></canvas>

<script type="text/javascript">

    
    jQuery(function ($) {
    $("#cloudcanvas").wordCloud({
        database: {
            //dbHost: <localhost>,
            //dbUser: <root>,
            //dbPass: <>,
            //dbName: <jess>,
            selectFields: <issue>,
            tableName: <queue>
        }
    })
});

</script>

</body>
</html>


