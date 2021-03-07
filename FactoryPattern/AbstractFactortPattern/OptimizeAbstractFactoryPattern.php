<?php

// 引入两个产品类
require_once "../ChickenNugget.php";
require_once "../Hamburger.php";

/**
 * 优化一：使用简单工厂模式
 *
 *
 * Class OptimizeRestaurant
 */
class OptimizeRestaurant
{
    private static $restaurant = "McDonald";
//    private static $restaurant = "KFC";

    public static function getHamburger()
    {
        switch (self::$restaurant)
        {
            case 'McDonald':
                return new McDonaldHamburger();
                break;
            case 'KFC':
                return new KFCHamburger();
                break;
        }

        return false;
    }

    public static function getChickenNugget()
    {
        switch (self::$restaurant)
        {
            case 'McDonald':
                return new McDonaldChickenNugget();
                break;
            case 'KFC':
                return new KFCChickenNugget();
                break;
        }

        return false;
    }
}