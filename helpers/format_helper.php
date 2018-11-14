<?php 
function formatDate ($date) {
    $date = date("jS F Y", strtotime($date));
    return $date;
}
// Add class 'active' for active category
function is_active($category) {
    if (isset($_GET['category_id'])) {
        if ($_GET['category_id'] == $category){
            return 'bg-dark text-light';
        } else {
            return '';
        }
    } else 
        if (!isset($use_id) && $category == null && basename($_SERVER["REQUEST_URI"], ".php") == 'topics') {
            return 'bg-dark text-light'; 
        }
}

// Add class 'active' for active navbar
function is_activeNav($link) {
    if($link == basename($_SERVER["REQUEST_URI"], ".php")) {
        return "active";
    } else {
        return "";
    }
}