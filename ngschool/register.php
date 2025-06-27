<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>NGScool Registration </h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            User Title: <input type='text' 
                name='usertitle' 
                id='usertitle' /><br>
            User Name: <input type='text' 
                name='username' 
                id='username' /><br>
            Category: <input type='text' 
                name='usercategory' 
                id='usercategory' /><br>
            Subcategory: <input type='text' 
                name='usersubcategory' 
                id='usersubcategory' /><br>
            device EMEI: <input type='text' 
                name='deviceemei' 
                id='deviceemei' /><br>
            Email: <input type="text" name="email" id="email" /><br>
            Device ID: <input type="password"
                             name="deviceid" 
                             id="deviceid"/><br>
            Confirm Device ID: <input type="password" 
                                     name="confirmdeviceid" 
                                     id="confirmdeviceid" /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.usertitle,
                                   this.form.username,
                                   this.form.usercategory,
                                   this.form.usersubcategory,
                                   this.form.deviceemei,
                                   this.form.email,
                                   this.form.deviceid,
                                   this.form.confirmdeviceid);" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>