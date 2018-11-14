<?php
class User {
    // Upload avatar
    public function uploadAvatar() {
        $allowedExt = array('gif', 'jpg', 'png');
        $temp = explode('.', $_FILES['avatar']['name']);
        $extensions = end($temp);
    
    if ((($_FILES['avatar']['type'] =="image/gif")
            || ($_FILES['avatar']['type'] =="image/jpeg")
            || ($_FILES['avatar']['type'] =="image/jpg")
            || ($_FILES['avatar']['type'] =="image/pjpeg")
            || ($_FILES['avatar']['type'] =="image/x-png")
            || ($_FILES['avatar']['type'] =="image/png"))
            && ($_FILES['avatar']['size'] < 20000)
            && in_array($extensions, $allowedExt))  {
            
            if($_FILES['avatar']['error'] > 0) {
                redirect('register.php', $_FILES['avatar']['error'], 'error');
            } else {
                if (file_exists('images/avatars/'.$_FILES['avatar']['name'])) {
                    redirect('register.php', 'File exist', 'error');
                } else {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], 'img/'.$_FILES['avatar']['name']);
                    return true;
                }
            }
        } else {
            redirect('register.php', 'Wrong file type', 'error');
        }
    }
}