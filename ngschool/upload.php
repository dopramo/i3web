<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
ini_set('max_execution_time', 300); //300 seconds = 5 minutes 
if(isset($_POST['btn-upload']))
{   
	$grade= $_POST['grade'];
	$subject= $_POST['subject'];
	$contain= $_POST['contain'];
	$name = rand(10000,90000)."-".$_FILES['name']['name'];
    $file_loc = $_FILES['name']['tmp_name'];
	$file_size = $_FILES['name']['size'];
	$file_type = $_FILES['name']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/102400;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($name);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file) && uploadlession($grade, $subject, $contain, $final_file, $file_type, $new_size, $mysqli))
	{
		?>
		<script>
		//alert('successfully uploaded');
        window.location.href='fileupload.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		//alert('error while uploading file');
        window.location.href='fileupload.php?fail';
        </script>
		<?php
	}
}
?>