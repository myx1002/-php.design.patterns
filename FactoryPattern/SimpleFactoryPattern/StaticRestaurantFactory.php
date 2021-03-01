<?php

include_once "./Restaurant.php";

/**
 * 静态方法简单工厂
 * Class StaticRestaurantFactory
 */
class StaticRestaurantFactory
{
    public static function getHamburgerRestaurant()
    {
        echo '你走进了汉堡包店' . PHP_EOL;
        return new HamburgerRestaurant();
    }

    public static function getPizzaRestaurant()
    {
        echo '你走进了披萨店' . PHP_EOL;
        return new PizzaRestaurant();
    }
}



// pizza餐厅
$pizzaRestaurant = StaticRestaurantFactory::getPizzaRestaurant();
$pizzaRestaurant->placeOrder();
$pizzaRestaurant->mealPreparation();
$pizzaRestaurant->dishServe();

echo '感觉有点吃不饱要咋整......' . PHP_EOL;

// hamburger餐厅
$hamburgerRestaurant = StaticRestaurantFactory::getHamburgerRestaurant();
$hamburgerRestaurant->placeOrder();
$hamburgerRestaurant->mealPreparation();
$hamburgerRestaurant->dishServe();

