<?php require('core/init.php');?>

<?php
$topic = new Topic;
$user = new User;
$validate = new Validator;

if (isset($_POST['register'])) {
    // Create data array
    $data = array();
    $data['name'] = $_POST['name']; 
    $data['email'] = $_POST['email']; 
    $data['username'] = $_POST['username']; 
    $data['password'] = md5($_POST['password']); 
    $data['password2'] = md5($_POST['password2']); 
    $data['about'] = $_POST['about']; 
    $data['last_activity'] = date("Y-m-d H:i:s"); 

    // require fields array
    $field_array = array('name', 'email', 'username', 'password', 'password2');

    if ($validate->isRequired($field_array)) {
        if ($validate->isValidEmail($data['email'])) {
            if ($validate->passMatch($data['password'], $data['password2'])) {
                if (!empty($_FILES['userfile'])) {
                    $user->uploadAvatar();
                    $data['avatar'] = $_FILES['avatar']['name'];
                } else {
                    $data['avatar'] = 'gravatar.jpg';
                }
            
                // Register User
                if ($user->register($data)) {
                    redirect('index.php', 'You can log in', 'success');
                } else {
                    redirect('index.php', 'Something wrong with register', 'error');
                }
            } else {
                redirect('register.php', 'Password did not match', 'error');
            }
        } else {
            redirect('register.php', 'Not valid email', 'error');
        }
    } else {
        redirect('register.php', 'All fields are required', 'error');
    }

/*
    // Upload avatar
    if (!empty($_FILES['userfile'])) {
        $user->uploadAvatar();
        $data['avatar'] = $_FILES['avatar']['name'];
    } else {
        $data['avatar'] = 'gravatar.jpg';
    }

    // Register User
    if ($user->register($data)) {
        redirect('index.php', 'You can log in', 'success');
    } else {
        redirect('index.php', 'Something wrong with register', 'error');
    }
*/
}

// Get template 
$template = new Template('templates/register.php');
// Assign variables
$template->topicsCount = $topic->getTotalTopics();



// Display template
echo $template;