<?php

include_once "./Hamburger.php";

/**
 * 建造者(生成器)模式
 *
 * 建造者模式又称为生成器模式，是创建型模式的一种
 * 在程序设计时，一个复杂的对象可能有许多子部件按照一定的步骤组合而成，
 * 如游戏中的不用角色，其性别、个性、体型、样貌、服装等等都有所差异，但是组成方式却大同小异
 * 针对这些由多个部件构成的对象，各个不见可以灵活选择，但是创建步骤都大同小异的情况下，可以选择使用建造者模式。
 *
 * 概念：
 * 指将一个复杂对象的构造与它的表示分离，使同样的构建过程可以创建不同的表示，这样的设计模式被称为建造者模式。
 * 它是将一个复杂的对象分解为多个简单的对象，然后一步一步构建而成。它将变与不变相分离，即产品的组成部分是不变的，但每一部分是可以灵活选择的。
 *
 *
 * 角色：
 *      产品角色（Product）：
 *      抽象建造者(Builder)：
 *      具体建造者(Concrete Builder)：实现 Builder 接口，完成复杂产品的各个部件的具体创建方法。
 *      指挥者()：
 *
 * 优缺点：
 *
 * 与工厂模式区别：
 *
 *
 *
 * https://www.cnblogs.com/ChinaHook/p/7471470.html
 * https://www.jianshu.com/p/47329a94f5dc
 * http://c.biancheng.net/view/1354.html
 * 汉堡包抽象建造者
 * Interface HamburgerBuilder
 */
interface  HamburgerBuilder
{
    public function buildStepA();
    public function buildStepB();
    public function getResult();
}

/**
 * 板烧鸡腿堡建造者
 * Class BanshaoHamburgerBuilder
 */
class BanshaoHamburgerBuilder implements HamburgerBuilder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildStepA()
    {
        $this->product->add('准备一块`板烧鸡腿`');
    }

    public function buildStepB()
    {
        $this->product->add('用面包把`板烧鸡腿`夹住，加点生菜和沙拉酱');
    }

    public function getResult()
    {
        $this->product->add('`板烧鸡腿`堡好了');
        return $this->product;
    }
}

/**
 * 鳕鱼煲建造者
 * Class XueyuHamburgerBuilder
 */
class XueyuHamburgerBuilder implements HamburgerBuilder
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildStepA()
    {
        $this->product->add('准备一块`鳕鱼`');
    }

    public function buildStepB()
    {
        $this->product->add('用面包把`鳕鱼`夹住，加点生菜和沙拉酱');
    }

    public function getResult()
    {
        $this->product->add('`鳕鱼`堡好了');
        return $this->product;
    }
}