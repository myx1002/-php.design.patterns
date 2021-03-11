<?php

// 引入两个产品类
require_once "../ChickenNugget.php";
require_once "../Hamburger.php";


/**
 * 优化二：反射+配置文件
 * Class OptimizeRestaurant
 */
class OptimizeRestaurant2
{
    public static function getHamburger()
    {
        $restaurant = getRestaurantConfig() . 'Hamburger';
        return new $restaurant();
    }

    public static function getChickenNugget()
    {
        $restaurant = getRestaurantConfig() . 'ChickenNugget';
        return new $restaurant();
    }
}

/**
 * 获取配置文件
 * 新增配置文件restaurantConfig.php，根据配置文件的Key值获取对应需要实例化的产品即可
 * ['restaurant' => 'McDonald']
 * @return string
 */
function getRestaurantConfig()
{
    // 例如获取到的配置是“麦当劳”
    return 'KFC';
}

// 示例
$hamburger  = OptimizeRestaurant2::getHamburger();
$hamburger->getName();
$hamburger->getMaterial();