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
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

</head>

<body>
    <div class="dashboard">
        <div class="dashboard__topbar">
            <div class="dashboard__title">

                <h1>Pages</h1>
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
                    <h2>New Page</h2>
                </div>

                <form action="./adding" method="post" class="d-flex flex-column justify-content-center gap-4">
                    <?php set_csrf() ?>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title">
                    <label for="slug">Slug (without / )</label>
                    <input type="text" name="slug" id="slug">
                    <label for="exceprt">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" cols="60" rows="10">Excerpt</textarea>
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="60" rows="10">Content</textarea>
                    <input type="submit" value="Create" class="btn btn-primary py-3 px-5 w-25">
                </form>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>

    <script>
        var editor = new FroalaEditor('#content', {
            fileUploadURL: '/images'
        });
    </script>
</body>

</html>