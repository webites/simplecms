<?php $username = $auth->getUsername();

use Simple\Core\Page;
use Simple\Core\Pages;
use Simple\Core\Site;
use Simple\Core\Theme;

$site = new Site();
$site = $site->getSiteGlobal();

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
                <div class="row">
                    <div class="col-4">
                        <div id="simple-list-example" class="d-flex flex-column gap-2 simple-list-example-scrollspy text-center">
                            <a class="p-1 rounded" href="#basic_info">Basic site info</a>
                            <a class="p-1 rounded" href="#simple-list-item-2">Item 2</a>
                            <a class="p-1 rounded" href="#simple-list-item-3">Item 3</a>
                            <a class="p-1 rounded" href="#simple-list-item-4">Item 4</a>
                            <a class="p-1 rounded" href="#simple-list-item-5">Item 5</a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <form action="<?php SITE_URL ?>/admin/global-update"></form>
                            <h4 id="simple-list-item-1">Basic site info</h4>
                            <?php
                            foreach ($site as $item => $value) {
                                echo $item . " : " . $value . "\n";
                            }
                            ?>
                            <h4 id="simple-list-item-2">Item 2</h4>
                            <p>...</p>
                            <h4 id="simple-list-item-3">Item 3</h4>
                            <p>...</p>
                            <h4 id="simple-list-item-4">Item 4</h4>
                            <p>...</p>
                            <h4 id="simple-list-item-5">Item 5</h4>
                            <p>...</p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?php SITE_URL ?>/admin/assets/node_modules/bootstrap/js/src/scrollspy.js"></script>
</body>

</html>