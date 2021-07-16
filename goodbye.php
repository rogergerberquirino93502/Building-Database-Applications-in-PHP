<?php
class Hello{
    protected $lang;
    function __construct($lang) { ... }
    function greet(){ ... }
}

class Social extends Hello{
    function bye(){
        if( $this->lang == 'fr') return 'Au revoir';
        if( $this->lang == 'es') return 'Adios';
        return 'goodbye';
    }
}

$hi = new Social('es');
echo $hi->greet()."\n";
echo $hi->bye()."\n";