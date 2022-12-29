<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir('./modules');
        $current_modules = [];
        foreach ($modules as $module) {
            if (strpos($module, ".") === false || strpos($module, '..') === false) {
                array_push($current_modules, $module);
            }
        }
        var_dump($current_modules);
    }
}
