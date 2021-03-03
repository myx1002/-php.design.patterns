<?php

include_once "../Restaurant.php";

/**
 * 多方法简单工厂
 * Class MethodsRestaurantFactory
 */
class MethodsRestaurantFactory
{
    public function getHamburgerRestaurant()
    {
        echo '你走进了汉堡包店' . PHP_EOL;
        return new HamburgerRestaurant();
    }

    public function getPizzaRestaurant()
    {
        echo '你走进了披萨店' . PHP_EOL;
        return new PizzaRestaurant();
    }
}


$restaurant = new MethodsRestaurantFactory();

// pizza餐厅
$pizzaRestaurant = $restaurant->getPizzaRestaurant();
$pizzaRestaurant->placeOrder();
$pizzaRestaurant->mealPreparation();
$pizzaRestaurant->dishServe();

echo '感觉有点吃不饱要咋整......' . PHP_EOL;

// hamburger餐厅
$hamburgerRestaurant = $restaurant->getHamburgerRestaurant();
$hamburgerRestaurant->placeOrder();
$hamburgerRestaurant->mealPreparation();
$hamburgerRestaurant->dishServe();

