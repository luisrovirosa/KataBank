<?php

namespace KataBank\Test;

use KataBank\KataBank;
use Prophecy\PhpUnit\ProphecyTestCase;

class KataBankTest extends ProphecyTestCase
{
    /**
     * @test
     */
    public function test()
    {
        $kataBank = new KataBank();
    }
}
