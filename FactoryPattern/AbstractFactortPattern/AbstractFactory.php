<?php

// 引入两个产品类
require_once "../ChickenNugget.php";
require_once "../Hamburger.php";

/**
 * 抽象工厂模式:
 *
 *    概念：
 *      抽象工厂模式（Abstract Factory Pattern）隶属于设计模式中的创建型模式，指当有多个抽象角色时使用的一种工厂模式，用于产品族的构建。
 *      因此抽象工厂模式是工厂方法模式的升级版本，工厂方法模式只生产一个等级的产品，而抽象工厂模式可生产多个等级的产品。
 *
 *    使用条件：
 *      ①系统中有多个产品族，每个具体工厂创建同一族但是不同等级结构的产品
 *          如：代码示例中有麦当劳和肯德基两个工厂，每个工厂包含了汉堡包和鸡块两个不同等级接口的产品组成的产品族
 *      ②系统一次只能消费其中某一族产品，即同族产品一起使用
 *          如：调用示例中，实例化了McDonaldAbstractRestaurantFactory麦当劳餐厅工厂的话，只能使用麦当劳的产品。
 *
 *     ps：产品族指的是每个工厂可以生产不同等级的产品，这些的不同产品的组成就是产品族
 *         通俗的讲，就是无论是麦当劳还是肯德基，它们都有汉堡包、薯条、鸡块等产品，这些不同的产品的组成就是产品族
 *
 *
 *     主要角色：
 *      抽象工厂（Abstract Factory）：提供了创建产品的接口，它包含多个创建产品的方法， 如getHamburger()、getChickenNugget()，可以创建多个不同等级的产品。
 *      具体工厂（Concrete Factory）：主要是实现抽象工厂中的多个抽象方法，完成具体产品的创建。
 *      抽象产品（Product）：定义了产品的规范，描述了产品的主要特性和功能，抽象工厂模式有多个抽象产品，如Hamburger、ChickenNugget。
 *      具体产品（Concrete Product）：实现了抽象产品角色所定义的接口，由具体工厂来创建，它同具体工厂之间是多对一的关系。
 *
 *     优点：
 *      可以在类的内部对产品族中相关联的多等级产品共同管理，而不必专门引入多个新的类来进行管理。
 *      当需要产品族时，抽象工厂可以保证客户端始终只使用同一个产品的产品组。
 *      抽象工厂增强了程序的可扩展性，当增加一个新的产品族时，不需要修改原代码，满足开闭原则。
 *
 *     缺点：
 *      当产品族中需要增加一个新的产品时，所有的工厂类都需要进行修改，
 *      例如增加一个薯条产品时，所有的工厂类都要加一个获取薯条产品的方法，增加了系统的抽象性和理解难度。
 *
 *
 * 抽象餐厅工厂
 * Interface AbstractRestaurantFactory
 */
interface AbstractRestaurantFactory
{
    /** 汉堡包 */
    public function getHamburger();

    /** 鸡块 */
    public function getChickenNugget();
}

/**
 * 麦当劳餐厅
 * Class McDonaldAbstractRestaurantFactory
 */
class McDonaldAbstractRestaurantFactory implements AbstractRestaurantFactory
{

    /** 汉堡包 */
    public function getHamburger()
    {
        return new McDonaldHamburger();
    }

    /** 鸡块 */
    public function getChickenNugget()
    {
        return new McDonaldChickenNugget();
    }
}

/**
 * 肯德基餐厅
 * Class KFCAbstractRestaurantFactory
 */
class KFCAbstractRestaurantFactory implements AbstractRestaurantFactory
{

    /** 汉堡包 */
    public function getHamburger()
    {
        return new KFCHamburger();
    }

    /** 鸡块 */
    public function getChickenNugget()
    {
        return new KFCChickenNugget();
    }
}

// 麦当劳餐厅
$mcDonald      = new McDonaldAbstractRestaurantFactory();
$mcDonaldHamburger     = $mcDonald->getHamburger();
$mcDonaldChickenNugget = $mcDonald->getChickenNugget();
$mcDonaldHamburger->getName();
$mcDonaldChickenNugget->getName();

// 肯德基餐厅
$kfc      = new KFCAbstractRestaurantFactory();
$kfcHamburger     = $kfc->getHamburger();
$kfcChickenNugget = $kfc->getChickenNugget();
$kfcHamburger->getName();
$kfcChickenNugget->getName();