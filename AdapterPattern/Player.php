<?php


/**
 * 球员抽象类
 * Class player
 */
abstract class player
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // 进攻
    public abstract function Attack();

    // 防守
    public abstract function Defense();
}

/**
 * 前锋
 * Class Forwards
 */
class Forwards extends player
{

    public function Attack()
    {
        echo '前锋' . $this->name . '进攻' . PHP_EOL;
    }

    public function Defense()
    {
        echo '前锋' . $this->name . '防守' . PHP_EOL;
    }
}

/**
 * 后卫
 * Class Guards
 */
class Guards extends player
{
    public function Attack()
    {
        echo '后卫' . $this->name . '进攻' . PHP_EOL;
    }

    public function Defense()
    {
        echo '后卫' . $this->name . '防守' . PHP_EOL;
    }
}

/**
 * 中锋
 * Class Center
 */
class Center extends player
{
    public function Attack()
    {
        echo '中锋' . $this->name . '进攻' . PHP_EOL;
    }

    public function Defense()
    {
        echo '中锋' . $this->name . '防守' . PHP_EOL;
    }
}