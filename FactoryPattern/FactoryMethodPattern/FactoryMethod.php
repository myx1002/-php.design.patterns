<?php

include_once "../Restaurant.php";


/**
 * 工厂方法模式：
 *     简单工厂模式有个显著的缺点，就是类型的创建是依赖工厂类的，每次新增角色(Product)时，都必须对工厂类进行修改，使得该类职责过重
 *     为了解决这个问题，就用了工厂方法模式！
 *     创建一个工厂接口(interface Factory)和多个工厂实现类(class ProductFactory implements Factory)，
 *     这样一旦需要新增角色(Product)时，直接增加新的工厂实现类即可(ProductFactory)，无需再修改旧的代码了。
 *
 *
 * 概念：简单工厂
 *
 *
 * 工厂接口类
 * Interface RestaurantFactory
 */
interface RestaurantFactory
{
    /**
     * 获取餐厅实例
     * @return mixed
     */
    public function getRestaurant();
}

/**
 * 汉堡包餐厅工厂
 * Class HamburgerRestaurantFactory
 */
class HamburgerRestaurantFactory implements RestaurantFactory
{

    /**
     * 获取汉堡包餐厅实例
     * @return mixed
     */
    public function getRestaurant()
    {
        return new HamburgerRestaurant();
    }
}

/**
 * 披萨餐厅工厂
 * Class PizzaRestaurantFactory
 */
class PizzaRestaurantFactory implements RestaurantFactory
{

    /**
     * 获取披萨餐厅实例
     * @return mixed
     */
    public function getRestaurant()
    {
        return new PizzaRestaurant();
    }
}



// pizza餐厅
$pizzaRestaurant = new PizzaRestaurantFactory();
$pizzaRestaurant = $pizzaRestaurant->getRestaurant();  // 获取实例
$pizzaRestaurant->placeOrder();  // 下单
$pizzaRestaurant->mealPreparation();  // 备餐
$pizzaRestaurant->dishServe();  // 上菜

echo '感觉有点吃不饱要咋整......' . PHP_EOL;

// hamburger餐厅
$hamburgerRestaurant = new HamburgerRestaurantFactory();
$hamburgerRestaurant = $hamburgerRestaurant->getRestaurant();
$hamburgerRestaurant->placeOrder();
$hamburgerRestaurant->mealPreparation();
$hamburgerRestaurant->dishServe();

echo '溜了溜了，撑死了......' . PHP_EOL;