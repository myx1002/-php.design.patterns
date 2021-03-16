<?php

/**
 * 原型模式：
 *
 *  定义：
 *      原始模式属于`创建型模式`，是从一个对象，通过复制来创建一个相同或者类似的可定制的新对象，而不需要知道任何的创建细节。
 *      值得注意的是，通过克隆方式拷贝出来的对象是一个新的对象，对其修改不会影响原型对象的属性。
 *
 *  应用场景：
 *      其实原型模式的原理就类似我们程序员中的`复制`和`粘贴`，有时候需要写重复代码，但是有部分要改动的时候，就会复制粘贴，然后改动。
 *      例如下面简历的例子，通过深拷贝，在原本奖励的基础上重新修改工作经历，而不用重新填写用户的基本资料。
 *
 *
 *  主要角色：
 *      Prototype（抽象原型类）：它是声明克隆方法的接口，是所有具体原型类的公共父类，可以是抽象类也可以是接口，甚至还可以是具体实现类。
 *      ConcretePrototype（具体原型类）：它实现在抽象原型类中声明的克隆方法，在克隆方法中返回自己的一个克隆对象
 *      Client（客户类）：使用原型对象的客户程序
 *
 *  优点：
 *      1.性能提高，规避了构造函数的约束
 *        当需要实例化的对象是个相似的对象时，并且创建新的对象较为复杂、成本较大时，可使用`原型模式`来克隆一个已有的实例对象来提高实例化效率
 *      2.辅助实现撤销操作
 *        可以使用深克隆的方式保存对象的状态，使用原型模式将对象复制一份并将其状态保存起来，以便在需要的时候使用（如恢复到某一历史状态）
 *      3.简化对象的创建
 *
 *  缺点：
 *      1.需要为每一个类都配置一个 clone 方法
 *      2.clone 方法位于类的内部，当对已有类进行改造的时候，需要修改代码，违背了开闭原则。
 *      3.在实现深克隆时需要编写较为复杂的代码，而且当对象之间存在多重的嵌套引用时，为了实现深克隆，每一层对象对应的类都必须支持深克隆，实现起来可能会比较麻烦。
 *
 * 简历接口抽象类(抽象原型类)
 * Class CloneResume
 */
abstract Class CloneResume
{
    public   $name;
    public   $sex;
    public   $age;
    public   $work;

    abstract function __clone();
}

/**
 * 简历类(具体原型类)
 * Class Resume
 */
class Resume extends CloneResume
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->work = new WorkExperience();
    }

    /**
     * 设置个人信息
     * @param string $sex
     * @param string $age
     */
    public function setPersonalInfo($sex, $age)
    {
        $this->sex = $sex;
        $this->age = $age;
    }

    /**
     * 设置工作经历
     * @param string $workData
     * @param string $company
     */
    public function setWorkExperience($workData, $company)
    {
        $this->work->setCompany($company);
        $this->work->setWorkDate($workData);
    }

    public function display()
    {
        echo $this->name . '-' . $this->sex . '-' . $this->age . PHP_EOL;
        echo '工作经历：' . $this->work->getCompany() . '-' . $this->work->getWorkDate() . PHP_EOL;
    }

    /**
     * 重新clone方法，实现深拷贝
     */
    public function __clone()
    {
        $this->work = clone $this->work;
    }
}

/**
 * 工作经历：一份简历可能包含多段工作经理
 * Class WorkExperience
 */
class WorkExperience
{
    private  $workDate;  // 工作时间
    private  $company;   // 公司名称

    /**
     * 设置工作时间
     */
    public function setWorkDate($workDate)
    {
        return $this->workDate = $workDate;
    }

    /**
     * 设置公司名称
     */
    public function setCompany($company)
    {
        return $this->company = $company;
    }

    /**
     * 获取工作时间
     */
    public function getWorkDate()
    {
        return $this->workDate;
    }

    /**
     * 获取公司名称
     */
    public function getCompany()
    {
        return $this->company;
    }
}

$resumeA = new Resume("小明");
$resumeA->setPersonalInfo('男', '18');
$resumeA->setWorkExperience('2019-7-1至2020-7-1', '牛皮科技有限公司');

$resumeB = clone $resumeA;
$resumeB->setWorkExperience('2020-8-1至2021-2-1', '瓜皮科技有限公司');

$resumeA->display();
$resumeB->display();