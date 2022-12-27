<?php $username = $auth->getUsername();

use Simple\Core\Page;
use Simple\Core\Pages;

$sign = substr($username, 0, 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pages</title>
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/admin/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/admin/assets/node_modules/bootstrap-icons/font/bootstrap-icons.css" />
</head>

<body>
    <div class="dashboard">
        <div class="dashboard__topbar">
            <div class="dashboard__title">
                <i class="bi bi-grid-3x3-gap"></i>
                <h1>Dashboard</h1>
            </div>
            <div class="dashboard__topbar__user">
                <span class="dashboard__topbar__user__signature"><?php echo $sign ?></span>
                <?php require_once('templates/user_menu.php') ?>
            </div>
        </div>
        <div class="dashboard__main">
            <div class="dashboard__menu">
                <?php require_once('templates/sidebar_menu.php') ?>
            </div>
            <div class="dashboard__info">
                <div class="dashboard__info__title">
                    <i class="bi bi-journal"></i>
                    <h2>Pages</h2>
                    <?php
                    global $hooks;
                    $hooks->do_action('notifications');
                    ?>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Page title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $pages = new Pages();
                        $all_pages = $pages->getAll();

                        foreach ($all_pages as $page) { ?>
                            <tr>
                                <th scope="row"><?php echo $page['id'] ?></th>
                                <td>
                                    <h4><a href="<?php echo SITE_URL ?>/admin/pages/edit/<?php echo $page['id'] ?>"> <?php echo $page['title'] ?></h4></a>
                                </td>
                                <td>/<?php echo $page['slug'] ?></td>
                                <td>
                                    <a href="<?php echo SITE_URL . "/" . $page['slug'] ?>" target="_blank" class="pages__actions__button pages__actions__button--watch">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?php echo SITE_URL ?>/admin/pages/edit/<?php echo $page['id'] ?>" class="pages__actions__button pages__actions__button--edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="#" class="pages__actions__button pages__actions__button--delete">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="./pages/add-new" class="dashboard__info__item__add--little">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add new page</span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>