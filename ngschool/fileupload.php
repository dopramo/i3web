<!DOCTYPE html>
<?php
require_once('js/gradesubject.js');
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>NGS LANKA | ADMIN PANAL</title>
		<meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way" />
		<meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file" />
		<meta name="author" content="Osvaldas Valutis for Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<style type="text/css"> 
.styled-button-10 {
	background:#CC3333;
	background:-moz-linear-gradient(top,#CC3333 0%,#CC3333 100%);
	background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#CC3333),color-stop(100%,#CC3333));
	background:-webkit-linear-gradient(top,#CC3333 0%,#CC3333 100%);
	background:-o-linear-gradient(top,#CC3333 0%,#CC3333 100%);
	background:-ms-linear-gradient(top,#CC3333 0%,#CC3333 100%);
	background:linear-gradient(top,#CC3333 0%,#CC3333 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#CC3333', endColorstr='#CC3333',GradientType=0);
	padding:10px 50px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:16px;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border:1px solid #CC3333
}
.textbox{
background: #ccc;
color: #CC6666;
width: 250px;
padding: 6px 15px 6px 35px;
transition: 100ms all ease;
border: 1px solid #ccc;
}
.textbox:hover
{
box-shadow: 6px 7px 0px rgba(204, 211, 51, 0.38),
-11px -14px 0px rgba(241, 96, 0, 0.28),
18px -24px 0px rgba(0, 0, 0, 0.34),
33px -6px 0px rgba(39, 74, 214, 0.28);
}
</style>
		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
	<body>
	<form action="upload.php" method="post" align = "center" enctype="multipart/form-data">
		<div class="container">
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="fileupload.php" title="Refresh"><span>Refresh</span></a>
					<a class="codrops-icon codrops-icon--drop" href="view.php" title="View The Records"><span>View The Records</span></a>
				</div>
				<h1>ADMIN PANAL</h1>
				<p>Designed By: <strong><a href="http://www.ngslanka.com/ngs/">NEXT GENERATION SERVICE</a></strong></p>	
			<div><label>Select Grade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type Contain</label></div><br>
			
	<select id="country" name = "grade" class = "textbox" name="country"></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select class = "textbox" id="state" name = "subject"></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input id="contain" class ="textbox" type="text" name = "contain" placeholder="Contain" />
		<br>&nbsp;

			<div class="content">
			<div class="box">
	<!--		

	<?php
/*
    require_once('dbconfig.php');

    echo '<tr>
    <td>';

    $service_select = "SELECT id, class FROM media.grade";
    $service_select_result = mysqli_query($link,$service_select);
    if($service_select_result){
        echo '<form name="e_book" action="upload.php" align = "center" method="post" ><select name="id"><option selected disabled>Please Select</option>';
        while($service_select_row = mysqli_fetch_array($service_select_result)){
            echo '<option value="'
                . $service_select_row['id']
                .'">'
                . $service_select_row['class']
                .'</option>';
        }
        echo '</select>';
    }

    echo '</td>';
*/
?>-->
					<input type="file" name="name" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
					
					<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file&hellip;</span></label>
	<br>
	<button type="submit" class= "styled-button-10" name="btn-upload" value="btn-upload">upload</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
	}
	?>
</div></header>
				</div>

			
			
			</div>
	
		</div><!-- /container -->

		<script src="js/custom-file-input.js"></script>
  <script language="javascript">
        populateCountries("country", "state");
           
        </script>
		<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

	</body>
</html>
