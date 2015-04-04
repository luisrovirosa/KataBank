<?php


namespace KataBank\Output;

use KataBank\Output\Output;

class Console implements Output
{

    public function printLine($text)
    {
        echo "$text\n";
    }
}
