<?php

namespace Simple\Core;

class Theme
{

    public $name;
    public $version;
    public $author;
    public $url;
    public $description;

    public function __construct()
    {
        $theme_file = fopen(SITE_URL . "/theme/theme.json", "r") or die("Unable to open file!");
        $theme = fread($theme_file, filesize($theme_file));
        var_dump(json_decode($theme, true));
    }
}
