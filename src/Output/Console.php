<?php


namespace KataBank\Output;

class Console implements Output
{

    public function printLine($text)
    {
        echo "$text\n";
    }
}
