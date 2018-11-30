<?php
class Topic {
    // Init DB Variables
    private $db;

    // Constructor 
    public function __construct() {
        $this->db = new Database;
    }

    // Get all  topics
    public function getAllTopic() {
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics 
                            INNER JOIN users
                            ON topics.user_id = users.id
                            INNER JOIN categories
                            ON topics.category_id = categories.id
                            ORDER BY topics.create_date DESC");
        // Assign result set
        $results = $this->db->resultset();

        return $results;
    }
    // Get topics by category ID
    public function getByCategory($category_id) {
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name
                            FROM topics 
                            INNER JOIN users
                            ON topics.user_id = users.id
                            INNER JOIN categories
                            ON topics.category_id = categories.id
                            WHERE topics.category_id = :category_id
                            ORDER BY topics.create_date DESC");
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->resultset();
        return $row;
    }

    // Get total number of users
    public function getTotalUsers(){
        $this->db->query('SELECT * FROM users');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    // Get total numer of topics
    public function getTotalTopics(){
        $this->db->query('SELECT * FROM topics');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    // Get total numer of categories
    public function getTotalCat(){
        $this->db->query('SELECT * FROM categories');
        $rows = $this->db->resultset();
        return $this->db->rowCount();
    }
    // Get category name from ID
    public function getCategory($category_id) {
        $this->db->query("SELECT * FROM categories WHERE id = :category_id ");
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->single();
        return $row;
    }
    // Get user name from ID
    public function getUser($user_id) {
        $this->db->query("SELECT * FROM users WHERE id = :user_id ");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
        return $row;
    }
    // Get topic by id
    public function getTopic ($topic_id) {
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name
        FROM topics 
        INNER JOIN users
        ON topics.user_id = users.id
        INNER JOIN categories
        ON topics.category_id = categories.id
        WHERE topics.id = :id");
        
        $this->db->bind(':id', $topic_id);

        $row = $this->db->single();
        
        return $row;    
    }
    // Get replies by topic id
    public function getReplies($topic_id) {
        $this->db->query("SELECT replies.*, users.* FROM replies
                            INNER JOIN users
                            ON replies.user_id = users.id
                            WHERE replies.topic_id = :id
                            ORDER BY create_date ASC");
        $this->db->bind(':id', $topic_id);
        $results = $this->db->resultset();
        return $results;

    }
    public function getByUser($user_id) {
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.name
                            FROM topics 
                            INNER JOIN users
                            ON topics.user_id = users.id
                            INNER JOIN categories
                            ON topics.category_id = categories.id
                            WHERE topics.user_id = :user_id
                            ORDER BY topics.create_date DESC");
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->resultset();
        return $row;
    }
    public function create($data){
        // Insert query
        $this->db->query("INSERT INTO topics (category_id, user_id, title, body, last_activity)
                            VALUES (:category_id, :user_id, :title, :body, :last_activity)");
        // Bind Values
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':last_activity', $data['last_activity']);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function reply ($data) {
        // insert query 
        $this->db->query("INSERT INTO replies (topic_id, user_id, body)                     VALUES (:topic_id, :user_id, :body)");
        $this->db->bind(':topic_id', $data['topic_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}