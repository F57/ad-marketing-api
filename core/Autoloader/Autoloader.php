<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace core\Autoloader;

class Autoloader
{
    private static $autoloadPathArray = array(
        'core/Autoloader', 'core/Http', 'core/Regions', 'core/Profile', 'core/Exception'
    );

    private static $replacePath = array(
        "ToutiaoSdk\\" => "\\core\\Profile\\"
    );

    /**
     *
     * @param $className
     */
    public static function autoload($className)
    {
        $directories = dirname(dirname(__DIR__));
        foreach (self::$autoloadPathArray as $path) {
            $file = $directories . DIRECTORY_SEPARATOR . $path . '.php';
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
            if (is_file($file)) {
<<<<<<< HEAD
=======
//                var_dump(123,$file);
>>>>>>> 189c9d78230b9a62cd90b1722e8b8e7901ac99c5
                include_once $file;
                break;
            }
        }
        foreach (self::$replacePath as $searchStr => $replaceStr) {
            $className = str_replace($searchStr, $replaceStr, $className);
        }
        $file = $directories . DIRECTORY_SEPARATOR . $className . '.php';
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
        if (is_file($file)) {
<<<<<<< HEAD
=======
//            var_dump(1234,$file);
>>>>>>> 189c9d78230b9a62cd90b1722e8b8e7901ac99c5
            include_once $file;
        }
    }

    public static function loadDirectories()
    {
        $directories = dirname(dirname(__DIR__));
        foreach (glob($directories . DIRECTORY_SEPARATOR . '*') as $directory) {
            if (is_dir($directory) && basename($directory) !== 'core') {
                self::$autoloadPathArray[] = basename($directory);
            }
        }
    }

    public static function addAutoloadPath($path)
    {
        self::$autoloadPathArray[] = $path;
    }
}

spl_autoload_register(['core\Autoloader\Autoloader', 'autoload'], true, true);

