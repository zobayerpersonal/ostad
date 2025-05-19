<?php
$tasks = json_decode(file_get_contents('tasks.json'), true) ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty(trim($_POST['task']))) {
        $tasks[] = ['text' => htmlspecialchars($_POST['task']), 'done' => false];
    } elseif (isset($_POST['toggle'])) {
        $tasks[$_POST['toggle']]['done'] = !$tasks[$_POST['toggle']]['done'];
    } elseif (isset($_POST['delete'])) {
        unset($tasks[$_POST['delete']]);
        $tasks = array_values($tasks);
    }
    file_put_contents('tasks.json', json_encode($tasks, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do App</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form method="POST">
        <input type="text" name="task" placeholder="Add task">
        <button type="submit">Add</button>
    </form>
    <ul>
        <?php foreach ($tasks as $index => $task): ?>
            <li>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="toggle" value="<?= $index ?>">
                    <button type="submit"><?= $task['done'] ? '<s>'.$task['text'].'</s>' : $task['text']; ?></button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="delete" value="<?= $index ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>