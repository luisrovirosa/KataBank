<?php


namespace KataBank\Test;

use KataBank\Repository;
use Prophecy\PhpUnit\ProphecyTestCase;
use Prophecy\Prophecy\ObjectProphecy;

class RepositoryTest extends ProphecyTestCase
{
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
        $this->repository->deposit(100);

        $this->transactionFactoryProphecy->makeDeposit(100)->shouldBeCalled();
    }
}
