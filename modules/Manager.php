<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir('./modules');
        $current_modules = [];
        foreach ($modules as $module) {
            if (!str_contains($module, '.') || !str_contains($module, '..')) {
                // $current_modules .= $module;
                array_push($current_modules, $module);
            }
        }
        var_dump($current_modules);
    }
}
