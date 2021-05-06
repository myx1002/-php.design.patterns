<?php

/**
 * 代理模式
 *
 *  定义：
 *      由于某些原因需要给某对象提供一个代理以控制对该对象的访问，
 *      这时，访问对象不适合或者不能直接引用目标对象，代理对象作为访问对象和目标对象之间的中介。
 *
 *  角色：
 *      抽象主题(Subject)类：通过接口或抽象类声明真实主题和代理对象实现的业务方法
 *      真实主题(Real Subject)类：实现了抽象主题中的具体业务，是代理对象所代表的真实对象，是最终要引用的对象。
 *      代理(Proxy)类：提供了与真实主题相同的接口，其内部含有对真是主题的引用，它可以访问、控制或扩展真是主题的功能。
 *
 *  应用场景：
 *      当无法或不想直接引用某个对象或访问某个对象存在困难时，可以通过代理对象来间接访问。
 *      使用代理模式主要有两个目的：保护目标对象、增强目标对象。
 *
 *  优缺点：
 *    优点：
 *      代理模式再客户端与目标对象之间起到一个中介作用和保护目标对象的作用
 *      代理对象可以扩展目标对象的功能
 *      代理模式能将客户端与目标对象分离，在一定程度上降低了系统的耦合性，增加了程序的可扩展性
 *    缺点：
 *      代理模式会造成系统设计中类的数量增加
 *      在客户端和目标对象之间增加一个代理对象，会造成请求处理速度变慢
 *      增加了系统的复杂度
 */


/**
 * 抽象主题类
 * Interface GiveGift
 */
interface GiveGift
{
    public function giveDoll();
    public function giveFlowers();
    public function giveChocolate();
}

/**
 * 真实主题类
 * Class Pursuit
 */
class Pursuit implements GiveGift
{
    public $mm;

    public function __construct(SchoolGirl $mm)
    {
        $this->mm = $mm;
    }

    public function giveDoll()
    {
        echo '给' . $this->mm->name . '送一个娃娃' . PHP_EOL;
    }

    public function giveFlowers()
    {
        echo '给' . $this->mm->name . '送一束鲜花' . PHP_EOL;
    }

    public function giveChocolate()
    {
        echo '给' . $this->mm->name . '送一盒巧克力' . PHP_EOL;
    }
}

/**
 * 代理类
 * Class Proxy
 */
class Proxy implements GiveGift
{
    public $gg;

    public function __construct(SchoolGirl $mm, $proxyName, $pursuitName)
    {
        $this->gg = new Pursuit($mm);
        echo $proxyName . '替' . $pursuitName . PHP_EOL;
    }

    public function giveDoll()
    {
        $this->gg->giveDoll();
    }

    public function giveFlowers()
    {
        $this->gg->giveFlowers();
    }

    public function giveChocolate()
    {
        $this->gg->giveChocolate();
    }
}

/**
 * Class SchoolGirl
 */
class SchoolGirl
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

$Lisa = new SchoolGirl('Lisa');
$John = new Proxy($Lisa, 'Proxy', 'Pursuit');
$John->giveDoll();
$John->giveFlowers();
$John->giveChocolate();