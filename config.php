<?php

use voku\helper\Hooks;

const DB_DATABASE = 'adstudio_simplecms';
const DB_USER = 'adstudio_simplecms';
const DB_PASSWORD = 'x7q,g}iHp,0G';
const DB_HOST = 'localhost:3306';
const DB_CHARSET = 'utf8mb4_unicode_ci';


const SITE_URL = 'https://dev.simplecms.webites.dev';


$hooks = Hooks::getInstance();
$hooks->add_action('simple_header', 'echo_this_in_header');

function echo_this_in_header()
{
    echo "test";
}
