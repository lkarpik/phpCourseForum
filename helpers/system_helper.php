<?php 
// redirect page

function redirect($page = FALSE, $message = null, $message_type = NULL) {
    if (is_string ($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
    // chceck for message
}