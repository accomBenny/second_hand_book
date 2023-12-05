<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit01f9a3d25a091f3a202038e76d98d310
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit01f9a3d25a091f3a202038e76d98d310', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit01f9a3d25a091f3a202038e76d98d310', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit01f9a3d25a091f3a202038e76d98d310::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}