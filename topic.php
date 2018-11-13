<?php require('core/init.php');?>

<?php
// Create new topic object
$topic = new Topic;

// Get id from URL
$topic_id = $_GET['id'];

// Get template 
$template = new Template('templates/topic_reply.php');

// Assign variables
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;
$template->topicsCount = $topic->getTotalTopics();
// Display template
echo $template;