<?php

/**
 * 抽象角色，所有汉堡包对象的父类
 * 用于描述汉堡包的所有功能方法
 * Interface Hamburger
 */
interface Hamburger
{
    /** 汉堡包名称 **/
    public function getName();

    /** 汉堡包材料 **/
    public function getMaterial();
}

/**
 * 麦当劳汉堡包
 * Class McDonaldHamburger
 */
class McDonaldHamburger implements Hamburger
{

    /** 汉堡包名称 **/
    public function getName()
    {
        echo '这是麦当劳的`板烧鸡腿堡`' . PHP_EOL;
    }

    /** 汉堡包材料 **/
    public function getMaterial()
    {
        echo '两块面包、一颗生菜、一丢丢沙拉酱、最重要的是一块板烧鸡扒' . PHP_EOL;
    }
}

/**
 * 肯德基汉堡包
 * Class KFCHamburger
 */
class KFCHamburger implements Hamburger
{

    /** 汉堡包名称 **/
    public function getName()
    {
        echo '这是肯德基的`奥尔良鸡腿堡`' . PHP_EOL;
    }

    /** 汉堡包材料 **/
    public function getMaterial()
    {
        echo '两块面包、一颗生菜、一丢丢沙拉酱、最重要的是一块奥尔良鸡扒' . PHP_EOL;
    }
}