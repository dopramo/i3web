<?php
include_once 'db.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

function login($deviceemei, $deviceid, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT user_id, user_name, device_id, salt 
        FROM users
       WHERE device_emei = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $deviceemei);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_deviceid, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $deviceid = hash('sha512', $deviceid . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_deviceid == $deviceid) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['device_emei'] = $deviceemei;
                    $_SESSION['login_string'] = hash('sha512', 
                              $deviceid . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
        if ($stmt = $mysqli->prepare("SELECT device_id 
                                      FROM users 
                                      WHERE user_id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function downlodlession($device_emei, $video_id, $mysqli) {   
    // Using prepared statements means that SQL injection is not possible. 
         if ($insert_stmt = $mysqli->prepare("INSERT INTO `ngschool`.`purchases` (`device_emei`, `video_id`, `date_purchased`) VALUES (?, ?,now());
")) {
            $insert_stmt->bind_param('si', $device_emei, $video_id);
            
            
            
            
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                return false;
            }
        }
        return true;
    
}

function uploadlession($grade, $subject, $contain, $final_file, $file_type, $new_size, $mysqli) {   
    // Using prepared statements means that SQL injection is not possible. 
    if ($insert_stmt = $mysqli->prepare("INSERT INTO `ngschool`.`uploads` (`grade`, `subject`, `contain`, `name`, `type`, `size`, `date_uploaded`) VALUES (?,?, ?, ?, ?, ?,now());
")) {
        $insert_stmt->bind_param('ssssss', $grade, $subject, $contain, $final_file, $file_type, $new_size);
        // Execute the prepared query.
        if (! $insert_stmt->execute()) {
             return false;
            }
        }
        return true;
}

function checkpurchased($device_emei, $video_id, $mysqli) {
        if ($stmt = $mysqli->prepare("SELECT device_emei, video_id FROM ngschool.purchases where device_emei =? and video_id= ?;")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('ss', $device_emei,$video_id );
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows > 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($db_emei,$db_video_id);
                $stmt->fetch();
                if($device_emei == $db_emei && $video_id == $db_video_id){
               return true;
			   //return false;
                }else{
                return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    }


