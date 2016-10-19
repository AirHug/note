======================
list()
----------------------
list($a, $b, $c) = array("Dog","Cat","Horse");
=>
$a = "Dog"
$b = "Cat"
$c = "Horse"
分别赋值
======================
key()
current()
----------------------
current() - 返回数组中的当前元素的值
end() - 将内部指针指向数组中的最后一个元素，并输出
next() - 将内部指针指向数组中的下一个元素，并输出
prev() - 将内部指针指向数组中的上一个元素，并输出
reset() - 将内部指针指向数组中的第一个元素，并输出
----------------------
$people = array("Bill", "Steve", "Mark", "David");
key($people) = 0
current($people) = Bill
end($people) = "David"
======================
函数
__get() 获取
__set() 赋值
__isset() 检查属性
__unset() 删除属性
方法
isset()  检查变量
unset()  销毁变量
defined()  检测常量
======================
mixed microtime ([bool])
(PHP 4, PHP 5, PHP 7)
返回当前 Unix 时间戳和微秒数
----------------------
microtime()
返回0.96474400 1474508182
microtime(true)
返回1474508182.9647
======================
class_alias
class_alias — 为一个类创建别名
bool class_alias (string $original, string $alias[, bool $autoload = TRUE ])
基于用户定义的类 original 创建别名 alias。 这个别名类和原有的类完全相同。
----------------------
class foo { }

class_alias('foo', 'bar');

$a = new foo;
$b = new bar;

// the objects are the same
======================
instanceof
（1）判断一个对象是否是某个类的实例，
（2）判断一个对象是否实现了某个接口。
======================
static::const
parent::const
self::const
一般调用静态变量和常量
区别于 $this 不针对实例对象
static指向所有静态作用域，子类会覆盖父类
parent指向父类
self指向本类
----------------------
非静态环境下使用 static::
----------------------
<?php 
class A {
    static $name = "zzh";
    public static function intro()
    {
        echo "my name is " . self::$name;
    }

    public static function intro1()
    {
        echo "my name is " . static::$name;
    }
}

class B extends A {
    static $name = "new zzh";
}

B::intro();//zzh
echo "<hr/>";
B::intro1();//new zzh
 ?>
======================
PHP闭包（Closure）
匿名函数
$func = function( $param ) {
    echo $param;
};

$func( 'some string' );

//输出：
//some string
----------------------
连接闭包和外界变量的关键字：use
//复制，原来的值不会因为闭包里的逻辑改变
$param='some string'
$func = function() use ($param) {
    echo $param;
};

$func();

//输出：
//some string
----------------------
//完全引用变量，原来的值会因为闭包里的逻辑改变
$param='some string';
$func = function() use (&$param) {
    echo $param;
};

$func();

//输出：
//some string
======================
namespace App;

use classA
use classB
...

等价于

use App\classA
use App\classB
...
======================
array_pop() 
函数删除数组中的最后一个元素。
返回数组的最后一个值
<?php
$a=array("red","green","blue");
array_pop($a);
print_r($a);
?>
======================
strrev()
反转字符串
======================
parent::
它指的就是派生类在 extends 声明中所指的基类的名字
<?php
class A {
    function example() {
        echo "I am A::example() and provide basic functionality.<br />\n";
    }
}

class B extends A {
    function example() {
        echo "I am B::example() and provide additional functionality.<br />\n";
        parent::example();
    }
}

$b = new B;

// 这将调用 B::example()，而它会去调用 A::example()。
$b->example();
?>
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================
======================