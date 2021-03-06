<?php 
// redirect page

function redirect($page = FALSE, $message = NULL, $message_type = NULL) {
    if (is_string ($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
    // chceck for message
    if ($message != NULL) {
        // set message
        $_SESSION['message'] = $message;
    }
    // Type of message
    if ($message_type != NULL) {
        // Set message
        $_SESSION['message_type'] = $message_type;
    }
    // Redirect
    header ('location:'.$location);
    exit;
}
// Dispay message
function displayMessage() {
    if (!empty($_SESSION['message'])) {
        // Assign message variable
        $message = $_SESSION['message'];

        if(!empty($_SESSION['message_type'])) {
            $message_type = $_SESSION['message_type'];
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">'.$message.'</div>';
            } else {
                echo '<div class="alert alert-success">'.$message.'</div>';
            }
        }
        // Unset message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);        
    } else {
        echo '';
    }
}
function isLoggedIn() {
    if (isset($_SESSION['is_logged_in'])) {
        return true;
    } else {
        return false;
    }
}