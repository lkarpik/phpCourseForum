<?php require('core/init.php');?>

<?php
// Create new topic object
$topic = new Topic;

// Get id from URL
$topic_id = $_GET['id'];

// Process Replay
if (isset($_POST['do_reply'])) {
    // Data array
    $data = array();
    $data['topic_id'] = $_GET['id'];
    $data['body'] = $_POST['body'];
    $data['user_id'] = $_SESSION['user_id'];
    // Validate
    $validate = new Validator;

    $field_array = array('body');

    if($validate->isRequired($field_array)) {
        // Register reply
        if($topic->reply($data)) {
            redirect('topic.php?id='.$topic_id, 'Replay posted', 'sucess');
        } else {
            redirect('topic.php?id='.$topic_id, 'Something wrong eith replay', 'error');
        }
    } else {
        redirect('topic.php?id='.$topic_id, 'Fill all fields', 'error');
    }
} 

// Get template 
$template = new Template('templates/topic_reply.php');

// Assign variables
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;
$template->topicsCount = $topic->getTotalTopics();
// Display template
echo $template;