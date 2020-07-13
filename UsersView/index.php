
<?php
require_once 'D:\Program Files\OSPanel\domains\myProject\UsersController\ControllerUsers.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="users">
    <table border="1" align="center">
        <caption>Таблица пользователей</caption>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php foreach($response as $value)
            {?>
            <tr><td><?php echo $value[0]?>
                <td><?php echo $value[1]?>
                <td><?php echo $value[2]?>
                <td><?php echo $value[3]?>
                <td><?php echo $value[4]?>
                <td><input type="submit" value="View"/><input type="submit" value="Delete"/>
            </tr>
        <?php }?>
    </table>
</div>
</body>
</html>