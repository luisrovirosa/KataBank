<?php


namespace KataBank;

use KataBank\Output\Output;

class Console implements Output
{

    public function write($text)
    {
        echo $text;
    }
}
