<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All users</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<?php
spl_autoload_extensions(".php");
spl_autoload_register();

use yasmf\HttpHelper;

?>

<h1>All Users</h1>

<form action="index.php" method="get">
    Start with letter:
    <input name="start_letter" type="text" value="<?php echo HttpHelper::getParam('start_letter') ?>">
    and status is:
    <select name="status_id">
        <option value="1" <?php if (HttpHelper::getParam('status_id') == 1) echo 'selected' ?>>Waiting for account validation</option>
        <option value="2" <?php if ((HttpHelper::getParam('status_id') == 2) || (HttpHelper::getParam('status_id') == null)) echo 'selected' ?>>Active account</option>
        <option value="3" <?php if (HttpHelper::getParam('status_id') == 3) echo 'selected' ?>>Waiting for account deletion</option>
    </select>
    <input type="submit" value="OK">
</form>


<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php while ($row = $searchStmt->fetch()) { ?>
        <tr>
            <td><?php echo $row['user_id'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['status'] ?></td>
        </tr>
    <?php } ?>
</table>



</body>
</html>