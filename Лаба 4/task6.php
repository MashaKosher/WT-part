<?php


class Crypto
{
    function __constructor($type='', $keys='')
    {
        $this->type = $type;
        $this->keys = $keys;
        echo $this->keys;
    }
}

$a = new Crypto("dsds", 3);

echo $a->type."\n";