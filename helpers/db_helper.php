<?php
/*
* Numer of replies for topic_id
*/
function replyCount($topic_id) {
    $db = new Database;
    $db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
    $db->bind(':topic_id', $topic_id);
    // Assign rows
    $rows = $db->resultset();
    // Get row count 
    return $db->rowCount();
}
/*
* Get categories
*/
function getCategories() {
    $db = new Database;
    $db->query("SELECT * FROM categories");
    
    
    $result= $db->resultset();
    
    return $result;
}
// Get numeber of topics by category ID
function countByCategory($category_id) {
    $db = new Database;
    $db -> query("SELECT * FROM topics 
                        INNER JOIN categories
                        ON topics.category_id = categories.id
                        WHERE topics.category_id = :category_id ");
    $db->bind(':category_id', $category_id);
    $row = $db->resultset();
    return $db->rowCount();
}
// User posts
function userPostCount($user_id) {
    $db = new Database;
    
    $db->query('SELECT * FROM topics WHERE user_id = :id');
    $db->bind(':id', $user_id);
    $rows = $db->resultset();
    $topic_count = $db->rowCount();
    
    $db->query('SELECT * FROM replies WHERE user_id = :id');
    $db->bind(':id', $user_id);
    $rows = $db->resultset();
    $replies_count = $db->rowCount();

    return ($topic_count + $replies_count);
}