<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo SITE_URL ?>/admin/assets/css/bootstrap.min.css" />
    <title><?php $hooks->do_action('simple_header'); ?></title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <?php $site->theLogo(); ?>
                <h6><?php echo $site->site_name; ?></h6>
            </div>
            <div class="col-12 col-lg-7">
                <ul class="d-flex justify-content-center">
                    <li><a href="#">O nas</a></li>
                    <li><a href="#">Oferta</a></li>
                    <li><a href="#">Galeria</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </div>