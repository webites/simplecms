<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir('./modules');
        $current_modules = [];
        foreach ($modules as $module) {
            if (str_contains($module, '.') === false || str_contains($module, '..') === false) {
                $current_modules .= $module;
            }
        }
        var_dump($current_modules);
    }
}
