<?php require('core/init.php');?>

<?php
// Create new topic object
$topic = new Topic;
// Get template 
$template = new Template('templates/frontpage.php');
// Assign variables to template object
$template->topics = $topic->getAllTopic();
$template->usersCount = $topic->getTotalUsers();
$template->topicsCount = $topic->getTotalTopics();
$template->catCount = $topic->getTotalCat();
// Display template
echo $template;
