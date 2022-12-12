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
        $theme_file = file_get_contents(SITE_URL . "/theme/theme.json");
        $theme_data = json_decode($theme_file, true);
        $this->name = $theme_data['name'];
        $this->version = $theme_data['version'];
        $this->author = $theme_data['author'];
        $this->url = $theme_data['url'];
        $this->description = $theme_data['description'];
    }
}
