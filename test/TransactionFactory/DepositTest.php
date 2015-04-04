<?php


namespace KataBank\Test;

use KataBank\Transaction;
use KataBank\TransactionFactory;
use Prophecy\PhpUnit\ProphecyTestCase;

class DepositTest extends ProphecyTestCase
{
    const ANY_AMOUNT = 100;
    /**
     * @var Transaction
     */
    private $deposit;
    /**
     * @var TransactionFactory
     */
    private $transactionFactory;

    protected function setUp()
    {
        parent::setUp();
        $this->transactionFactory = new TransactionFactory();
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
}
