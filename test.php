<?php


$arr = [
    'name'=>'Вася',
    'age'=>26,
    'City'=>'Luga'
];

function func($arg)
{
    echo '<pre>';
    print_r($arg);

    echo '<pre>';
}

func($arr);