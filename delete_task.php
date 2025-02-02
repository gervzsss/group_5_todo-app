<?php
require_once 'config.php';

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];

    $task_id = (int) $task_id;

    $deletingtasks = pg_query($db, "DELETE FROM task WHERE task_id = $task_id");

    if (!$deletingtasks) {
        die("Error in SQL query: " . pg_last_error($db));
    }

    header("Location: index.php");
}
?>