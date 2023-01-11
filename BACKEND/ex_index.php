<?php

$a = 1;
$b = 2;

function sub($a,$b){
    return $a - $b;
}

function two($a,$b){
    return  $test = ($a > 10 ? $a/$b : $a < 10) ? $a*$b : $a;
}
var_dump(two($a,$b));

$arr = [1,2,3,4,5];

function num($arr)
{
    $c = 0;
    foreach ($arr as $k => $v) {
        $c += $v;
    }
    return $c;
}

var_dump(num($arr));

class Voiture{
    public $model,$marque,$number,$chevaux;

    function __construct($model,$marque,$number,$chevaux){
        $model = $this->model;
        $marque = $this->marque;
        $number = $this->number;
        $cheveaux = $this->chevaux;
    }

     public function km($km){
         return $km + $this->number;
     }
}

$v  = new Voiture('panda','fiat','150000','98');

var_dump($v->km(15));