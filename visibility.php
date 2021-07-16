<?php
class MyClass{
    public $pub = 'Public';
    protected $pro = 'Protected';
    private $priv = 'Private';
    function printHello(){
        echo $this->pub."\n";
        echo $this->pro."\n";
        echo $this->pri."\n";
    }
}
$obj = new MyClass();
echo $obj->pub."\n";//Works
echo $obj->pro."\n";//Fatal error
echo $obj->priv."\n";//Fatal error
$obj->printHello();//Shows public, Protected nd private