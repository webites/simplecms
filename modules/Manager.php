<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir(SITE_URL . '/modules');
        var_dump($modules);
    }
}
