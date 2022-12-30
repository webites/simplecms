<?php

use Simple\Core\Page;
use voku\helper\Hooks;

$hooks = Hooks::getInstance();
$hooks->add_action('simple_header', 'echo_this_in_header');

function echo_this_in_header()
{
    global $page;
    echo $page['title'];
}

//$hooks->add_action('head_section', 'make_alert');

function make_alert()
{
    echo '<script>alert("dziala")</script>';
}
