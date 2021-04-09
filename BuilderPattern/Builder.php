<?php

include_once "./Hamburger.php";

/**
 * 建造者(生成器)模式
 *
 * 建造者模式又称为生成器模式，是创建型模式的一种
 * 在程序设计时，一个复杂的对象可能有许多子部件按照一定的步骤组合而成，
 * 如游戏中的不用角色，其性别、个性、体型、样貌、服装等等都有所差异，但是组成方式却大同小异
 * 针对这些由多个部件构成的对象，各个部件可以灵活选择，但是创建步骤都大同小异的情况下，可以选择使用建造者模式。
 *
 * 概念：
 * 指将一个复杂对象的构造与它的表示分离，使同样的构建过程可以创建不同的表示，这样的设计模式被称为建造者模式。
 * 它是将一个复杂的对象分解为多个简单的对象，然后一步一步构建而成。它将变与不变相分离，即产品的组成部分是不变的，但每一部分是可以灵活选择的。
 *
 *
 * 角色：
 *      产品角色（Product）：它是包含多个组成部件的复杂对象，由具体建造者来创建其各个零部件。
 *      抽象建造者(Builder)：它是一个包含创建产品各个子部件的抽象方法的接口，通常还包含一个返回复杂产品的方法 getResult()。
 *      具体建造者(Concrete Builder)：实现 Builder 接口，完成复杂产品的各个部件的具体创建方法。
 *      指挥者(Director)：它调用建造者对象中的部件构造与装配方法完成复杂对象的创建，在指挥者中不涉及具体产品的信息。
 *
 * 优点：
 *  封装性好，构建和表示分离
 *  扩展性好，各个具体的建造者相互独立，有利于系统的解耦
 *  客户端不必知道产品内部组成的细节，建造者可以对创建过程逐步细化，而不对其它模块产生任何影响，便于控制细节风险
 *
 * 缺点：
 *  产品的组成部分必须相同，这限制了其使用范围
 *  如果产品的内部变化复杂，如果产品内部发生变化，则建造者也要同步修改，后期维护成本较大
 *
 * 与工厂模式区别：
 *  ● 意图不同
 *　　在工厂方法模式里，我们关注的是一个产品整体，如超人整体，无须关心产品的各部分是如何创建出来的；但在建造者模式中，一个具体产品的产生是依赖各个部件的产生以及装配顺序，它关注的是“由零件一步一步地组装出产品对象”。简单地说，工厂模式是一个对象创建的粗线条应用，建造者模式则是通过细线条勾勒出一个复杂对象，关注的是产品组成部分的创建过程。
 *
 *　● 产品的复杂度不同
 *　　工厂方法模式创建的产品一般都是单一性质产品，如成年超人，都是一个模样，而建造者模式创建的则是一个复合产品，它由各个部件复合而成，部件不同产品对象当然不同。这不是说工厂方法模式创建的对象简单，而是指它们的粒度大小不同。一般来说，工厂方法模式的对象粒度比较粗，建造者模式的产品对象粒度比较细。
 *　　两者的区别有了，那在具体的应用中，我们该如何选择呢？是用工厂方法模式来创建对象，还是用建造者模式来创建对象，这完全取决于我们在做系统设计时的意图，如果需要详细关注一个产品部件的生产、安装步骤，则选择建造者，否则选择工厂方法模式。
 *
 * 总的来说，建造者（Builder）模式和工厂模式的关注点不同：工厂方法模式更注重零部件的创建过程，建造者模式注重零部件的组装过程，一般用来创建更为复杂的对象，但两者可以结合使用。
 *
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
    public $product;

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
    public $product;

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