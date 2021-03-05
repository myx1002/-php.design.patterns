<?php

include_once "../Hamburger.php";


/**
 * 工厂方法模式：
 *     简单工厂模式有个显著的缺点，就是类型的创建是依赖工厂类的，每次新增角色(Product)时，都必须对工厂类进行修改，使得该类职责过重
 *     为了解决这个问题，就用了工厂方法模式！
 *     创建一个工厂接口(interface Factory)和多个工厂实现类(class ProductFactory implements Factory)，
 *     这样一旦需要新增角色(Product)时，直接增加新的工厂实现类即可(ProductFactory)，无需再修改旧的代码了。
 *
 *  优点：
 *      用户只需要知道具体工厂的名称就可得到所要的产品，无须知道产品的具体创建过程。
 *      灵活性增强，对于新产品的创建，只需多写一个相应的工厂类。
 *      典型的解耦框架。高层模块只需要知道产品的抽象类，无须关心其他实现类，满足迪米特法则、依赖倒置原则和里氏替换原则。
 *
 *  缺点：
 *      类的个数容易过多，增加复杂度
 *      增加了系统的抽象性和理解难度
 *      抽象产品只能生产一种产品，此弊端可使用抽象工厂模式解决。
 *
 * 工厂接口类
 * Interface RestaurantFactory
 */
interface HamburgerFactory
{
    /**
     * 获取汉堡包实例
     * @return mixed
     */
    public function getHamburger();
}

/**
 * 麦当劳餐厅工厂
 * Class HamburgerRestaurantFactory
 */
class McDonaldHamburgerFactory implements HamburgerFactory
{

    /**
     * 获取汉堡包餐厅实例
     * @return mixed
     */
    public function getHamburger()
    {
        return new McDonaldHamburger();
    }
}

/**
 * KFC餐厅工厂
 * Class PizzaRestaurantFactory
 */
class KFCHamburgerFactory implements HamburgerFactory
{

    /**
     * 获取披萨餐厅实例
     * @return mixed
     */
    public function getHamburger()
    {
        return new KFCHamburger();
    }
}


$mcDonaldRestaurantFactory = new McDonaldHamburgerFactory();
$mcDonaldRestaurant = $mcDonaldRestaurantFactory->getHamburger();  // 获取实例
$mcDonaldRestaurant->getName();
$mcDonaldRestaurant->getMaterial();

