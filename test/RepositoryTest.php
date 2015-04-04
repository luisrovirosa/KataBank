<?php


namespace KataBank\Test;

use KataBank\Repository;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class RepositoryTest extends ProphecyTestCase
{
    const ANY_AMOUNT = 100;
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var ObjectProphecy
     */
    private $transactionFactoryProphecy;

    protected function setUp()
    {
        parent::setUp();
        $this->transactionFactoryProphecy = $this->prophesize('KataBank\TransactionFactory');
        $this->repository = new Repository($this->transactionFactoryProphecy->reveal());
    }

    /**
     * @test
     */
    public function deposit_creates_a_transaction()
    {
        $this->repository->deposit(self::ANY_AMOUNT);

        $this->transactionFactoryProphecy->makeDeposit(self::ANY_AMOUNT)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function withdraw_creates_a_transaction()
    {
        $this->repository->withdraw(self::ANY_AMOUNT);

        $this->transactionFactoryProphecy->makeWithdraw(self::ANY_AMOUNT)->shouldBeCalled();
    }

    /**
     * @test
     */
    public function get_transactions_retrieve_an_empty_collection_of_transactions_if_there_is_no_deposit_or_withdraw()
    {
        $transactions = $this->repository->getTransactions();
        $this->assertEquals(array(), $transactions);
    }

    /**
     * @test
     */
    public function get_transactions_after_deposit_has_one_transaction()
    {
        $this->repository->deposit(self::ANY_AMOUNT);
        $transactions = $this->repository->getTransactions();
        $this->assertCount(1, $transactions);
    }
}
