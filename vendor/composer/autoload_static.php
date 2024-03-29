<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf377f6a15e2b3be782fdf9dab97c50c1
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chillerlan\\Settings\\' => 20,
            'chillerlan\\QRCode\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chillerlan\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-settings-container/src',
        ),
        'chillerlan\\QRCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-qrcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf377f6a15e2b3be782fdf9dab97c50c1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf377f6a15e2b3be782fdf9dab97c50c1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf377f6a15e2b3be782fdf9dab97c50c1::$classMap;

        }, null, ClassLoader::class);
    }
}
