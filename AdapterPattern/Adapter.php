<?php

include_once "./Player.php";

/**
 * 定义：
 * 适配器模式(Adapter)，将一个类的接口转化成客户希望的另外一个接口，使得原本由于接口不兼容而不能一起工作的类可以一起工作
 * 适配器模式分为类适配器模式和对象适配器模式，由于类适配器模式通过多重继承对一个类与另外一个接口进行匹配，而C#、Java等语言都不支持多重集成
 * 也就是一个类只有一个父类，所以我们这里主要讲的是对象适配器模式。
 *
 * 主要作用：
 * 主要用来解决什么问题呢：简单的说，就是需要的东西在面前，但却不能使用，而短时间又无法改造它，于是得想办法适配它
 *                      也就是系统的数据和行为都正确，但是接口不符时，可以考虑使用适配器模式，目的是使控制范围之外的一个原有对象与某个接口匹配。
 *                      适配器模式主要应用于希望复用一些现存的类，但是接口由于复用环境要求不一致的情况。
 *
 * 应用场景
 *  1.以前开发的系统存在满足新系统功能需求的类，但其接口同新系统的接口不一致。
 *  2.使用第三方提供的组件，但组件接口定义和自己要求的接口定义不同。
 *
 * 主要角色：
 *      目标（Target）接口：当前系统业务所期待的接口，它可以是抽象类或接口。
 *      适配者（Adaptee）类：它是被访问和适配的现存组件库中的组件接口。
 *      适配器（Adapter）类：它是一个转换器，通过继承或引用适配者的对象，把适配者接口转换成目标接口，让客户按目标接口的格式访问适配者。
 *
 * 优点：
 *  1.客户端通过适配器可以透明地调用目标接口
 *  2.复用了现存的类，在不需要修改原有代码的前提下重用现有的适配者类
 *  3.将目标类和适配者类解耦，解决了目标类和适配者类接口不一致的问题
 *  4.在很多业务场景中符合开闭原则
 *
 * 缺点：
 *  1.适配器编写过程需要结合业务场景全面考虑，可能会增加系统的复杂性。
 *  2.增加代码阅读难度，降低代码可读性，过多使用适配器会使系统代码变得凌乱
 */

/**
 * 外国中锋(Adaptee适配者)
 * Class ForeignCenter
 */
class ForeignCenter
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function ForeignAttack()
    {
        echo '外籍中锋' . $this->name . '进攻' . PHP_EOL;
    }

    public function ForeignDefense()
    {
        echo '外籍中锋' . $this->name . '防守' . PHP_EOL;
    }
}

/**
 * 翻译官（Adepter适配器）
 * Class Translator
 */
class Translator extends player
{
    private $foreignCenter;

    public function __construct(string $name)
    {
       $this->foreignCenter = new ForeignCenter($name);
    }

    public function Attack()
    {
        $this->foreignCenter->ForeignAttack();
    }

    public function Defense()
    {
        $this->foreignCenter->ForeignDefense();
    }
}


$forwards = new Forwards('詹姆斯');
$forwards->Attack();
$guards   = new Guards('艾佛森');
$guards->Attack();

$center   = new Translator('姚明');
$center->Attack();
$center->Defense();