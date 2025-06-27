<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
if(isset($_GET['error'])){
?>
		<script>
		alert('subject already downloaded');
	  AndroidFunction.openAndroidDialog('subject already downloaded');
        //window.location.href='fileupload.php?success';
        </script>

		<?php
                        }else{
	?>						
							
</script>
<script type="text/javascript">
 function openAndroidDialog(url) {
    alert(url)
	  AndroidFunction.openAndroidDialog(url);
 }
</script>
<?php
                        }

    $downloaded = array();
    $i=0;
    	$sql="SELECT video_id FROM ngschool.purchases where device_emei ='".$_SESSION['device_emei']."' ;";
$result1 = $mysqli->query($sql);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()){
        
       $downloaded[$i] = $row1['video_id'];
        $i++;
    }
}
if (login_check($mysqli) == true) : ?>
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
    <h1><label > <a href="grade.php?grade=<?php echo $_GET['grade']; ?>">Back</a></label></h1>
</div> 

<!-- Metro Tiles - START -->


<div class="container dynamicTile">
    <div class="row">
<?php
$grade=$_GET['grade'];
$subject=$_GET['subject'];
$emei=$_SESSION['device_emei'];
$i=0;
 //echo substr(str_replace(".mp4","",$row1['name']),6);
	$sql="SELECT * FROM ngschool.uploads where grade='$grade' and subject='$subject';";
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

                <div class="carousel slide" ><a href="purchase.php?id=<?php echo $row['video_id'].'&'.$_SERVER["QUERY_STRING"];?>" onclick="openAndroidDialog('<?php echo $row['video_id'].','. $row['name'];?>');">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" >
                        <div class="item active text-center">
                            <div>
                                <span <?php
                                      
                                   if (in_array($row['video_id'], $downloaded)) {
    echo 'class="fa  fa fa-download bigicon"';
}   else{
    echo 'class="fa  fa-cloud-download bigicon"';                               
                                   }
                                      
                                      ?> ></span>
                            </div>
                            <div class="icontext" <?php  if(strlen ($row['contain'] )> 12 ){ echo 'style="font-size: 20px;"'; };?>>
                                <?php  echo $row['contain'];?>
                            </div>
                            <div class="icontext"<?php  if(strlen ($subject)> 12 ){ echo 'style="font-size: 16px;"'; };?>>
                                <?php echo $subject; ?>
                            </div>
                        </div>
                    </div></a>
                    </div>

            </div>
        </div>
<?php 
}
}else{
echo '<lable style="color:blue;">Currently No Subject Available for Downloads</lable>';
}
        ?>
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

<!-- Metro Tiles - END -->

</div>

</body>
</html>
						<?php endif; ?>