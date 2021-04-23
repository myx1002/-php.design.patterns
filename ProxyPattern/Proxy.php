<?php

require_once "./SchoolGirl.php";

/**
 * 代理模式
 *
 *  简述：
 *
 *  定义：
 *
 *  角色：
 *
 *  应用场景：
 *
 *  优缺点：
 *
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

$Lisa = new SchoolGirl('Lisa');
$John = new Proxy($Lisa, 'Proxy', 'Pursuit');
$John->giveDoll();
$John->giveFlowers();
$John->giveChocolate();