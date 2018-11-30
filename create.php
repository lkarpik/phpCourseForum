<?php require('core/init.php');?>

<?php
$topic = new Topic;

if(isset($_POST['do_create'])) {
    // create data array
    $validate = new Validator;
    $data = array();
    $data['title'] = $_POST['title']; 
    $data['body'] = $_POST['body']; 
    $data['category_id'] = $_POST['category']; 
    $data['user_id'] =  $_SESSION['user_id']; 
    $data['last_activity'] = date("Y-m-d H:i:s"); 

    // Required fields
    $field_array = array ('title', 'body', 'category');

    if($validate->isRequired($field_array)) {
        if($topic->create($data)) {
            redirect('index.php', 'Topic posted', 'success');
        } else {
            redirect('create.php', 'Something went wrong', 'error');
        }
    } else {
        redirect('create.php', 'Fill in all required fields', 'error');
    }
}


// Get template 
$template = new Template('templates/create.php');
// Assign variables
$template->topicsCount = $topic->getTotalTopics();
$template->catCount = $topic->getTotalCat();

// Display template
echo $template;