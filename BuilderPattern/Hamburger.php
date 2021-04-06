<?php
include_once "./Builder.php";

class Product
{
    private array $steps;

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


class Director
{
    public function __construct(HamburgerBuilder $builder)
    {
        $builder->buildStepA();
        $builder->buildStepB();
    }
}


$builder = new BanshaoHamburgerBuilder();
$director = new Director($builder);
$product  = $builder->getResult();
$product->show();