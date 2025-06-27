<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
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

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
	<body>
		<div class="container">
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="fileupload.php" title="Previous Demo"><span>Move To Front</span></a>
					<a class="codrops-icon codrops-icon--drop" href="view.php" title="Refresh"><span>Refresh</span></a>
				</div>
				<h1>ADMIN PANAL</h1>
				<p>Designed By: <strong><a href="http://ngslanka.com">NEXT GENERATION SERVICE</a></strong></p>
				<p>your uploads...<strong><a href="fileupload.php">upload new files...</strong></p>
			
			<div class="content">

		
	
<body>
<div id="body">
	<table width="120%" border="1" >
    <tr align = "left">
	<td>Grade</td>
	<td>Subject</td>
	<td>Contain</td>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
	$sql="SELECT * FROM ngschool.uploads";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
        <tr align = "left">
		<td><?php echo $row['grade'] ?></td>
		<td><?php echo $row['subject'] ?></td>
		<td><?php echo $row['contain'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['name'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
                                         }
}
	?>
    </table>
    
</div></header>



</body>
</html>