<?php

include_once "./Restaurant.php";

/**
 * 餐厅工厂
 * Class RestaurantFactory
 */
class RestaurantFactory
{
    public function getRestaurant(string $type)
    {
        switch ($type) {
            case 'hamburger':
                echo '你走进了汉堡包店' . PHP_EOL;
                return new HamburgerRestaurant();
            case 'pizza':
                echo '你走进了披萨店' . PHP_EOL;
                return new PizzaRestaurant();
            default:
                echo '请选择正确的餐厅' . PHP_EOL;
                return false;
        }
    }
}



