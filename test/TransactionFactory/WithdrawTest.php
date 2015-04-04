<?php


namespace KataBank\Test\TransactionFactory;

class WithdrawTest extends TransactionFactoryTest
{
    protected function setUp()
    {
        parent::setUp();
        $this->deposit = $this->transactionFactory->makeWithdraw(self::ANY_AMOUNT);
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
        $this->assertEquals(-self::ANY_AMOUNT, $this->deposit->amount());
    }

    /**
     * @test
     */
    public function the_transaction_has_the_date()
    {
        $this->assertEquals(self::TODAY, $this->deposit->date());
    }
}
