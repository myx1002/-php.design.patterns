<?php

// 引入两个产品类
require_once "../ChickenNugget.php";
require_once "../Hamburger.php";

/**
 * 优化一：使用简单工厂模式改进抽象工厂模式
 *        优点：
 *        去掉AbstractRestaurantFactory、McDonaldAbstractRestaurantFactory、KFCAbstractRestaurantFactory，
 *        取而代之的是OptimizeRestaurant，这样客户在使用的时候只需要调取OptimizeRestaurant::getHamburger()即可，
 *        客户端中也不会出现McDonaldAbstractRestaurantFactory和KFCdAbstractRestaurantFactory的字样，需要切换时，只需要修改静态变量$restaurant即可
 *
 *        缺点：
 *        之前假如要增加一个“汉堡王”工厂的话，只需要增加一个工厂类即可
 *        但是现在要改动每一个方法，增加一个case
 *        为了解决这个问题，可以参考使用优化二：反射+配置文件
 * Class OptimizeRestaurant
 */
class OptimizeRestaurant
{
    // 只需更改这里即可切换不同产品工厂
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

// 示例
$hamburger  = OptimizeRestaurant::getHamburger();
$hamburger->getName();
$hamburger->getMaterial();