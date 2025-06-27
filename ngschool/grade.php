<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<?php if (login_check($mysqli) == true) : ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>NGSCHOOL-Download lessions </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color:black;">

<div class="container">

<div class="page-header">
    <h1 style='float:right; margin-top:0px'><lable style="color:blue;">N</lable><lable style="color:green;">G</lable><lable style="color:red;">S</lable><small style="color:red;">chool</small></h1>
    <h1><label > <a href="index1.php">Back</a></label></h1>
</div>

<!-- Metro Tiles - START -->


<div class="container dynamicTile">
    <div class="row">
<?php
$grade=$_GET['grade'];
$i=0;
	$sql="SELECT distinct subject FROM ngschool.uploads where grade='$grade' order by subject;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()){
    $i++;
    
    if ($i%6==0){
    
    echo '</div><div class="row">';
    }
    ?>
        <div class="col-sm-2 col-xs-4">
            <div id="tile<?php echo $i;?>" class="tile">

                <div class="carousel slide" ><a href="subject.php?grade=<?php echo $grade;?>&subject=<?php echo $row['subject']; ?>">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" style="background-image: url(images/bground.jpg);">
                        <div class="item active text-center">
                            <div>
                                <span class="fa  fa-cloud-download bigicon"></span>
                            </div>
                            <div class="icontext">
                                <?php echo $row['subject']; ?>
                            </div>
                            <div class="icontext">
                            </div>
                        </div>
                    </div>
                    </div></a>

            </div>
        </div>
<?php    }
} ?>
    </div>
</div>
<style>
    .dynamicTile .col-sm-2.col-xs-4 {
        padding: 5px;
    }

    .bigicon {
        font-size: 67px;
        color: white;
        margin-top: 20px;
        margin-bottom: 0px;
    }

    .icontext {
        color: white;
        font-size: 27px;
    }

    .bigicondark {
        font-size: 67px;
        color: black;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .icontextdark {
        color: black;
        font-size: 27px;
    }

    .dynamicTile .col-sm-4.col-xs-8 {
        padding: 5px;
    }

    #tile1 {
        background: #FF8800;
    }

    #tile2 {
        background: #FF0088;
    }

    #tile3 {
        background: #88FF44;
    }

    #tile4 {
        background: #ff0000;
    }

    #tile5 {
        background: #00FF00;
    }

    #tile6 {
        background: #0000FF;
    }

    #tile7 {
        background: white;
    }

    #tile8 {
        background: #0088FF;
    }

    #tile9 {
        background: #8800ff;
    }

    #tile10 {
        background: #FFFF00;
    }

    .tilecaption {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        margin: 0!important;
        text-align: center;
        color: white;
        font-family: Segoe UI;
        font-weight: lighter;
    }
</style>
<script type="text/javascript">
$(document).ready(function () {
    $(".tile").height($("#tile1").width());
    $(".carousel").height($("#tile1").width());
    $(".item").height($("#tile1").width());

    $(window).resize(function () {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            $(this).trigger('resizeEnd');
        }, 10);
    });

    $(window).bind('resizeEnd', function () {
        $(".tile").height($("#tile1").width());
        $(".carousel").height($("#tile1").width());
        $(".item").height($("#tile1").width());
    });

});
</script>


<!-- Metro Tiles - END -->

</div>

</body>
</html>
        <?php endif; ?>