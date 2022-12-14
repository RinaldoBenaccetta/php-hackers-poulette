<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b4a035e23b5f7fe5f696eff77d2eb94
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'hackers_poulette\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'hackers_poulette\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b4a035e23b5f7fe5f696eff77d2eb94::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b4a035e23b5f7fe5f696eff77d2eb94::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6b4a035e23b5f7fe5f696eff77d2eb94::$classMap;

        }, null, ClassLoader::class);
    }
}
