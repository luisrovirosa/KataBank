<?php


namespace KataBank\Test;

use KataBank\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function now_returns_in_the_correct_format()
    {
        $date = new Date();
        $this->assertRegExp('#\d{4}/\d{2}/\d{2}#', $date->now());
    }
}
