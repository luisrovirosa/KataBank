<?php


namespace KataBank\Test\TransactionFactory;

use KataBank\Transaction;
use KataBank\TransactionFactory;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

abstract class TransactionFactoryTest extends ProphecyTestCase
{
    const ANY_AMOUNT = 100;
    const TODAY = '2015/04/04';
    /**
     * @var Transaction
     */
    protected $deposit;
    /**
     * @var TransactionFactory
     */
    protected $transactionFactory;

    /**
     * @var ObjectProphecy
     */
    protected $dateProphecy;

    protected function setUp()
    {
        parent::setUp();
        $this->dateProphecy = $this->prophesize('KataBank\Date');
        $this->dateProphecy->now()->willReturn(self::TODAY);
        $this->transactionFactory = new TransactionFactory($this->dateProphecy->reveal());
    }
}
