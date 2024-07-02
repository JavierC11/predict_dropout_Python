<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12ae21247b4b15485bdd4e20275c3959
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Libs\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/libs',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12ae21247b4b15485bdd4e20275c3959::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12ae21247b4b15485bdd4e20275c3959::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
