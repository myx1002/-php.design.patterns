<?php

/**
 * 抽象角色，所有汉堡包对象的父类
 * 用于描述鸡块的所有功能方法
 * Interface ChickenNugget
 */
interface ChickenNugget
{
    /**
     * 获取鸡块名称
     * @return mixed
     */
    public function getName();
}

/**
 * 麦当劳汉堡包
 * Class McDonaldHamburger
 */
class McDonaldChickenNugget implements ChickenNugget
{
    public function getName()
    {
        echo '这是麦当劳的`麦乐鸡块`' . PHP_EOL;
    }
}


class KFCChickenNugget implements ChickenNugget
{
    public function getName()
    {
        echo '这是肯德基的`上校鸡块`' . PHP_EOL;
    }
}