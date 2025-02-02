<?php
require_once 'config.php';

if (isset($_GET['task_id']) && $_GET['task_id'] != "") {
    $task_id = $_GET['task_id'];

    $task_id = (int) $task_id;

    $updatingtasks = pg_query($db, 
        "UPDATE task SET status = 'Done' WHERE task_id = $task_id");

    if (!$updatingtasks) {
        die("Error in SQL query: " . pg_last_error($db));
    }

    header('Location: index.php');
}
?>