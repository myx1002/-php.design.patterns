<?php

include_once "./Hamburger.php";


interface  HamburgerBuilder
{
    public function buildStepA();
    public function buildStepB();
    public function getResult();
}

class BanshaoHamburgerBuilder implements HamburgerBuilder
{
    private Product $product;

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
        return $this->product;
    }
}


class XueyuHamburgerBuilder implements HamburgerBuilder
{
    private Product $product;

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
        return $this->product;
    }
}