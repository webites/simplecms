<?php $username = $auth->getUsername();

use Simple\Core\Page;
use Simple\Core\Pages;
use Simple\Core\Site;
use Simple\Core\Theme;
use Simple\Modules\Manager;

$site = new Site();
$site = $site->getSiteGlobal();

$sign = substr($username, 0, 1);
?>
<?php $module = Manager::moduleOptions($name); ?>
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
                    <h2>Module - <?php echo $module->label ?></h2>
                </div>
                <?php display_notification(); ?>



            </div>

            <script src="<?php SITE_URL ?>/admin/assets/node_modules/bootstrap/js/src/scrollspy.js"></script>
            <script src="<?php echo SITE_URL ?>/admin/assets/js/notify/script.js"></script>

</body>

</html>