<?php

interface Restaurant
{
    /** 下单 **/
    public function placeOrder();

    /** 备餐 **/
    public function mealPreparation();

    /** 上菜 **/
    public function dishServe();
}

/**
 * 汉堡包餐厅
 * Class HamburgerRestaurant
 */
class HamburgerRestaurant implements Restaurant
{

    /** 下单 **/
    public function placeOrder()
    {
        echo '欢迎光临，你点了一份`板烧鸡腿堡`套餐，请拿好票在右边候餐' . PHP_EOL;
    }

    /** 备餐 **/
    public function mealPreparation()
    {
        echo '不好意思，你是78号，这是18号，你的已经在做了，在稍等一下' . PHP_EOL;
    }

    /** 上菜 **/
    public function dishServe()
    {
        echo '78号！78号！板烧鸡腿堡套餐好了，请来取餐' . PHP_EOL;
    }
}

/**
 * 披萨餐厅
 * Class PizzaRestaurant
 */
class PizzaRestaurant implements Restaurant
{

    /** 下单 **/
    public function placeOrder()
    {
        echo '欢迎光临，你点了一份`日式照烧鳗鱼披萨`，请稍等......' . PHP_EOL;
    }

    /** 备餐 **/
    public function mealPreparation()
    {
        echo '别催啦，很快就好了，披萨是这么久的，想快的话过去隔壁吃汉堡包吧！' . PHP_EOL;
    }

    /** 上菜 **/
    public function dishServe()
    {
        echo '来啦来啦，B250座的披萨，久等了，快吃吧！' . PHP_EOL;
    }
}