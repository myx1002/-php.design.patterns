<?php
require_once "./Component.php";

/**
 * 装饰器模式
 *
 * 简述：
 *  通常情况下，扩展一个类的功能会使用继承的方式来实现。但是继承具有静态特征，耦合度高，并且随着扩展功能的增多，子类会很膨胀。
 *  如果使用组合关系来创建一个包装对象(即装饰对象)来包裹真实对象，并在保持真实对象的类结构不变的前提下，为其提供额外的功能，这就是装饰器模式的目标。
 *
 * 生活中的例子：
 *  像`大话设计模式`中的例子，人打扮其实就是一个装饰的过程，本来我只穿了个裤衩的，然后后面想出门了，又需要穿衣服、裤子、戴个手表什么之类的，
 *  又像我们平时吃手抓饼一样，我们可能会加鸡蛋、火腿、肉松
 *
 *
 * 概念：
 *  装饰器模式属于结构型模式，指在不改变现有对象结构的情况下，动态地给该对象增加一些职责（即增加其额外功能）的模式，它属于对象结构型模式。
 *  不使用继承而通过关联关系来调用现有类中的方法，达到复用的目的，并使得对象的行为可以灵活变化；
 *
 * 角色：
 *  抽象构件（Component）角色：定义一个抽象接口以规范准备接收附加责任的对象。
 *  具体构件（ConcreteComponent）角色：实现抽象构件，通过装饰角色为其添加一些职责。
 *  抽象装饰（Decorator）角色：继承抽象构件，并包含具体构件的实例，可以通过其子类扩展具体构件功能。
 *  具体装饰（ConcreteDecorator）角色：实现抽象装饰的相关方法，并给具体构件对象添加附加的职责。
 *
 * 优点：
 *  1.装饰器是继承的有力补充，在不改变原有对象的情况下，动态的给一个对象扩展功能，即插即用
 *  2.通过使用不用装饰类及这些装饰类的排列组合，可以实现不同的效果
 *  3.装饰器模式完全遵守开闭原则
 *
 * 缺点：
 *  1.装饰器模式会增加许多子类，过度使用会增加程序的复杂性
 *
 * 与建造者模式的区别
 *
 *
 */

/**
 * Decorator
 * @Description 抽象装饰类（变化类）
 * Class Changer
 */
class Changer implements Transfrom
{
    protected $transfrom;

    public function __construct(Transfrom $transfrom)
    {
        $this->transfrom = $transfrom;
    }

    /**
     * @Override
     */
    public function move()
    {
        $this->transfrom->move();
    }
}

class Robot extends Changer
{
    public function __construct(Transfrom $transfrom)
    {
        parent::__construct($transfrom);
        echo '变成机器人' . PHP_EOL;
    }

    public function run()
    {
        echo '迈开双腿跑起来' . PHP_EOL;
    }

    public function fight()
    {
        echo '咏春、叶问，打你一顿' . PHP_EOL;
    }
}

class Airplane extends Changer
{
    public function __construct(Transfrom $transfrom)
    {
        parent::__construct($transfrom);
        echo '变成飞机' . PHP_EOL;
    }

    public function fly()
    {
        echo '起飞起飞！' . PHP_EOL;
    }
}

$camaro = new Car('大黄蜂');
$camaro->move();
echo '---------------' . PHP_EOL;
$robot  = new Robot($camaro);
$robot->run();
$robot->fight();
echo '---------------' . PHP_EOL;
$airplane  = new Airplane($camaro);
$airplane->fly();