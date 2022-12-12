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
        $theme = file_get_contents(SITE_URL . "/theme/theme.json");
        return json_decode($theme, true);
    }
}
