<?php $username = $auth->getUsername();

use Simple\Core\Page;
use Simple\Core\Pages;
use Simple\Core\Theme;

$sign = substr($username, 0, 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
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
                    <i class="bi bi-grid-3x3-gap"></i>
                    <h2>Dashboard</h2>
                </div>

                <?php $pages = new Pages();
                $all = $pages->getLimit(5);
                if ($all) { ?>

                    <div class="dashboard__info__items">
                        <div class="dashboard__info__item">
                            <h3>Pages</h3>
                            <table class="table">
                                <tbody>
                                    <?php foreach ($all as $item) { ?>

                                        <tr>
                                            <td><?php echo $item['title'] ?></td>
                                            <td>/<?php echo $item['slug'] ?></td>
                                            <td>
                                                <a href="<?php echo SITE_URL ?>/admin/pages/edit/<?php echo $item['id'] ?>">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <a href="/admin/pages" class="dashboard__info__item__add--little">
                                <i class="bi bi-list-check"></i>
                                <span>See all</span>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="dashboard__info__item">
                        <h3>Menus</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Mobile</td>
                                    <td>3 items</td>
                                    <td><i class="bi bi-pencil-fill"></i></td>
                                </tr>
                                <tr>
                                    <td>Primary</td>
                                    <td>5 items</td>
                                    <td><i class="bi bi-pencil-fill"></i></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="dashboard__info__item__add--little">
                            <i class="bi bi-plus-circle"></i>
                            <span>Add new menu</span>
                        </div>
                    </div>
                    </div>

                    <div class="dashboard__info__item">
                        <?php $theme = new Theme(); ?>
                        <h3>Theme</h3>
                        <ul>
                            <?php
                            if ($theme->name) {
                                echo "<li><h4>Name: " . $theme->name . "</h4></li>";
                            }
                            if ($theme->description) {
                                echo "<li><h4>Description: " . $theme->description . "</h4></li>";
                            }
                            if ($theme->version) {
                                echo "<li><h4>Version: " . $theme->version . "</h4></li>";
                            }
                            if ($theme->author) {
                                echo "<li><h4>Author: " . $theme->author . "</h4></li>";
                            }

                            if ($theme->url) {
                                echo "<li><h4>Url: <a href='" . $theme->url . "'> " . $theme->url . "</a></h4></li>";
                            }
                            ?>
                        </ul>
                    </div>



            </div>
        </div>
    </div>
</body>

</html>