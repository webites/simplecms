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
        $theme = fopen(SITE_URL . "/theme/theme.json", "r") or die("Unable to open file!");
        var_dump(json_decode($theme, true));
    }
}
