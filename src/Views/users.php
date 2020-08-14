<?php

namespace ProjectPhp\Views;

use ProjectPhp\Models\User;
use ProjectPhp\Services\View;

/** @var User[] $users */
$users = View::getData()['users'];


?>
<?php View::includePartialTemplate(View::HEADER_TEMPLATE_ALIAS); ?>
<?php View::includePartialTemplate(View::MENU_TEMPLATE_ALIAS); ?>
<h3 align="center">Таблица пользователей</h3>
<table class="table bg-light" border="3" align="center" style="height:80px">
    <thead class="thead-dark">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td><?= $user->getFirstName() ?>
            <td><?= $user->getLastName() ?>
            <td><?= $user->getEmail() ?>
            <td><?= $user->getPhone() ?>
            <td><?= $user->getPassword() ?>
            <td>
                <button type="button" class="btn btn-primary" id="view">View</button>
                <button type="button" class="btn btn-danger delete-user" data-id="<?= $user->getId() ?>">Delete</button>
        </tr>
    <?php } ?>
</table>
<?php View::includePartialTemplate(View::PAGINATION_TEMPLATE_ALIAS); ?>
<script src="/src/Views/Resources/JS/delete-user.js"></script>
<?php View::includePartialTemplate(View::FOOTER_TEMPLATE_ALIAS); ?>
