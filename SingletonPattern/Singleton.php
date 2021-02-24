<?php


/**
 * 单例模式（创建型模式）
 *
 * 概念：整个应用中某个类只有一个对象实例的设计模式
 *      具体来说，作为对象的创建方式，单例模式确保某一个类只有一个实例，而且自行实例化并向整个系统全局的提供这个实例。它不会创建实例副本，而是会向单例类内部存储的实例返回一个引用。
 *
 * 特点：单例模式的主要特点是“三私一公”
 *      ① 需要一个`私有静态成员变量`来保存类的唯一实例
 *      ② 构造函数必须声明为私有的，防止外部程序new一个对象从而失去单例的意义
 *      ③ 克隆函数必须声明为私有的，防止对象被克隆
 *      ④ 需要一个`公共静态方法(通常命名为getInstance)`来返回唯一实例的引用
 *
 * 使用原因和场景：
 *      如果每次操作数据库都要重新实例化，对程序和数据来说也增大了系统和内存的消耗
 *      而单例模式返回的唯一实例引用，可大大减少new操作的次数，从而减少初始化连接数据库操作，可避免‘too many connections’的情况
 *
 * Class Singleton
 */
class Singleton
{
    /**
     * 私有静态成员变量，保存类的唯一实例
     * @var
     */
    private static $_instance = null;

    private $pdo;

    /**
     * 构造函数私有，防止外部实例化
     * Singleton constructor.
     */
    private function __construct()
    {
        try {
            echo '实例化数据库'. PHP_EOL;
            $this->pdo = new PDO('mysql:host=localhost;dbname=hlyes_v1_file;port=12306;', 'kenny', 'hlyun123456');
        }catch (PDOException $exception) {
            trigger_error('数据库连接失败'.$exception->getMessage(), E_USER_ERROR);
        }
    }

    /**
     * 克隆函数私有，方式外部克隆对象
     */
    private function __clone()
    {
        trigger_error('禁止clone', E_USER_ERROR);
    }

    /**
     * 访问实例的公共静态方法
     * @return Singleton|null
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)){
            echo '正在实例化' . PHP_EOL;
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}


$pdo = Singleton::getInstance();
$pdo = Singleton::getInstance();