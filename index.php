<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <nav>
    <a class="heading" href="#">ToDo App</a>
  </nav>

  <div class="container">
    <div class="input-area">
      <form method="POST" action="add_task.php">
        <input type="text" name="task" placeholder="Write your tasks here..." required />
        <button class="btn" name="add">Add Task</button>
      </form>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tasks</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require 'config.php';

        $stmt = $db->prepare("SELECT * FROM `task` ORDER BY `task_id` ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $count = 1;

        while ($fetch = $result->fetch_assoc()) {
        ?>
          <tr class="border-bottom">
            <td><?php echo $count++; ?></td>
            <td><?php echo htmlspecialchars($fetch['task']); ?></td>
            <td><?php echo htmlspecialchars($fetch['status']); ?></td>
            <td class="action">
              <?php if ($fetch['status'] != "Done") { ?>
                <a href="update_task.php?task_id=<?php echo $fetch['task_id']; ?>" class="btn-completed">
                  &#10003;
                </a>
              <?php } ?>
              <a href="delete_task.php?task_id=<?php echo $fetch['task_id']; ?>" class="btn-remove">
                &#10005;
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>