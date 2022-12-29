<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir('./modules');
        var_dump($modules);
    }
}
