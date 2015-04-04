<?php


namespace KataBank\Test;

use KataBank\Output\Console;

class ConsoleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function not_fail_using_console()
    {
        $console = new Console();
        $console->printLine("");
    }
}
