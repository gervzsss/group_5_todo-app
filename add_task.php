<?php
require_once 'config.php';

if (isset($_POST['add'])) {
    if ($_POST['task'] != "") {
        $task = $_POST['task'];

        $addtasks = pg_query($db, "INSERT INTO task (task, status) VALUES ('$task', 'Pending')");

        if (!$addtasks) {
            die("Error in SQL query: " . pg_last_error($db));
        }

        header('Location: index.php');
    }
}
?>