<?php
include_once "./Builder.php";

/**
 * 产品角色
 * Class Product
 */
class Product
{
    private $steps;

    public function add($step)
    {
        $this->steps[] = $step;
    }

    public function show()
    {
        foreach ($this->steps as $step) {
            echo $step . PHP_EOL;
        }
    }
}

/**
 * 指挥者
 * Class Director
 */
class Director
{
    public function __construct(HamburgerBuilder $builder)
    {
        $builder->buildStepA();
        $builder->buildStepB();
    }
}


$builder  = new BanshaoHamburgerBuilder();
$director = new Director($builder);
$product  = $builder->getResult();
$product->show();