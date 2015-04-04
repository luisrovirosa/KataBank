<?php


namespace KataBank\Test;

use KataBank\Transaction;
use KataBank\TransactionFactory;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class DepositTest extends ProphecyTestCase
{
    const ANY_AMOUNT = 100;
    const TODAY = '2015/04/04';
    /**
     * @var Transaction
     */
    private $deposit;
    /**
     * @var TransactionFactory
     */
    private $transactionFactory;

    /**
     * @var ObjectProphecy
     */
    private $dateProphecy;

    protected function setUp()
    {
        parent::setUp();
        $this->dateProphecy = $this->prophesize('KataBank\Date');
        $this->dateProphecy->now()->willReturn(self::TODAY);
        $this->transactionFactory = new TransactionFactory($this->dateProphecy->reveal());
        $this->deposit = $this->transactionFactory->makeDeposit(self::ANY_AMOUNT);
    }

    /**
     * @test
     */
    public function creates_a_transaction()
    {
        $this->assertInstanceOf('KataBank\Transaction', $this->deposit);
    }

    /**
     * @test
     */
    public function the_transaction_has_the_amount_of_money()
    {
        $this->assertEquals(self::ANY_AMOUNT, $this->deposit->amount());
    }

    /**
     * @test
     */
    public function the_transaction_has_the_date()
    {
        $this->assertEquals(self::TODAY, $this->deposit->date());
    }
}
