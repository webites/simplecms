<?php


namespace Simple\Modules;


class Manager
{

    static function getModules()
    {
        $modules = scandir('./modules');
        $current_modules = [];
        foreach ($modules as $module) {
            if (strpos($module, ".") === false && strpos($module, '..') === false) {
                array_push($current_modules, $module);
            }
        }
        return $current_modules;
    }

    static function moduleOptions($name)
    {
        $options = file_get_contents('modules/' . $name);
        var_dump($options);
    }
}
