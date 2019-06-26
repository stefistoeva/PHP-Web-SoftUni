<?php /** @var \App\Data\UserDTO[] $data */ ?>

<h1>All users</h1>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>BornOn</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($data as $userDTO): ?>
            <tr>
                <td><?= $userDTO->getId(); ?></td>
                <td><?= $userDTO->getUsername(); ?></td>
                <td><?= $userDTO->getFirstName() . " " . $userDTO->getLastName(); ?></td>
                <td><?= $userDTO->getBornOn(); ?></td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<br/>
Go back to <a href="profile.php">your profile</a>
