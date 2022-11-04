<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbcc99a1329aeab40c3288696ec9b1700
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TheImage\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TheImage\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbcc99a1329aeab40c3288696ec9b1700::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbcc99a1329aeab40c3288696ec9b1700::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbcc99a1329aeab40c3288696ec9b1700::$classMap;

        }, null, ClassLoader::class);
    }
}
