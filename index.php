<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("components/head.php") ?>
    <title>Document</title>
</head>

<body>
    <?php
    include_once("components/navbar.php");
    include_once("classes/connection/app.php");
    $app = new App();
    ?>
    <br>
    <div class="container">
        <div class="list-group">
            <?php
            $users = $app->get_users();
            if (count($users) > 0) {
                foreach ($users as $user) {
                    echo '
                    <a href="user_info.php?user_id=' . $user->id . '" class="list-group-item list-group-item-action">' . $user->name . ' ' . $user->surname . '</a>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>