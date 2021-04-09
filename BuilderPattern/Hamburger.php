<?php
include_once "./Builder.php";

/**
 * 产品角色
 * Class Product
 */
class Product
{
    public $steps;

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
    public function build(HamburgerBuilder $builder)
    {
        $builder->buildStepA();
        $builder->buildStepB();
        return $builder->getResult();
    }
}


$builder  = new BanshaoHamburgerBuilder();
$director = (new Director())->build($builder);
$director->show();