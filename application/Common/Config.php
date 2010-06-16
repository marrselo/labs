<?php

defined('SYS_ENTRY') or die('Access Denied!');


/**
 * Static api to get configuration in singleton pattern
 * 
 * @category   Common
 * @package    Common_Config
 */
final class Common_Config
{
    /**
     * @var array
     */
    private static $_configs = array();

    /**
     * Get configuration by config-file-name, Ignore extension!
     *
     * @param $name string 
     * @retrun Zend_Config
     */
    public static function get($name)
    {
        if (isset(self::$_configs[$name])) {
            return self::$_configs[$name];
        }

        if (file_exists(ROOT_PATH."/application/configs/$name.ini")) {
            self::$_configs[$name] = new Zend_Config_Ini(ROOT_PATH."/application/configs/$name.ini");
            return self::$_configs[$name];
        }
        
        return;
    }
}
