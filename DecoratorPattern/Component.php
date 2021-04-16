<?php

/**
 * Component
 * @Descript 抽象构件类(变形金刚)
 * Interface Transfrom
 */
interface Transfrom
{
    public function move();
}

/**
 * ConcreteComponent
 * @Descript 具体构件类（变形金刚汽车类）
 * Class TransfromCar
 */
class Car implements Transfrom
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
        echo $this->name . '是一辆汽车' . PHP_EOL;
    }

    public function move()
    {
        echo '在陆地上移动' . PHP_EOL;
    }
}