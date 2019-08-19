<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit028c752828c89416fccd05a1745ecf0f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit028c752828c89416fccd05a1745ecf0f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit028c752828c89416fccd05a1745ecf0f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
