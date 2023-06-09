<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff021d7dc53465959c47e6e87d94315d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dcblogdev\\PdoWrapper\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dcblogdev\\PdoWrapper\\' => 
        array (
            0 => __DIR__ . '/..' . '/dcblogdev/pdo-wrapper/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitff021d7dc53465959c47e6e87d94315d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff021d7dc53465959c47e6e87d94315d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitff021d7dc53465959c47e6e87d94315d::$classMap;

        }, null, ClassLoader::class);
    }
}
