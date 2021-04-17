<?php

/**
 * Component
 * @Descript 抽象构件类
 * 如果只有一个具体构件角色的话，该抽象类可忽略
 * Interface Component
 */
//interface Component
//{
//    public function show();
//}

/**
 * ConcreteComponent
 * @Descript 具体构件类（变形金刚汽车类）
 * Class People
 */
class People
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function show()
    {
        echo $this->name . '装扮：';
    }
}