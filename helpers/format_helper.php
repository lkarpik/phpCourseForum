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
        if ($category == null) {
            return 'bg-dark text-light'; 
        }
}