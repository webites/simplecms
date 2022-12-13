<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit674be5e104d6f55d25ba3e4b9f199723
{
    public static $files = array (
        'eca5f2e357e25d1287e415cbcdb6e7d4' => __DIR__ . '/../..' . '/config.php',
        'c6f95cc268de44579413ef0189b150c8' => __DIR__ . '/../..' . '/theme/theme_functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'voku\\helper\\' => 12,
        ),
        'S' => 
        array (
            'Simple\\Core\\' => 12,
        ),
        'D' => 
        array (
            'Delight\\Http\\' => 13,
            'Delight\\Db\\' => 11,
            'Delight\\Cookie\\' => 15,
            'Delight\\Base64\\' => 15,
            'Delight\\Auth\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'voku\\helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/voku/php-hooks/src/voku/helper',
        ),
        'Simple\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Delight\\Http\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/http/src',
        ),
        'Delight\\Db\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/db/src',
        ),
        'Delight\\Cookie\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/cookie/src',
        ),
        'Delight\\Base64\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/base64/src',
        ),
        'Delight\\Auth\\' => 
        array (
            0 => __DIR__ . '/..' . '/delight-im/auth/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit674be5e104d6f55d25ba3e4b9f199723::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit674be5e104d6f55d25ba3e4b9f199723::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit674be5e104d6f55d25ba3e4b9f199723::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit674be5e104d6f55d25ba3e4b9f199723::$classMap;

        }, null, ClassLoader::class);
    }
}
