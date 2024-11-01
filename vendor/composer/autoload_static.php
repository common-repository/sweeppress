<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb66f0ac783299dc9385aaf6aea37e469
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Ifsnop\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ifsnop\\' => 
        array (
            0 => __DIR__ . '/..' . '/ifsnop/mysqldump-php/src/Ifsnop',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb66f0ac783299dc9385aaf6aea37e469::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb66f0ac783299dc9385aaf6aea37e469::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb66f0ac783299dc9385aaf6aea37e469::$classMap;

        }, null, ClassLoader::class);
    }
}
