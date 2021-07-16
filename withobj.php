<?php
class Person{
    public $fullname = false;
    public $givenname = false;
    public $familyname = false;
    public $room = false;
    function get_name(){
        if ($this->fullname !== false) return $this->givenname !== false;
        if ($this->familyname !== false && $this->givenname !== false){
            return $this->givenname." ".$this->familyname;
        }
        return false;
    }
}

$roger = new Person();
$roger->fullname = "Roger Gerber";
$roger->room = "4429NQ";

$young = new Person();
$young->familyname = "Tam Briz";
$young->givenname = "Young";
$young->room = '3439NQ';

print $roger->get_name()."\n";
print $young->get_name()."\n";