<?php


namespace KataBank\Test;

use KataBank\TransactionFactory;
use Prophecy\PhpUnit\ProphecyTestCase;

class TransactionFactoryTest extends ProphecyTestCase
{
    const ANY_AMOUNT = 100;

    /**
     * @test
     */
    public function make_deposit_creates_a_transaction()
    {
        $transactionFactory = new TransactionFactory();
        $transaction = $transactionFactory->makeDeposit(self::ANY_AMOUNT);
        $this->assertInstanceOf('KataBank\Transaction', $transaction);
    }
}
