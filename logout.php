<?php

include ('core/init.php');

if(isset($_POST['do_logout'])) {
    // User object
    $user = new User;

    if ($user->logout()) {
        redirect('index.php', 'Logged out!', 'success');
    } else {
        redirect('index.php');
    }

}