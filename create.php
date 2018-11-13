<?php require('core/init.php');?>

<?php
$topic = new Topic;
// Get template 
$template = new Template('templates/create.php');
// Assign variables
$template->topicsCount = $topic->getTotalTopics();
$template->catCount = $topic->getTotalCat();
// Display template
echo $template;