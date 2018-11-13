<?php require('core/init.php');?>

<?php
// Create new topic object
$topic = new Topic;

// Get category from URL
$category = isset($_GET['category_id']) ? $_GET['category_id'] : null; 
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null; 

// Get template 
$template = new Template('templates/topics.php');

// Assign variables
$template->topics = $topic->getAllTopic();
$template->usersCount = $topic->getTotalUsers();
$template->topicsCount = $topic->getTotalTopics();
$template->catCount = $topic->getTotalCat();
if(isset($category)) {
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts in "'.$topic->getCategory($category)->name.'" category';
}
if(isset($user_id)) {
    $template->topics = $topic->getByUser($user_id);
    $template->title = 'Posts by '.$topic->getUser($user_id)->username;
}

// Display template
echo $template;