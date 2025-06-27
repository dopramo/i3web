<?php
include_once 'db.php';
include_once 'db_connect.php';

$error_msg = "";
if (isset($_POST['usertitle'], $_POST['username'], $_POST['usercategory'], $_POST['usersubcategory'], $_POST['deviceemei'], $_POST['email'], $_POST['deviceid'], $_POST['confirmdeviceid'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $usertitle = filter_input(INPUT_POST, 'usertitle', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $usercategory = filter_input(INPUT_POST, 'usercategory', FILTER_SANITIZE_STRING);
    $usersubcategory = filter_input(INPUT_POST, 'usersubcategory', FILTER_SANITIZE_STRING);
    $deviceemei = filter_input(INPUT_POST, 'deviceemei', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
 
    $deviceid = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
  
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT user_id FROM users WHERE device_emei = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 echo $deviceemei;
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $deviceemei);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this emei number already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    // check existing username
/*    $prep_stmt = "SELECT id FROM members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }
 */
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $deviceid = hash('sha512', $deviceid . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (`user_title`, `user_name`, `user_email`, `user_category`, `user_sub_category`, `device_emei`, `device_id`, `salt`, `date_created`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, now())")) {
            $insert_stmt->bind_param('ssssssss', $usertitle, $username, $email, $usercategory, $usersubcategory, $deviceemei , $deviceid, $random_salt);
            
            
            
            
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}