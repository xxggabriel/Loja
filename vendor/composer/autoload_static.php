<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit939ae647a818e1e42926b45dceab4b66
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit939ae647a818e1e42926b45dceab4b66::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit939ae647a818e1e42926b45dceab4b66::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
