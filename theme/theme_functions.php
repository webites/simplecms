<?php

use Simple\Core\Page;
use voku\helper\Hooks;

$hooks = Hooks::getInstance();
$hooks->add_action('simple_header', 'echo_this_in_header');

function echo_this_in_header($pageId)
{
    echo "Title";
}
