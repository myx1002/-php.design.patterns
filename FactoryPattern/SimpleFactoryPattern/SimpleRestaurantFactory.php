<?php

include_once "./Restaurant.php";

/**
 * 简单工厂模式
 *
 * 概念：简单工厂模式属于`创建型模式`，通过专门定义一个工厂类来负责创建其他类的实例，被创建的实例通常具有相同的父类
 *       如下面的例子：HamburgerRestaurant(汉堡包餐厅)和PizzaRestaurant(披萨餐厅)都实现了Restaurant类，而且都由SimpleRestaurantFactory(工厂类)来实例化它们。
 *
 *
 * 具体分类：
 *  工厂（Factory）角色：简单工厂模式的核心，它负责实现创建所有实例的内部逻辑。工厂类方法可被外部调用，用于创建对应的产品对象；
 *  抽象（Product）角色：所有对象的父类，它负责描述所有实现类需要实现的功能方法；
 *  具体产品（ConcreteProduct）角色：具体实例对象
 *
 *
 * 优缺点：
 *   优点：用户使用时，可以直接根据自己所需传入对应的类型参数来创建所需实例，而无需了解这些是如何创建的、如何组织的。有利于整个软件体系结构的优化
 *   缺点：简单工厂模式的缺点也体现在工厂类(Factory)上，由于工厂类集中了所有实例的创建逻辑，每次增加新的实例对象时，都修要修改
 *        工厂类，使得该类职责过重，而且不符合开闭原则(不属于23中设计模式)，因此在“高内聚”和“扩展性”上面不是很好。
 *
 * 普通简单工厂还有另外两种形式
 *   ①多方法简单工厂（MethodsRestaurantFactory.php）：
 *      是对普通简单工厂模式的一种改进，在普通简单工厂模式中，如果传递的类型有误，则不能正确的创建对象，而多方法简单工厂模式
 *      则是在工厂类中提供多个工厂方法，对应的实例化不用的产品对象。
 *   ②静态方法简单工厂（StaticRestaurantFactory.php）：
 *      进一步改进，对工厂方法置为静态方法，无需创建实例，直接调用方法即可。
 *
 * 简单餐厅工厂
 * Class SimpleRestaurantFactory
 */
class SimpleRestaurantFactory
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


$restaurant = new SimpleRestaurantFactory();

// pizza餐厅
$pizzaRestaurant = $restaurant->getRestaurant('pizza');  // 获取实例
$pizzaRestaurant->placeOrder();  // 下单
$pizzaRestaurant->mealPreparation();  // 备餐
$pizzaRestaurant->dishServe();  // 上菜

echo '感觉有点吃不饱要咋整......' . PHP_EOL;

// hamburger餐厅
$hamburgerRestaurant = $restaurant->getRestaurant('hamburger');
$hamburgerRestaurant->placeOrder();
$hamburgerRestaurant->mealPreparation();
$hamburgerRestaurant->dishServe();

echo '溜了溜了，撑死了......' . PHP_EOL;
